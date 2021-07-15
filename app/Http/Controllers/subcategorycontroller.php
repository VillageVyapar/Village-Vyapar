<?php

namespace App\Http\Controllers;
use App\subcategory;
use App\admin;
use Illuminate\Http\Request;
use App\inquiry;

class subcategorycontroller extends Controller
{
    function show_subcategory(Request $req)
    {
        $results = subcategory::simplePaginate(5);
        
        $subcatid=$req->input('subcat_id');
        $subcatname=$req->input('subcat_name');

        $email=$req->session()->get('adminemail');
        $user2= admin::where('a_email','like',$email)->get();
        $inquiry=inquiry::where('checked',0)->get();
        return view('admin/adminsubcategory',['inquiry'=>$inquiry,'results'=>$results,'aname'=>$user2]);
    }
    function deletesubcategory(Request $req,$id)
    {
       
       subcategory::where('cat_id',$id)->delete();
       return redirect()->back();
    }
    
}