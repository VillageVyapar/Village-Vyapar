<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class adminProfileController extends Controller
{
    //
    function editProAdmin(Request $req)
    {
        $id=$req->id;
        if($req->hasfile('proimgad'))
        {
            $dp=DB::select("select a_img from admins where a_id = ?",[$id]);
            File::delete($dp);
            $imgname=$req->file('proimgad');
            $newimg=time()."_".$imgname->getClientOriginalName();
            $imgname->move(public_path("Admin_img"),$newimg);
            
            $update=array("a_img"=>$newimg,'a_name'=>$req->fullname,'a_email'=>$req->email,'a_password'=>$req->passwd,'a_phone'=>$req->phoneno);
            $admin=admin::where('a_id',$id)->update($update);
            return redirect()->back();   
        }
        else{
            $update=array('a_name'=>$req->fullname,'a_email'=>$req->email,'a_password'=>$req->passwd,'a_phone'=>$req->phoneno);
            $admin=admin::where('a_id',$id)->update($update);
            return redirect()->back();   
        }
    
    }
}