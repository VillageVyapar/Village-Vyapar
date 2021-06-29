<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\subcategory;
use App\wishlist;
use DB;

class wishlistcontroller extends Controller
{
    //
    function set_wishlist()
    {
        $c= category::all();
        $sc= subcategory::all();
        $email=session()->get('useremail');
        $wishlist=wishlist::join('customers','customers.c_id','wishlists.c_id')->join('products','products.p_id','wishlists.p_id')->where('email',$email)->get();
            
       // dd($wishlist);
        return view('wishlist_view',['categories'=>$c,'subcategories'=>$sc,'wishlist'=>$wishlist]);
        
    }
    function addWishlist($pid)
    {
        $email=session()->get('useremail');
        $cid=DB::select("select c_id from customers where email=?",[$email]);
        foreach($cid as $c)
        {
           
            $wishAlready=wishlist::where('c_id',$c->c_id)->where('p_id',$pid)->count();
        
            if($wishAlready==0){
                $wishlist=new wishlist;
                $wishlist->p_id=$pid;    
                $wishlist->c_id=$c->c_id;
                $wishlist->save();
                if(isset($wishlist))
                {
                    // echo "<script>alert(' Thanks for giving feedback !!');</script>";
                    return redirect()->back()->with("Thanks");
                }
            
            }
            else{
                // echo "<script>alert(' You have already given feedback !!');</script>"; 
                return redirect()->back("fail");
            }
            
        }

        
    }
}
