<?php
use App\Http\Controllers\menu;
use App\Http\Controllers\productcontroller;
use App\Http\Controllers\dashboardcontroller;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\reviewController;
use App\Http\Controllers\Ajaxcontroller;
use App\Http\Controllers\contactformcontroller;
use App\Http\Controllers\wishlistcontroller;
use  App\Http\Controllers\chatcontroller;
use  App\Http\Controllers\inquirycontroller;
use Illuminate\Support\Facades\Route;

// admin
use  App\Http\Controllers\adminlogincontroller;

use  App\Http\Controllers\productlistcontroller;
use  App\Http\Controllers\categorycontroller;
use  App\Http\Controllers\subcategorycontroller;
use  App\Http\Controllers\admincustomercontroller;
use  App\Http\Controllers\adminProfileController;



use App\Http\Controlers\MailController;
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
Route::get('subscription','customercontroller@subscription_pack');

Route::get('/','menu@show_menu');
Route::get('/account','menu@account_show');

Route::post('/account','customercontroller@login');
Route::post('reg','customercontroller@register');
Route::post('verify_acc','customercontroller@verify_otp');
// registration
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

Route::get('product/addWish/{pid}','wishlistcontroller@addWishlist');
Route::get('delwishlist/{pid}','wishlistcontroller@del_wishlist');

route::get("deleteFeedback/{cid}/{pid}","productcontroller@del_feedback");

route::get("deleteFeedback/{cid}/{pid}","productcontroller@del_feedback");
Route::get('customerchat/{cid}','chatcontroller@insert_customer_in_chat');
Route::post('forgot_pass/','customercontroller@forgot_password');

route::post("deleteFeedback/{cid}/{pid}","productcontroller@del_feedback");

route::get('contactform',[contactformcontroller::class,'contactdetail']);
route::post('inquiryaction',[contactformcontroller::class,'insert_inquiry']);

/*  ***************        Customer Panel  Route       ************************ */


Route::get('chat','chatcontroller@chat_details');
Route::get('chat_detail/{cid}','chatcontroller@chat_ajax');
Route::get('insert_chat/{cid}','chatcontroller@insert_chat_detail');

Route::get('customer_dashboard','dashboardcontroller@show_details');

Route::get('customer_product','dashboardcontroller@show_product_details');

Route::get('change_password','dashboardcontroller@customer_change_password');
/*Route::get('profile',function(){
    return view('product');
});*/
Route::get('setsubcat/{cid}','Ajaxcontroller@set_subcat'); // Ajax

route::get('profile','profileController@prodetails');
route::post('updateProfile','profileController@update');
route::post('updateDP','profileController@updateDP');

Route::post('change_pass','dashboardcontroller@change_password');
Route::post('insertproducts','dashboardcontroller@add_product');
Route::get('del_product/{pid}','dashboardcontroller@delete_product');
Route::post('editProduct','dashboardcontroller@edit_product');
Route::get('download','dashboardcontroller@pdf');
Route::get('customer_inquiry',[inquirycontroller::class,'customer_All_inquirydet']);
Route::get('del_inquiry/{iid}',[inquirycontroller::class,'delete_inquiry']);
/*  ***************        Admin  Panel  Route       ************************ */


Route::get('dashboard', function () {
    return view('admindashboard');
});
Route::get('dashboard',[adminlogincontroller::class,'dashboard']);

route::view('adminlogin','admin/adminlogin');

Route::post("adminlogin",[adminlogincontroller::class,'adminlogin']);
Route::get("logout",[adminlogincontroller::class,'adminlogout']);
Route::get("productdetail",[productlistcontroller::class,'show_product']);
Route::get("categorydetail",[categorycontroller::class,'show_category']);
Route::get("subcategorydetail",[subcategorycontroller::class,'show_subcategory']);
Route::get('admineditcategory/{cid}', function () {
    return view('admineditcategory');
});
Route::get("admineditcategory/{cid}",[categorycontroller::class,'show_edit_category']);

Route::post("edit_category",[categorycontroller::class,'edit_category']);

Route::get("adminprofile",[adminlogincontroller::class,'adminviewprofile']);
Route::get("admincustomer",[admincustomercontroller::class,'view_customer']);
Route::get("adminlist",[adminlogincontroller::class,'view_admin']);
route::post('adminUpdateProfile',"adminProfileController@editProAdmin");
Route::get("deleteproduct/{id}",[productlistcontroller::class,'deleteproduct']);
Route::get("deletecategory/{id}",[categorycontroller::class,'deletecategory']);
Route::get("delete_customer/{id}",[admincustomercontroller::class,'delete_customer']);
Route::get("deletesubcategory/{id}",[subcategorycontroller::class,'deletesubcategory']);

Route::get("admininquiry",[inquirycontroller::class,'admin_inquiry']);

route::view('fpass','admin/fpass');
Route::post('send-mail','MailController@basic_email');
route::post('newpass','adminlogincontroller@newpassword');

route::get('admingetproduct/{pname}',[productlistcontroller::class,'ajax_product_search']);
Route::post('/reply',[inquirycontroller::class,'reply_inq']);

route::post('insertcat','categorycontroller@add_cat');
route::post('insertsubcat','subcategorycontroller@add_subcat');
route::post('editsubcat','subcategorycontroller@edit_subcat');
route::get('customerProduct','admincustomercontroller@view_custopro');