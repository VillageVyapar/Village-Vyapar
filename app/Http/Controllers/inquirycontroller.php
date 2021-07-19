<?php

namespace App\Http\Controllers;
use DB;

use Illuminate\Http\Request;

use App\admin;
use App\inquiry;
use App\customer;

class inquirycontroller extends Controller
{
    function admin_inquiry(Request $req)
    {
            
            $inq=inquiry::orderby('i_id','desc')->get();
            $email=$req->session()->get('adminemail');
            $user2=admin::where('a_email','like',$email)->get();
            $inquiry=inquiry::where('checked',0)->get();
            $up=inquiry::where('checked',0)->update(['checked'=>1]);
            return view('admin.admininquiry',['inquiry'=>$inquiry,'inq'=>$inq,'aname'=>$user2]);
    }
    function customer_All_inquirydet()
    {
        $email=session()->get('useremail');
        $cusname=customer::where('email','LIKE',$email)->get();
        $procount=customer::join('products','products.c_id','customers.c_id')->where('email','LIKE',$email)->get();
        foreach($cusname as $c)
        {
            //dd($c->c_id);
            $inq=inquiry::where('email',$email)->orderBy('i_id','desc')->get();
        }
        return view('customer/customer_total_inquiry',['inquiry'=>$inq,'cusname'=>$cusname,'procus'=>$procount]);
    }  
    function reply_inq(Request $req)
    {
        $email=$req->session()->get('adminemail');
        $user2=admin::where('a_email','like',$email)->get();
        $inquiry=inquiry::where('checked',0)->get();
        $userinquiry=inquiry::where('i_id',$req->i_id)->get();
        dd($req->inqid);
        return view('admin.reply_inquiry',['inquiry'=>$inquiry,'aname'=>$user2]);
    }
 
}