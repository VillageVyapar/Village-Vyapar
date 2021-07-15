<?php

namespace App\Http\Controllers;
use App\customer;
use App\admin;
use App\inquiry;
use Illuminate\Http\Request;

class admincustomercontroller extends Controller
{
    function view_customer(Request $req)
    {
        $cust=customer::paginate(5);
        $email=$req->session()->get('adminemail');
        $user2=admin::where('a_email','like',$email)->get();
        $inquiry=inquiry::where('checked',0)->get();
        return view('admin.admincustomer',['inquiry'=>$inquiry,'cust'=>$cust,'aname'=>$user2]);
    }
  

}