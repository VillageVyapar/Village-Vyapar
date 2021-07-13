<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\subcategory;
use App\customer;

class contactformcontroller extends Controller
{
    //
    function contactdetail()
    {
        $email=session()->get('useremail');
        $cus=customer::where('email',$email)->get();
        $c=category::all();
        $sc=subcategory::all();
        return view('contactForm',['customer'=>$cus,'categories'=>$c,'subcategories'=>$sc]);
    }
}