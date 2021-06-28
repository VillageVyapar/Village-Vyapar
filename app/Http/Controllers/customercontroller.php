<?php

namespace App\Http\Controllers;
use App\customer;
use App\category;
use App\product;
use App\subcategory;

use Illuminate\Http\Request;

class customercontroller extends Controller
{
    //
    function login(Request $r)
    {
        $c=category::all();
        $sc=subcategory::all();
    
        $p=product::join('categories','products.cat_id','categories.cat_id')->limit(50)->get();
        if($r->capcha == $r->cuscapcha)
        {
            $email=$r->input('email');
            $pass=$r->input('password');
            $user=customer::where('email','LIKE',$email)->where('password','like',$pass)->count();
            $det=customer::where('email','LIKE',$email)->get();
            if($user >0)
            {
                $r->session()->put('useremail',$email);
               // dd(session()->get('useremail'));
                return view('welcome',['categories'=>$c,'subcategories'=>$sc,'customer',$det,'catpro'=>$p]);
            }
            else
            {
                echo "<script>alert('Invalid Login Id !!');</script>";
                return view('account',['categories'=>$c,'subcategories'=>$sc,'catpro'=>$p]);
            } 
        }
        else
        {
            echo "<script>alert('Invalid Capcha code  !!');</script>";
            return view('account',['categories'=>$c,'subcategories'=>$sc,'catpro'=>$p]);
        }
       
    }
    function register(Request $req){
        
        $c= category::all();
        $p=product::join('categories','products.cat_id','categories.cat_id')->limit(90)->get();
        $sc= subcategory::all();

        if($req['regpassword'] == $req['confirm_password'])
        {
            $email=$req['regemail'];
            $qryemail=customer::where('email',$email)->count();
            if($qryemail > 0)
            {
                echo "<script>alert('You are already registered account !!');</script>";
                return view('account',['categories'=>$c,'subcategories'=>$sc,'catpro'=>$p]);
            }
            else
            {
                $customer= new customer;
                $c_name=$req['regname'];
                $password=$req['regpassword'];
                $cpassword=$req['confirm_password'];
                $phone_no=$req['regphone'];
                // $customer->img=$req->file('regimage')->store('docs');
                $address=$req['regaddress'];
                $village=$req['regvillage'];
                $district=$req['regdistrict'];
                $pin_code=$req['regpincode'];
                
                $qry=customer::insert([
                    "c_name"=>$c_name,
                    "email"=>$email,
                    "password"=>$password,
                    "phone_no"=>$phone_no,
                    "address"=>$address,
                    "village"=>$village,
                    "district"=>$district,
                    "pin_code"=>$pin_code
                ]);
                $req->session()->put('useremail',$email);
                return view('welcome',['categories'=>$c,'subcategories'=>$sc,'catpro'=>$p]); 
            }
        }
        else
        {
            echo "<script>alert('password must be same... !!');</script>";
            return view('account',['categories'=>$c,'subcategories'=>$sc,'catpro'=>$p]);
        } 
    }
   function log_out()
   {
        $c= category::all();
        $sc=subcategory::all();
        //$pro=product::all();
        session()->forget('useremail');
        return redirect('account');
   }
}
