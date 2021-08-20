<?php

namespace App\Http\Controllers;
use App\product;
use App\category;
use App\subcategory;
use App\customer;
use App\admin;
use App\inquiry;
use PDF;
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
            ->simplePaginate(5);
        $product_count=product::count();
        $inquiry=inquiry::where('checked',0)->get();
        return view('admin.product',['inquiry'=>$inquiry,'procus'=>$procus,'aname'=>$user2,'pcount'=>$product_count]); 

    }
    function deleteproduct(Request $req,$id)
    {
        
      product::where('p_id',$id)->delete();
      return redirect()->back();
    }
     
    public function ajax_product_search($pname)
    {
        $pro=product::join('categories','categories.cat_id','products.cat_id')->join('subcategories','subcategories.subcat_id','products.subcat_id')->where('p_name','LIKE','%'.$pname.'%')->get();
        $msg ="";
        
            foreach ($pro as $pc)
            {
                $msg.="
                <tr class='odd gradeX'>
                    <td><img src='product_images/{$pc['img']}' style='height:130px;width:180px;'>
                    <td style='width:200px;'>{$pc['p_name']}</td>
                    <td>{$pc['p_price']}</td>
                    <td>{$pc['cat_name']} <br>{$pc['subcat_name']} 
                    </td>
                    <td>
                    <div style='width:250px;height:100px;overflow:scroll'>
                    {$pc['p_desc']}</div>
                    </td>
                    <td class='center'>
                    <a href='#'><button
                    type='button'
                    class='btn btn-primary'>View</button></a><br><br>
                    <a href='#'><button
                    type='button' class='btn btn-danger'>Delete</button></a>
                    </td>
                    </tr>";
            }

        return response()->json(array('msg'=> $msg), 200);
    }
    function pdf($cid)
    {
        $pdf=\App::make('dompdf.wrapper');
        $pdf->loadHTML($this->pdf_cust_product($cid));
        return $pdf->stream();
    }
    function pdf_cust_product($cid)
    {
        $cusdata=customer::where('c_id',$cid)->get();
        $pro_data=customer::join('products','products.c_id','customers.c_id')->join('subcategories','products.subcat_id','subcategories.subcat_id')->join('categories','products.cat_id','categories.cat_id')->where('customers.c_id',$cid)->get();
        
        //dd($pro_data);
        foreach($cusdata as $c)
        {
            $output ="
                <div style='border:1px solid black;height:300px'>
                    <img src='customer_img/{$c['c_img']}' style='padding:10px;float:left;border-radius:50%;width:80px;height:80px'; />
                    
                    <h2 style=';color:red'>{$c->c_name}'s Products  </h2><br><br>
                    <div style='float:left;padding-left:20px;'>
                        <p ><b>Email : </b> {$c->email}</p>
                        <p style=''><b>Phone no: </b> {$c->phone_no}</p>
                        <p ><b>Address : </b> {$c->address}</p>
                        <p ><b>Village : </b> {$c->village}</p>
                        <p ><b>Pincode : </b> {$c->pin_code}</p>
                    </div>
                </div>
                    <hr><br>
                    
                    <table border=1 style='width:98%;text-align:center;'   id='dataTables-example'>
                    <thead>
                    <tr>
                    <th>Image & likes</th>
                        <th>Name </th>
                        <th>Price (₹) </th>
                        <th>Quantity </th>
                        <th>Category & <br>Sub category</th>
                        <th>Description</th>
                        </tr>
                        </thead>
                        <tbody>
                
                ";
        }
        if(count($pro_data)>0)
        {
            foreach($pro_data as $pc)
            {   
                    
                $output .=" <tr class='odd gradeX'>
                        <td><img src='product_images/{$pc['img']}' style='height:100px;width:150px;'/><br><b>Total likes : ({$pc['total_like']})</b>
                        <td style='width:200px;'>{$pc['p_name']}</td>
                        <td>{$pc['p_price']}</td>
                        <td>{$pc['QOH']}</td>
                        <td>{$pc['cat_name']} <br>{$pc['subcat_name']} </td>
                        <td>{$pc['p_desc']}</td>
                    </tr> ";
            }
        }
        else
        {
            foreach($pro_data as $pc)
            {   
                    
                $output .=" <tr class='odd gradeX'>
                            <td>Product is Empty !!</td>
                    </tr> ";
            }
        }
       
        return $output;
    }
}