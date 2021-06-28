<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\feedback;

class reviewController extends Controller
{
    //
    public function addReview(Request $req){
        dd($req->review);
        
        $feedback = new customer;
        $feedback->c_id=$req->c_id;
        $feedback->p_id=$req->p_id;
        $feedback->desc=$req->desc;
        $feedback->f_date=date('Y-m-d');
        // $feedback->save();
        dd($feedback);
        // return back();
    }
}
