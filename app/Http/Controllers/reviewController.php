<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\feedback;
use App\customer;

class reviewController extends Controller
{
    //
    public function addReview(Request $req){
       // dd($req->review.$req->cid.$req->pid);
       $f_date=date('Y-m-d');

       $email=session()->get('useremail');
        $cusname=customer::where('email','LIKE',$email)->get();
        foreach($cusname as $c)
        {
            $check=feedback::where('p_id',$req->pid)->where('c_id',$c->c_id)->count();
            if($check == 0 )
            {
                $insertqry=feedback::insert([
                    'c_id'=>$c->c_id,
                    'p_id'=>$req->pid,
                    'desc'=>$req->review,
                    'f_date'=>$f_date
                   
                ]); 
                if(isset($insertqry))
                {
                    echo "<script>alert(' Thanks for giving feedback !!');</script>";
                    return redirect()->back();
                }
                
            }
            else
            {
               
                    echo "<script>alert(' You have already given feedback !!');</script>"; 
                    return redirect()->back();
            }
    
        }
       
              
       
    }
}
