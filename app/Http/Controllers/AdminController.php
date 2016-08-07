<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function loadLoginPage(){
        return view('admin.login');
    }

    public function loadDashboardPage(){
        return view('admin.dashboard');
    }

    public function doLogout(){
        Auth::guard('admins')->logout();
        return redirect('admin/login');
    }

    public function loadCreateUserPage(){
        return view('admin.new-user');
    }

    public function doLogin(Request $request){
        $validator = Validator::make($request->all(),[
            'username' => 'required',
            'password' => 'required'
        ]);
        if($validator->fails()){
            return back()->with('msg',$validator->errors()->all()[0]);
        }
        if(Auth::guard('admins')->attempt(['username'=>$request->username,'password'=>$request->password])){
            return redirect('admin/dashboard');
        } else{
            return back()->with('msg','Invalid username/password');
        }
    }

}
