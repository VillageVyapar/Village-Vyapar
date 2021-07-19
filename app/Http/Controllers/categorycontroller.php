<?php

namespace App\Http\Controllers;
use App\category;
use App\admin;
use App\inquiry;
use DB;
use Illuminate\Http\Request;

class categorycontroller extends Controller
{
    function show_category(Request $req)
    {
        $email=$req->session()->get('adminemail');
        $user2=admin::where('a_email','like',$email)->get();

        $results = category::simplePaginate(5);
        $catid=$req->input('cat_id');
        $catname=$req->input('cat_name');
        $inquiry=inquiry::where('checked',0)->get();
        return view('admin.admincategory',['inquiry'=>$inquiry,'results'=>$results,'aname'=>$user2]);
        
    }
    function edit_category(Request $req)
    {
        
        $update = category::where('cat_id', $req->id) ->update( [ 'cat_name' => $req->cat_name, 'cat_img' => $req->cat_img]);
        $data = category::where('cat_id',$id)->get();
        echo $req->cat_name;
        return view('admin.admineditcategory',['data'=>$data]);
    }
    function deletecategory(Request $req,$id)
    {
       
       category::where('cat_id',$id)->delete();
       return redirect()->back();
    }
    function show_edit_category($id){
        $data=category::where("cat_id",$id)->get();
        return view("admin.admineditcategory",['data'=>$data]);
    }
}