<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MainController extends Controller
{
    public function loadIndexPage(){
        return view('index');
    }

    public function loadLoginPage(){
        return view('login');
    }

    public function loadSignupPage(){
        return view('signup');
    }

    public function loadDashboardPage(){
        return view('user.dashboard');
    }

    public static function sendOtp($mobile,$msg){

        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET', "http://202.62.67.34/smpp.sms?username=9848973314&password=73314&to=91$mobile&from=RYLTRV&text=$msg");
        if(intval($res->getStatusCode())==200){
            return true;
        }
        return false;
    }
}
