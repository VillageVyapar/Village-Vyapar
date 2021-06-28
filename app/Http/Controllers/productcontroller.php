<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\product;
use App\category;
use App\subcategory;
use App\customer;
use App\feedback;
use Illuminate\Http\Request;

class productcontroller extends Controller
{
    //
    function show_product($id)
    {
        $c=category::all();
        $sc=subcategory::all();
        $pro=product::join('customers','customers.c_id','products.c_id')->where('subcat_id',$id)->paginate(9);
        $scname=subcategory::join('categories','categories.cat_id','subcategories.cat_id')->where('subcat_id',$id)->get();

        return view('product',['categories'=>$c,'subcategories'=>$sc,'products'=>$pro,'scname'=>$scname]);
    }
    function priceAjax($price,$sid)
    {
          $product=product::where('p_price','<',$price)->where('subcat_id',$sid)->get();
        // foreach ($product as $p)
        // {
        //    $msg="{{$p}}";
        // }

            $msg=array();
            foreach($product as $p)
            {
                array_push($msg,"
                <li>
                  <figure>
                    <a  href=''><img style='width:270px;height:300px;float:left' src='/product_images/{$p['img']}'/></a>
                    <a class='aa-add-card-btn'href='#' style=''><span class='fa fa-shopping-cart'></span>Add To Cart</a>
                    <figcaption>
                      <h4 class='aa-product-title'><a href='#' style='float:left;padding-left:15px;'><b>{$p['p_name']}</b></a></h4>
                      <span class='aa-product-price' style='float:right;padding-right:15px;'> &#8377; {$p['p_price']}</span><span class='aa-product-price'></span>
                      <p class='aa-product-descrip'><b>Description : </b>{$p['p_desc']}</p><br>
                      <h4 class=''><a  style='float:left;padding-left:15px;'><b>{$p['c_name']}</b></a></h4>
                      <p style='float:right;padding-right:15px;'>{$p['p_date']}</p>

                    </figcaption>
                  </figure>                         
                  <div class='aa-product-hvr-content'>
                    <a href='#' data-toggle='tooltip' data-placement='top' title='Add to Wishlist'><span class='fa fa-heart-o'></span></a>
                    <a href='#' data-toggle='tooltip' data-placement='top' title='Compare'><span class='fa fa-exchange'></span></a>
                    <a href='#' data-toggle2='tooltip' data-placement='top' title='Quick View' data-toggle='modal' data-target='#quick-view-modal-{$p['p_id']}'><span class='fa fa-search'></span></a>                            
                  </div>
                </li>
                ");
            }
                 

        return response()->json(array('msg'=> $msg), 200);
    }
    function show_catwisepro($cid)
    {
        $c=category::all();
        $sc=subcategory::all();
        $pro=product::join('customers','customers.c_id','products.c_id')->where('cat_id',$cid)->paginate(9);
        $cname=category::select('cat_name')->where('cat_id',$cid)->get();

        return view('product',['categories'=>$c,'subcategories'=>$sc,'products'=>$pro,'cname'=>$cname]);
    }
    function search_product(Request $req)
    {   $s=$req->input('search');
        $c=category::all();
        $sc=subcategory::all();
        $pro=product::where('p_name','LIKE',"%$s%")->paginate();
        //dump($pro);
        //return view('product',['categories'=>$c,'subcategories'=>$sc,'products'=>$pro,'search'=>$s]);
        return view('product',['categories'=>$c,'subcategories'=>$sc,'products'=>$pro,'search'=>$s]);
    }
    function like($pid,$totallike)
    {
        $qry=product::where("p_id",$pid)->update(["total_like"=>$totallike+1]);
        $msg=$totallike+1;
        return response()->json(array('msg'=> $msg), 200);
        
    }
    function p_details($p,Request $res)
    {

        $fbcnt=feedback::join('customers','customers.c_id','feedback.c_id')->where('p_id',$p)->count();
        $feedb=feedback::join('customers','customers.c_id','feedback.c_id')->where('p_id',$p)->get();
        $pro=product::join('customers','products.c_id','customers.c_id')->join('categories','categories.cat_id','products.cat_id')->join('subcategories','subcategories.subcat_id','products.subcat_id')->where('p_id',$p)->get();
        
        $c=category::all();
        $sc=subcategory::all();
        $allpro=product::all();
        //$res->cookie('p_id',$p,300);
        //dd($res->cookie('p_id'));
        
        $email=$res->session()->get('useremail');
        $cust=customer::where('email',$email)->get();
        $productRev=product::where('p_id',$p)->get();
        return view('product_detail',['categories'=>$c,'subcategories'=>$sc,'products'=>$pro,'feedbacks'=>$feedb,'fbcnt'=>$fbcnt,'allproduct'=>$allpro,'customers'=>$cust,'proRev'=>$productRev]);
    }
    
}
