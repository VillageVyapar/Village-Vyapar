<?php

namespace App\Http\Controllers;
use App\category;
use App\admin;
use App\inquiry;
use DB;
use File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class categorycontroller extends Controller
{
    function show_category(Request $req)
    {
        $email=$req->session()->get('adminemail');
        $user2=admin::where('a_email','like',$email)->get();
        $results = category::simplePaginate(5);
        $cat = category::all();
        $catid=$req->input('cat_id');
        $catname=$req->input('cat_name');
        $inquiry=inquiry::where('checked',0)->get();
        return view('admin.admincategory',['inquiry'=>$inquiry,'results'=>$results,'aname'=>$user2,"category"=>$cat]);
    }
    function edit_category(Request $req)
    {
        $id=$req->catid;
        $oldimg=DB::table('categories')->where('cat_id',$id)->value('cat_img');
        if($req->hasFile('updateimg')){
            File::delete('category_images/'.$oldimg);
            $imgname=$req->file('updateimg');
            $newname=time()."_".$imgname->getClientOriginalName();
            $imgname->move(public_path('category_images'),$newname);
            $update=DB::update("update categories set cat_name=?, cat_img=? where cat_id=?",[$req->updatename,$newname,$id]);
            return redirect()->back();
        }
        else
        {
            $update=DB::update("update categories set cat_name=? where cat_id=?",[$req->updatename,$id]);
            return redirect()->back();
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
        
    }
}