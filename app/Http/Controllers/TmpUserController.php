<?php

namespace App\Http\Controllers;

use App\TmpUser;
use Illuminate\Http\Request;

use App\Http\Requests;

class TmpUserController extends Controller
{
    public function store(Request $request){
        $tmp_user = TmpUser::where('mobile',$request->mobile)->first();
        if($tmp_user){
            return $this->update($request,$tmp_user->id);
        }
        $tmp_user = TmpUser::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'gender' => $request->gender,
            'dob' => $request->dob,
            'address' => $request->address,
            'pincode' => $request->pincode,
            'imei_no' => $request->imei_no,
            'pan_no' => $request->pan_no,
            'referral_code' => $request->referral_code,
            'otp' => $request->otp
        ]);
        if($tmp_user){
            return true;
        }
        return false;
    }

    public function update(Request $request,$id){
        $no_of_rows = TmpUser::find($id)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'gender' => $request->gender,
            'dob' => $request->dob,
            'address' => $request->address,
            'pincode' => $request->pincode,
            'imei_no' => $request->imei_no,
            'pan_no' => $request->pan_no,
            'referral_code' => $request->referral_code,
            'otp' => $request->otp
        ]);
        if($no_of_rows==1){
            return true;
        }
        return false;
    }
}
