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
use App\subcategory;
use App\inquiry;


class adminlogincontroller extends Controller
{
    function adminlogin(Request $req)
    {
        $email=$req->input('email');
        $password=$req->input('password');
        $maxprobyuser=DB::select("SELECT c_id,max(p.p_id) as 'max' FROM `products` p join customers c USING (c_id) group by(p.c_id) limit 5;");
      // dd($maxprobyuser);
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
            $subcat_count=subcategory::count();
            $inquiry=inquiry::where('checked',0)->get();
            return view('admin.admindashboard',['maxprobyuser'=>$maxprobyuser,'inquiry'=>$inquiry,'results'=>$user,'aname'=>$user2,'count'=>$count,'pcount'=>$product_count,'cust_count'=>$customer_count,'cat_count'=>$cat_count,'subcat_count'=> $subcat_count]);
        }
        else {
            echo "<script> alert('Invalid login credential.')</script>";
            return view('admin.adminlogin');
        }
    }
    function dashboard(Request $req)   
    {
        $maxprobyuser=DB::select("SELECT c_id,max(p.p_id) as 'max' FROM `products` p join customers c USING (c_id) group by(p.c_id) limit 5;"); 
        //$smaxprobyuser=product::join('customers','customers.c_id','products.c_id')->groupby('products.c_id')->max('products.p_id');
        //dd($smaxprobyuser);
        $email=$req->session()->get('adminemail');
        $user2=admin::where('a_email','like',$email)->get();
        $cat_count=category::count();
        $count=admin::count();
        $subcat_count=subcategory::count();
        $product_count=product::count();
        $customer_count=customer::count();

        $inquiry=inquiry::where('checked',0)->get();
        return view('admin.admindashboard',['maxprobyuser'=>$maxprobyuser,'inquiry'=>$inquiry,'aname'=>$user2,'count'=>$count,'cat_count'=>$cat_count,'subcat_count'=> $subcat_count,'pcount'=>$product_count,'cust_count'=>$customer_count]);
    }
    function adminlogout()
    {
        session()->forget('adminemail');
        return redirect('adminlogin');
    }
    function adminviewprofile(Request $req)
    {
        $email=$req->session()->get('adminemail');
        $view=admin::where('a_email','like',$email)->get();
        $user2=admin::where('a_email','like',$email)->get();
        $inquiry=inquiry::where('checked',0)->get();
        return view('admin.adminviewprofile',['inquiry'=>$inquiry,'data'=>$view,'aname'=>$user2]);
    }
     
    function newpassword(Request $req){
        
        $passedpassword=$req->passedCode;
        $userEnterdPass=$req->userCode;
        $email=$req->passedEmail;
        $newpass=$req->password;
        // $arr=[$passedpassword,$userEnterdPass,$email,$newpass];
        // dd($arr);
        if($passedpassword==$userEnterdPass){
            admin::where('a_email',$email)->update(['a_password' => $newpass]);
            $req->session()->put('adminemail',$email);
            return redirect('dashboard');
        }
        else{
            $req->session()->put('wrongcode',"Enter Correct code");
            return redirect()->back();
        }
    }
    function view_admin(Request $req)
    {
        $admi=admin::paginate(5);
        $email=$req->session()->get('adminemail');
        $inquiry=inquiry::where('checked',0)->get();
        $user2=admin::where('a_email','like',$email)->get();
        return view('admin.adminlist',['inquiry'=>$inquiry,'admi'=>$admi,'aname'=>$user2]);
    }
}