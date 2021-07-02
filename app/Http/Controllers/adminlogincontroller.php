<?php

namespace App\Http\Controllers;
use Illuminate\Support\Fascade\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use iLLuminate\Session;
use App\admin;
use App\customer;
use App\product;
use App\category;

class adminlogincontroller extends Controller
{
    function adminlogin(Request $req)
    {
         $email=$req->input('email');
         $password=$req->input('password');
         
         $user=admin::where('a_email','like',$email)->where('a_password','like',$password)->count();
         
         if($user>0)
         {
            $req->session()->put('adminemail',$email);
            $email=$req->session()->get('adminemail');
            $user2=admin::where('a_email','like',$email)->get();
            $count=admin::count();
            $product_count=product::count();
            $customer_count=customer::count();
            $cat_count=category::count();
            return view('admin.admindashboard',['results'=>$user,'aname'=>$user2,'count'=>$count,'pcount'=>$product_count,'cust_count'=>$customer_count,'cat_count'=>$cat_count]);
            }
         else {
             echo "<script> alert('Invalid login credential.')</script>";
             return view('admin.adminlogin');
         }
    }
    function dashboard(Request $req)   
    {
      $email=$req->session()->get('adminemail');
      $user2=admin::where('a_email','like',$email)->get();
      
      $count=admin::count();
      return view('admin.admindashboard',['aname'=>$user2,'count'=>$count]);
    }
     function adminlogout()
     {
      session()->forget('adminemail');
        return view('admin.adminlogin','adminlogin');
     }
    function adminviewprofile(Request $req)
     {
      $email=$req->session()->get('adminemail');
       $view=admin::where('a_email','like',$email)->get();
       $user2=admin::where('a_email','like',$email)->get();
      
       return view('admin.adminviewprofile',['data'=>$view,'aname'=>$user2]);
     }
     
     
   }
   