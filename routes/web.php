<?php
use App\Http\Controllers\menu;
use App\Http\Controllers\productcontroller;
use App\Http\Controllers\dashboardcontroller;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\reviewController;
use App\Http\Controllers\Ajaxcontroller;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*  ***************        Customer Route       ************************ */

Route::get('/','menu@show_menu');
Route::get('/account','menu@account_show');

Route::post('/account','customercontroller@login');
Route::post('reg','customercontroller@register');  // registration
Route::get('product/{id}','productcontroller@show_product');
Route::get('products/{cid}','productcontroller@show_catwisepro');
Route::post('/product','productcontroller@search_product');
Route::get('like/{pid}/{totallike}','productcontroller@like');

Route::get('/logedout','customercontroller@log_out');
//Route::view('product','product');

Route::get('product_details/{p}','productcontroller@p_details');
Route::get('productAjaxprice/{pid}/{sid}','productcontroller@priceAjax');

Route::get('wishlist','wishlistcontroller@set_wishlist');
Route::get('newReview','reviewController@addReview');



/*  ***************        Customer Panel  Route       ************************ */


Route::get('chat','dashboardcontroller@chat_details');
Route::get('customer_dashboard','dashboardcontroller@show_details');

Route::get('customer_product','dashboardcontroller@show_product_details');

Route::get('change_password','dashboardcontroller@customer_change_password');
/*Route::get('profile',function(){
    return view('product');
});*/
Route::get('setsubcat/{cid}','Ajaxcontroller@set_subcat'); // Ajax


route::get('profile','profileController@prodetails');
route::post('updateProfile','profileController@update');

Route::post('change_pass','dashboardcontroller@change_password');
Route::post('insertproducts','dashboardcontroller@add_product');
Route::get('del_product/{pid}','dashboardcontroller@delete_product');
Route::get('download','dashboardcontroller@pdf');


/*  ***************        Admin  Panel  Route       ************************ */