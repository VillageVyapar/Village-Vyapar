<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\feedback;

class reviewController extends Controller
{
    //
    public function addReview(Request $req){
       // dd($req->review.$req->cid.$req->pid);
       $f_date=date('Y-m-d');
       
        $check=feedback::where('p_id',$req->pid)->where('c_id',$req->cid)->count();
        if($check == 0 )
        {
            $insertqry=feedback::insert([
                'c_id'=>$req->cid,
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
