<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Hash;
use App\customer;
use App\admin;
use Session;

class MailController extends Controller
{
    //
    public function viewpage(){
        return redirect('admin.fpass');
    }
    public function basic_email(Request $req) {
        function password_generate($chars) 
        {
        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        return substr(str_shuffle($data), 0, $chars);
        }
        $tempPass= password_generate(6);

        $data = [
            "title"=>"Forgot Password",
            "body"=>"Enter this code: $tempPass"
        ];
        
        $user=admin::where("a_email",$req->email)->count();
        
        if($user==1){
            Mail::to($req->email)->send(new TestMail($data));
            return view('admin.securityCode',['code'=>$tempPass,'proEmail'=>$req->email]);
        }
        else{
            $req->session()->put('wrongEmail',$user);
            return redirect()->back();
        }
    }    

}