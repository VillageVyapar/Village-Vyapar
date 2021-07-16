<?php

namespace App\Http\Controllers;

use App\product;
use App\category;
use App\subcategory;
use App\customer;
use App\feedback;
use App\inquiry;
use Carbon\Carbon;
use PDF;
use Illuminate\Http\Request;

class dashboardcontroller extends Controller
{
    
    function show_details()
    {
        $email=session()->get('useremail');
        $cusname=customer::where('email','LIKE',$email)->get();
   
        $inq=inquiry::where('email',$email)->get();
       
       $procount=customer::join('products','products.c_id','customers.c_id')->where('email','LIKE',$email)->get();
       //select count(*) from products group by(`c_id`);
       foreach($cusname as $c)
        {
            //dd($c->c_id);
            $proview=product::where('c_id',$c->c_id)->limit(5)->orderBy('total_view','desc')->get();
        }
  
        return view('customer/customer_dashboard',['inquiry'=>$inq,'proview'=>$proview,'cusname'=>$cusname,'procus'=>$procount]);
    }
    function show_product_details()
    {
        $email=session()->get('useremail');
        $cusname=customer::where('email','LIKE',$email)->get();

        $cat=category::all();
        $scat=subcategory::all();
        $procus=customer::join('products','products.c_id','customers.c_id')->join('subcategories','products.subcat_id','subcategories.subcat_id')->join('categories','products.cat_id','categories.cat_id')->where('email','LIKE',$email)->paginate(5);
       // dd($procus);
      // return redirect()->route('customer_dasboard',['procus'=>$procus]);
        return view('customer/customer_product',['procus'=>$procus,'cusname'=>$cusname,'category'=>$cat,'subcategory'=>$scat]);   
    }
    function add_product(Request $res)
    {
        
        $ldate =Carbon::now();
        $cat=category::all();
        $scat=subcategory::all();
        $email=session()->get('useremail');
        $imageName = $res->file('proimg');
        
        
        $newname=time().'_'.$imageName->getClientOriginalName();
        $imageName->move( public_path('product_images'), $newname());
      
        $cusname=customer::where('email','LIKE',$email)->get();
         //$customer->img=$req->file('regimage')->store('docs');
        $procus=customer::join('products','products.c_id','customers.c_id')->join('subcategories','products.subcat_id','subcategories.subcat_id')->join('categories','products.cat_id','categories.cat_id')->where('email','LIKE',$email)->get();
        $qry = product::insert([    
            'p_name'=>$res['pname'],
            'p_price'=>$res['price'],
            'p_desc'=>$res['desc'],
            'p_date'=>$ldate,
            'QOH'=>$res['qty'],
            'img'=>$newname,
            'c_id'=>1,
            'cat_id'=>2,
            'subcat_id'=>4
            ]);
        if($qry)
        {
            echo "<script>alert('Inserted Successfully !!');</script>";
            return view('customer/customer_product',['procus'=>$procus,'cusname'=>$cusname,'category'=>$cat,'subcategory'=>$scat]);
        }
        else
        {
            echo "<script>alert('Something issue !!');</script>";
            //return view('customer/change_password',['cusname'=>$cusname,'procus'=>$procount]);
        }
       
    }
    function delete_product($id)
    {
        $email=session()->get('useremail');
        $cusname=customer::where('email','LIKE',$email)->get();
        $cat=category::all();
        $scat=subcategory::all();
        $procus=customer::join('products','products.c_id','customers.c_id')->join('subcategories','products.subcat_id','subcategories.subcat_id')->join('categories','products.cat_id','categories.cat_id')->where('email','LIKE',$email)->get();
        $del_qry=product::where('p_id',$id)->delete();
        if(isset($del_qry))
        {
            //echo "<script>alert('Delete Product successfully !!');</script>";
            return view('customer/customer_product',['procus'=>$procus,'cusname'=>$cusname,'category'=>$cat,'subcategory'=>$scat]);
        }
        else
        {
            echo "<script>alert('Not Delete Product successfully !!');</script>";
            return view('customer/customer_product',['procus'=>$procus,'cusname'=>$cusname,'category'=>$cat,'subcategory'=>$scat]);
        }
    }
    
    function customer_change_password()
    {
        $email=session()->get('useremail');
        $cusname=customer::where('email','LIKE',$email)->get();
       // dd($cusname);
       $procount=customer::join('products','products.c_id','customers.c_id')->where('email','LIKE',$email)->get();
        return view('customer/change_password',['cusname'=>$cusname,'procus'=>$procount]);
    }
    function change_password(Request $req)
    {
        $cp=$req['currentp'];
        $np=$req['newp'];
        $ncp=$req['newcp'];
        $email=session()->get('useremail');
        $cusname=customer::where('email','LIKE',$email)->get();
        $procount=customer::join('products','products.c_id','customers.c_id')->where('email','LIKE',$email)->get();
        echo $np.$ncp.$cp;
            foreach ($cusname as $c)
            {
                if($cp == $c['password'])
                {
                    if($np == $ncp)
                    {
                        $qry=customer::where('email',$email)->update(["password"=>$np]);
                        echo "<script>alert('new password updated !!');</script>";
                        return view('customer/change_password',['cusname'=>$cusname,'procus'=>$procount]);
                    }
                    else
                    {
                        echo "<script>alert('new password and confirm password must be same... !!');</script>";
                        return view('customer/change_password',['cusname'=>$cusname,'procus'=>$procount]);
                    }
                }
                else
                {
                    echo "<script>alert('current password not matched... !!');</script>";
                    return view('customer/change_password',['cusname'=>$cusname,'procus'=>$procount]);
                }
            }
    }
    function pdf()
    {
        $pdf=\App::make('dompdf.wrapper');
        $pdf->loadHTML($this->pdf_data());
        return $pdf->stream();
    }
    function pdf_data()
    {
        $email=session()->get('useremail');
        $pro_data=customer::join('products','products.c_id','customers.c_id')->join('subcategories','products.subcat_id','subcategories.subcat_id')->join('categories','products.cat_id','categories.cat_id')->where('email','LIKE',$email)->get();
        $output ="
        <h2 style='text-align:center;color:red'>Your Village Products  </h2>
        <hr><br>
        <table border=1  id='dataTables-example'>
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
        foreach($pro_data as $pc)
        {   
            $output .=" <tr class='odd gradeX'>
                    <td><img src='product_images/{$pc['img']}' style='height:100px;width:150px;'/><br><b>Total likes : ({{$pc['total_like']}})</b>
                    <td style='width:200px;'>{$pc['p_name']}</td>
                    <td>{$pc['p_price']}</td>
                    <td>{$pc['QOH']}</td>
                    <td>{$pc['cat_name']} <br>{$pc['subcat_name']} </td>
                    <td>{$pc['p_desc']}</td>
                </tr> ";
        }
    return $output;
    }
}