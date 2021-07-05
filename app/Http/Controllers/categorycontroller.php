<?php

namespace App\Http\Controllers;
use App\category;
use App\admin;
use DB;
use Illuminate\Http\Request;

class categorycontroller extends Controller
{
    function show_category(Request $req)
    {
        $email=$req->session()->get('adminemail');
        $user2=admin::where('a_email','like',$email)->get();

        $results = category::paginate(5);
        $catid=$req->input('cat_id');
        $catname=$req->input('cat_name');
        return view('admin.admincategory',['results'=>$results,'aname'=>$user2]);
        
    }
    function edit_category(Request $req,$id)
    {
        //dd($id);
        $results = category::where('cat_id',$id)->get();
        $up=DB::update('update categories set cat_name=?,cat_img=? where cat_id=?',[$req->cat_name,$req->cat_img, $id]);
        
        return view('admin.admineditcategory',['results'=>$results,'up'=>$up]);
    }
    function deletecategory(Request $req,$id)
    {
       
       category::where('cat_id',$id)->delete();
       return redirect()->back();
    }
}
