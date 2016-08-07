<?php

namespace App\Http\Controllers;

use App\TmpUser;
use App\Transaction;
use App\TreePath;
use App\User;
use App\UserPosition;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Http\Helpers\Utils;

class UserController extends Controller
{
    public function getUsers(){
        return DB::table('users as u')
                ->join('tree_paths as t','t.descendant_id','=','u.id')
                ->join('users as a','a.id','=','t.ancestor_id')
                ->where('u.id','<>',Auth::guard('admins')->user()->user_id)
                ->where('t.depth',1)
                ->orderBy('u.created_at','desc')
                ->select('u.first_name','u.mobile','u.email','a.first_name as referred_by','u.id','u.created_at')
                ->get();
    }

    public function sendOtpForSignup(Request $request){
        $validator = Validator::make($request->all(),[
            'first_name' => 'required|regex:/^[a-z\sA-Z]*$/|min:3',
            'last_name' => 'required|regex:/^[a-z\sA-Z]*$/|min:3',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|regex:/^\d{10}$/|unique:users,mobile',
            'password' => 'required|confirmed',
            'gender' => 'required|in:M,F',
            'dob' => 'required|regex:/^\d{4}-\d{2}-\d{2}$/',
            'imei_no' => 'required|size:15',
            'pan_no' => 'required|size:10',
            'address' => 'required|min:3',
            'pincode' => 'required|regex:/^\d{6}$/',
            'referral_code' => 'required|size:6|exists:users,referral_code'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->all()[0],449);
        }
        $request->otp = Utils::getOtp();
        // create a temp account
        $tmp_user_ctrl = new TmpUserController();
        if($tmp_user_ctrl->store($request)){
            // send otp for confirmation
            $msg = $request->otp." is OTP for mobile verification from umenhum.com";
            $sent = MainController::sendOtp($request->mobile,$msg);
            if($sent==true){
                return response()->json('OTP send successfully',200);
            }
            return response()->json('Unable send OTP',500);
        } else{
            return response()->json('Internal server error',500);
        }
    }

    public function verifyOtpForSignup(Request $request){
        $validator = Validator::make($request->all(),[
            'mobile' => 'required|regex:/^\d{10}$/|exists:tmp_users,mobile',
            'otp' => 'required|regex:/^\d{6}$/'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->all()[0],449);
        }
        DB::beginTransaction();
        try{
            $tmp_user = TmpUser::where('mobile',$request->mobile)->where('otp',$request->otp)->first();
            if($tmp_user){
                $attrs = $tmp_user->getAttributes();
                unset($attrs['id']);
                if(isset($attrs['referral_code']) && $attrs['referral_code']!=''){
                    $ref_user = User::where('referral_code',$attrs['referral_code'])->first();
                    $attrs['referral_code'] = Utils::generateReferralCode();
                    $user = User::create($attrs);
                    // create a node
                    TreePathController::addChild($ref_user->id,$user->id);
                    // add credits to referrer account if depth of referrer is less than 7
                    if(TreePathController::getChildCount($ref_user)<=7){
                        Transaction::create([
                            'user_id' => $ref_user->id,
                            'credits' => 100,
                            'note' => $user->full_name.' joining credits'
                        ]);
                        $ref_user->credits_balance += 100;
                        $ref_user->save();
                    }
                } else{
                    $attrs['referral_code'] = Utils::generateReferralCode();
                    $user = User::create($attrs);
                    // create a node
                    TreePathController::addChild($user->id,$user->id);
                }
                // delete temp record
                $tmp_user->delete();
                DB::commit();
                return response()->json('Registered successfully',200);
            }
            return response()->json('OTP not matched',403);
        } catch(\Exception $e){
            DB::rollBack();
            throw $e;
            return response()->json('Internal server error',500);
        }
    }

    public function doLogin(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->all()[0],449);
        }
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect('dashboard');
        } else{
            return back()->with('msg','Invalid email/password');
        }
    }

    public function createUser(Request $request){
        $validator = Validator::make($request->all(),[
            'first_name' => 'required|regex:/^[a-z\sA-Z]*$/|min:3',
            'last_name' => 'required|regex:/^[a-z\sA-Z]*$/|min:3',
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|regex:/^\d{10}$/|unique:users,mobile',
            'password' => 'required|confirmed',
            'gender' => 'required|in:M,F',
            'dob' => 'required|regex:/^\d{4}-\d{2}-\d{2}$/',
            'imei_no' => 'required|size:15',
            'pan_no' => 'required|size:10',
            'address' => 'required|min:3',
            'pincode' => 'required|regex:/^\d{6}$/',
            'referral_code' => 'size:6|exists:users,referral_code'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->all()[0],449);
        }
        DB::beginTransaction();
        try{
            $col_vals = $request->all();
            unset($col_vals['password_confirmation']);
            if($request->has('referral_code') && $request->referral_code!=''){
                $ref_user = User::where('referral_code',$request->referral_code)->first();
                $col_vals['referral_code'] = Utils::generateReferralCode();
                $user = User::create($col_vals);
                // create a node
                TreePathController::addChild($ref_user->id,$user->id);
                // add credits to referrer account if depth of referrer is less than 7
                if(TreePathController::getChildCount($ref_user)<=7){
                    Transaction::create([
                        'user_id' => $ref_user->id,
                        'credits' => 100,
                        'note' => $user->full_name.' joining credits'
                    ]);
                    $ref_user->credits_balance += 100;
                    $ref_user->save();
                }
            } else{
                $col_vals['referral_code'] = Utils::generateReferralCode();
                $user = User::create($col_vals);
                // create a node
                TreePathController::addChild($user->id,$user->id);
            }
            DB::commit();
            return response()->json('New user created successfully',200);
        } catch(\Exception $e){
            DB::rollBack();
            throw $e;
            return response()->json('Internal server error',500);
        }
    }

    public function doLogout(){
        Auth::logout();
        return redirect('/');
    }
}
