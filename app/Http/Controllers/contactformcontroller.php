<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\subcategory;
use App\customer;
use App\inquiry;

class contactformcontroller extends Controller
{
    //
    function contactdetail()
    {
        $c=category::all();
        $sc=subcategory::all();
        return view('contactForm',['categories'=>$c,'subcategories'=>$sc]);
    }
    function insert_inquiry(Request $r)
    {
        //dd($r->cname);
        $qry=inquiry::insert([
            
            'c_name'=>$r->cname,
            'email'=>$r->email,
            'subject'=>$r->subject,
            'comp_name'=>$r->comp_name,
            'message'=>$r->msg
            ]);
        if($qry)
        {
            echo "<script>alert('Your request is successfully sent to admin , we will send your reply as soon as possible !!');</script>";
            return "<script>location.href= '/';</script>";
        }
        else
        {
            echo "<script>alert('Invalid Request !!');</script>";
            return "<script>location.href('/');</script>";
        } 
         
    }
}