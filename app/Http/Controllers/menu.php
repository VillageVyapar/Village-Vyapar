<?php

namespace App\Http\Controllers;
use App\category;
use App\subcategory;
use App\product;
use DB;

use Illuminate\Http\Request;

class menu extends Controller
{
    //
    function show_menu()
    {
        $c= category::all();
        $p=product::join('categories','products.cat_id','categories.cat_id')->limit(90)->get();
        $sc= subcategory::all();
        $latest=product::join('categories','products.cat_id','categories.cat_id')->join('subcategories','products.subcat_id','subcategories.subcat_id')->join('customers','products.c_id','customers.c_id')->orderby('p_id','DESC')->limit(6)->get();
        $popular=product::join('categories','products.cat_id','categories.cat_id')->join('subcategories','products.subcat_id','subcategories.subcat_id')->join('customers','products.c_id','customers.c_id')->orderby('total_like','DESC')->limit(8)->get();
       // dd($popular);
        return view('welcome',['popular'=>$popular,'latest'=>$latest,'categories'=>$c,'subcategories'=>$sc,'catpro'=>$p]);
    }
    function account_show()
    {
        $c= category::all();
        $sc= subcategory::all();
            
        return view('account',['categories'=>$c,'subcategories'=>$sc]);
    }
}