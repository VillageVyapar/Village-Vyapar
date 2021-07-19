<?php

namespace App\Http\Controllers;
use App\customer;
use App\category;
use App\product;
use App\subcategory;
use App\plan;
use App\inquiry;
use Mail;
use Crypt;

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
            
            $pass= $r->input('password');

            $user=customer::where('email','LIKE',$email)->count();
            $det=customer::where('email','LIKE',$email)->get();
            
            if($user >0 && $pass == Crypt::decrypt($det[0]->password))
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
        
        $c=category::all();
        $sc=subcategory::all();
        $p=product::join('categories','products.cat_id','categories.cat_id')->limit(50)->get();
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
                $password=Crypt::encrypt($req['regpassword']);
                $cpassword=$req['confirm_password'];
                $phone_no=$req['regphone'];
                // $customer->img=$req->file('regimage')->store('docs');
                $address=$req['regaddress'];
                $village=$req['regvillage'];
                $district=$req['regdistrict'];
                $pin_code=$req['regpincode'];
                
                
                $random=rand(111111,999999);
                $req->session()->put(['random'=>$random,'cname'=>$c_name,'email'=>$email,'password'=>$password,'address'=>$address,'village'=>$village,'district'=>$district,'pincode'=>$pin_code,'phoneno'=>$phone_no]);
                
                $user=['email'=>$email];
                
                Mail::send('otp_mail_template',['random'=>$random,'email'=>$email],function($message) use ($user){
                    $message->to($user['email']);
                    $message->subject('OTP Verification ');
               });
               
               echo "<script>alert('OTP sent in your Email address ');</script>";
               //return "<script>location.href='otp_form'</script>";
                return view('otp_form',['email'=>$email]); 
            }
        }
        else
        {
            echo "<script>alert('password must be same... !!');</script>";
            return view('account',['categories'=>$c,'subcategories'=>$sc,'catpro'=>$p]);
        } 
    }
    function verify_otp(Request $res)
    {
        $c= category::all();
        $p=product::join('categories','products.cat_id','categories.cat_id')->limit(90)->get();
        $sc= subcategory::all();

        $rnd=session()->get('random');
        $cname=session()->get('cname');
        $email=session()->get('email');
        $password=session()->get('password');
        $phoneno=session()->get('phoneno');
        $address=session()->get('address');
        $village=session()->get('village');
        $district=session()->get('district');
        $pin_code=session()->get('pincode');
        

        $userrnd=$res->otp;
        if($userrnd == $rnd)
        {
            $qry=customer::insert([
                "c_name"=>$cname,
                "email"=>$email,
                "password"=>$password,
                "phone_no"=>$phoneno,
                "address"=>$address,
                "village"=>$village,
                "district"=>$district,
                "pin_code"=>$pin_code
            ]);
            $res->session()->put('useremail',$email);
            return view('welcome',['categories'=>$c,'subcategories'=>$sc,'catpro'=>$p]);
        }
        else
        {
            echo "<script>alert('Invalid OTP verification !! ');</script>";
            return view('account',['categories'=>$c,'subcategories'=>$sc,'catpro'=>$p]);
        }
    }
    function subscription_pack()
    {
        $c= category::all();
        $sc=subcategory::all();
        $p=plan::all();
        return view('subscription',['plan'=>$p,'categories'=>$c,'subcategories'=>$sc]);
    }
   function log_out()
   {
        $c= category::all();
        $sc=subcategory::all();
        //$pro=product::all();
        session()->forget('useremail');
        return redirect('account');
   }
   function forgot_password(Request $res)
   {
       $customerdetail=customer::where('email','LIKE',$res->email)->get();
      //  dd($customerdetail);
      $user=['email'=>$res->email];
        if(count($customerdetail) > 0) 
        {
            Mail::send('mail_forgetpass',['customerdetail'=>$customerdetail],function($message) use ($user){
                $message->to($user['email']);
                $message->subject('Reset Password');
           });
           echo "<script>alert('Password sent in your Registered Email address ');</script>";
           return "<script>location.href='/'</script>";
        }
        else
        {
            echo "<script>alert('Email id not registered !!! ');</script>";
            return "<script>location.href='account'</script>";
        }
   }
}