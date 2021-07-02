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
    
        // $dp=DB::select('select c_img from customers where c_id = ? ',[$req->id]);
        // //sdd($dp);
        // File::delete($dp);
        // $imageName = $req->file('profiledp');
        // // $imageName->getClientOriginalName();
        // $newname=time().'_'.$imageName->getClientOriginalName();
        // $imageName->move( public_path('customer_img'), $newname);
        
        // $user = DB::update('update customers set c_img=?,c_name = ?,phone_no=?,address=?,district=?,village=?,pin_code=? where c_id = ?',
        // [$newname,$req->name,$req->phone,$req->address,$req->district,$req->village,$req->pincode,$req->id]);
    
        // if(!is_null($admin)) { 
        //     return redirect()->back("success", "Updated profile successfully");
        // }

        // else {
        //     return redirect()->back("failed", "Update failed. Try again.");
        // }
    }
}
