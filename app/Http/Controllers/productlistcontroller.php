<?php

namespace App\Http\Controllers;
use App\product;
use App\category;
use App\subcategory;
use App\customer;
use App\admin;
use Illuminate\Http\Request;

class productlistcontroller extends Controller
{
    function show_product(Request $req)
    {
        $c=subcategory::all();
        $sc=subcategory::all();
        $pro=product::join('customers','customers.c_id','products.c_id')->get();
        $email=$req->session()->get('adminemail');
        
        $user2=admin::where('a_email','like',$email)->get();
        
        $scname=subcategory::join('categories','categories.cat_id','subcategories.cat_id')->get();
        $procus=customer::join('products','products.c_id','customers.c_id')
            ->join('subcategories','products.subcat_id','subcategories.subcat_id')
            ->join('categories','products.cat_id','categories.cat_id')
            ->paginate(5);
        $product_count=product::count();
        return view('admin.product',['procus'=>$procus,'aname'=>$user2,'pcount'=>$product_count]); 

    }
     
}
