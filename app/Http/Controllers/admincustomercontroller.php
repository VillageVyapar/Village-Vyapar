<?php

namespace App\Http\Controllers;
use App\customer;
use App\admin;
use Illuminate\Http\Request;

class admincustomercontroller extends Controller
{
    function view_customer(Request $req)
    {
        $cust=customer::all();
        $email=$req->session()->get('adminemail');
         $user2=admin::where('a_email','like',$email)->get();
        return view('admin.admincustomer',['cust'=>$cust,'aname'=>$user2]);
    }
}
