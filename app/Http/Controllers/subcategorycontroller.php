<?php

namespace App\Http\Controllers;
use App\subcategory;
use App\admin;
use Illuminate\Http\Request;


class subcategorycontroller extends Controller
{
    function show_subcategory(Request $req)
    {
        $results = subcategory::all();
        $subcatid=$req->input('subcat_id');
        $subcatname=$req->input('subcat_name');

        $email=$req->session()->get('adminemail');
        $user2= admin::where('a_email','like',$email)->get();
        return view('admin/adminsubcategory',['results'=>$results,'aname'=>$user2]);
    }
    
}