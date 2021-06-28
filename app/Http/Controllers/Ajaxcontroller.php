<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product;
use App\category;
use App\subcategory;
use App\customer;


class Ajaxcontroller extends Controller
{
    //
    function set_subcat($cid)
    {
        $cid=category::join('subcategories','subcategories.cat_id','categories.cat_id')->where('cat_name','LIKE',$cid)->get();

        $msg=array();
        foreach($cid as $c)
        {
            array_push($msg,"<option>{$c->subcat_name}</option>");
        }

      return response()->json(array('msg'=> $msg), 200);
    }
}
