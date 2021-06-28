<?php

namespace App\Http\Controllers;
use App\category;
use App\subcategory;
use App\product;

use Illuminate\Http\Request;

class menu extends Controller
{
    //
    function show_menu()
    {
        $c= category::all();
        $p=product::join('categories','products.cat_id','categories.cat_id')->limit(90)->get();
        $sc= subcategory::all();
        
        return view('welcome',['categories'=>$c,'subcategories'=>$sc,'catpro'=>$p]);
    }
    function account_show()
    {
        $c= category::all();
        $sc= subcategory::all();
            
        return view('account',['categories'=>$c,'subcategories'=>$sc]);
    }
}
