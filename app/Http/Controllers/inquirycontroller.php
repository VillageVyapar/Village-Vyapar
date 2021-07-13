<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin;
use App\inquiry;

class inquirycontroller extends Controller
{
    function admin_inquiry(Request $req)
    {
        
            $inq=inquiry::paginate(5);
            $email=$req->session()->get('adminemail');
            $user2=admin::where('a_email','like',$email)->get();
            return view('admin.admininquiry',['inq'=>$inq,'aname'=>$user2]);
        
    
    }
}