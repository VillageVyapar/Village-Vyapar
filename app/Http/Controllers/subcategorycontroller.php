<?php

namespace App\Http\Controllers;
use App\subcategory;
use App\admin;
use Illuminate\Http\Request;
use App\inquiry;
use App\category;
use DB;
class subcategorycontroller extends Controller
{
    function show_subcategory(Request $req)
    {
        $results = subcategory::simplePaginate(5);
        $sub=subcategory::all();
        $cat=category::all();
        $subcatid=$req->input('subcat_id');
        $subcatname=$req->input('subcat_name');

        $email=$req->session()->get('adminemail');
        $user2= admin::where('a_email','like',$email)->get();
        $inquiry=inquiry::where('checked',0)->get();
        return view('admin/adminsubcategory',['inquiry'=>$inquiry,'results'=>$results,'aname'=>$user2,'sub'=>$sub,'cat'=>$cat]);
    }
    function deletesubcategory(Request $req,$id)
    {
       
       subcategory::where('cat_id',$id)->delete();
       return redirect()->back();
    }
    function add_subcat(Request $req){
        dd($req->catname);
        $id=category::where('cat_name',$req->catname)->value('cat_id');
        $insert=DB::insert("insert into subcategories values(null,?,?)",[$req->subcat_name,$id]);
        
    }
    
}