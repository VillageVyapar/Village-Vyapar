<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use App\subcategory;
use App\wishlist;

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
    function del_wishlist($pid,$cid)
    {
    
        $c= category::all();
        $sc= subcategory::all();
        $qry=wishlist::where('c_id',$cid)->where('p_id',$pid)->delete();
        //dd($pid.$cid);
        return redirect()->back();
    }
}
