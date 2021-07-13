<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< Updated upstream
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
        
    
=======
use App\inquiry;
use App\customer;

class inquirycontroller extends Controller
{
    //
    function customer_All_inquirydet()
    {
        $email=session()->get('useremail');
        $cusname=customer::where('email','LIKE',$email)->get();
        $procount=customer::join('products','products.c_id','customers.c_id')->where('email','LIKE',$email)->get();
        foreach($cusname as $c)
        {
            //dd($c->c_id);
            $inq=inquiry::where('email',$email)->get();
        }
        
        return view('customer/customer_total_inquiry',['inquiry'=>$inq,'cusname'=>$cusname,'procus'=>$procount]);
>>>>>>> Stashed changes
    }
}