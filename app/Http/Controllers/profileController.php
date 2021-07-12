<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\customer;

class profileController extends Controller
{
    
    public function prodetails(Request $req)
    {
        $email=$req->session()->get('useremail');
        $cust=customer::where('email','LIKE',$email)->get();
        return view('profile',['customers'=>$cust,'cusname'=>$cust]);
    }
    
    
    public function update(Request $req)
    {   
        if($req->hasFile('profiledp'))
        {
            $dp=DB::select('select c_img from customers where c_id = ? ',[$req->id]);
            //sdd($dp);
            File::delete($dp);
            $imageName = $req->file('profiledp');
            // $imageName->getClientOriginalName();
            $newname=time().'_'.$imageName->getClientOriginalName();
            $imageName->move( public_path('customer_img'), $newname);
            
            $user = DB::update('update customers set c_img=?,c_name = ?,phone_no=?,address=?,district=?,village=?,pin_code=? where c_id = ?',
            [$newname,$req->name,$req->phone,$req->address,$req->district,$req->village,$req->pincode,$req->id]);
        
            if(!is_null($user)) { 
                return redirect('profile')->with("success", "Updated profile successfully");
            }

            else {
                return redirect('profile')->with("failed", "Update failed. Try again.");
            }
        }
        else
        {
            $user = DB::update('update customers set c_name = ?,phone_no=?,address=?,district=?,village=?,pin_code=? where c_id = ?',
            [$req->name,$req->phone,$req->address,$req->district,$req->village,$req->pincode,$req->id]);
        
            if(!is_null($user)) { 
                return redirect('profile')->with("success", "Updated profile successfully");
            }

            else {
                return redirect('profile')->with("failed", "Update failed. Try again.");
            }
        }
    }
    public function updateDP(Request $req)
    {
        $id=$req->dpuserid;
        $dp=DB::select('select c_img from customers where c_id = ? ',[$id]);
        File::delete($dp);
        $imageName = $req->file('profiledp');
        $newname=time().'_'.$imageName->getClientOriginalName();
        $imageName->move( public_path('customer_img'), $newname);
        $user=customer::where('c_id',$id)->update(['c_img'=>$newname]);
        if(!is_null($user)) { 
            return redirect('profile')->with("success", "Updated profile successfully");
        }
        else {
            return redirect('profile')->with("failed", "Update failed. Try again.");
        }
    }
}
