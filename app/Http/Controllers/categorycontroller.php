<?php

namespace App\Http\Controllers;
use App\category;
use App\admin;
use App\inquiry;
use DB;
use File;
use Illuminate\Http\Request;

class categorycontroller extends Controller
{
    function show_category(Request $req)
    {
        $email=$req->session()->get('adminemail');
        $user2=admin::where('a_email','like',$email)->get();

        $results = category::simplePaginate(5);
        $results = category::simplePaginate(5);
        $catid=$req->input('cat_id');
        $catname=$req->input('cat_name');
        $inquiry=inquiry::where('checked',0)->get();
        return view('admin.admincategory',['inquiry'=>$inquiry,'results'=>$results,'aname'=>$user2]);
        
    }
    function edit_category(Request $req)
    {
        $oldimg=DB::table('categories')->where('cat_id',$req->id)->value('cat_img');
        if($req->hasFile('cat_img')){
            // dd('hell');
            File::delete('category_images/'.$oldimg);
            $imgname=$req->file('cat_img');
            // dd($imgname);
            $newname=time()."_".$imgname->getClientOriginalName();
            $imgname->move(public_path('category_images'),$newname);
            $update=DB::update("update categories set cat_name=?, cat_img=? where cat_id=?",[$req->cat_name,$newname,$req->id]);
            
            $data = category::where('cat_id',$req->id)->get();
            return view('admin.admineditcategory',['data'=>$data]);
        }
        else{
            $update=DB::update("update categories set cat_name=? where cat_id=?",[$req->cat_name,$req->id]);
            
            $data = category::where('cat_id',$req->id)->get();
            return view('admin.admineditcategory',['data'=>$data]);
        }
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
    function add_cat(Request $req){
        // dd($req->cat_name);
        $imgname=$req->file('cat_img');
            // dd($imgname);
            $newname=time()."_".$imgname->getClientOriginalName();
            $imgname->move(public_path('category_images'),$newname);
        $insert=DB::insert("insert into categories values(null,?,?)",[$req->cat_name,$newname]);
        if($insert){
            return redirect()->back();
        }
    }
}