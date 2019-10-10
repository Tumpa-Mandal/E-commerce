<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/


Route::match(['get','post'],'/admin','AdminController@login');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Index page
Route::get('/','IndexController@index');

//category/listing page
Route::get('/products/{url}','ProductsController@products');

//product Detail Page
Route::get('/product/{id}','ProductsController@product');

//get product attribute price
Route::get('/get-product-price','ProductsController@getProductPrice');

//cart page
Route::match(['get','post'],'/cart','ProductsController@cart');

//Add to cart
Route::match(['get','post'],'/add-cart','ProductsController@addtocart');

//Delete Product From Cart Page
Route::get('/cart/delete-product/{id}','ProductsController@deleteCartProduct');

//update product Quantity in Cart

Route::get('/cart/update-quantity/{id}/{quantity}','ProductsController@updateCartQuantity');

//Apply Coupon
Route::post('/cart/apply-coupon','ProductsController@applyCoupon');

//Users Login/Register page
Route::get('/login-register','UsersController@userLoginRegister');
//User Register Form Submit
Route::post('/user-register','UsersController@register');
//Confirm Account
Route::get('confirm/{code}','UsersController@confirmAccount');
//User Login Form Submit
Route::post('user-login','UsersController@login');
//User Logout
Route::get('/user-logout','UsersController@logout');
//search Product
Route::post('/search-products','ProductsController@searchProducts');

//All routes after login
Route::group(['middleware'=>['frontlogin']],function(){
	//User Account Page
	Route::match(['get','post'],'account','UsersController@account');
	//check user current password
	Route::post('/check-user-pwd','UsersController@chkUserPassword');
	//update user password
	Route::post('/update-user-pwd','UsersController@updatePassword');
	//checkout page
	Route::match(['get','post'],'checkout','ProductsController@checkout');
	//order review page
	Route::match(['get','post'],'/order-review','ProductsController@orderReview');
	//place order
	Route::match(['get','post'],'/place-order','ProductsController@placeOrder');
	//Thanks Page
	Route::get('/thanks','ProductsController@thanks');
	//Paypal Page
	Route::get('/paypal','ProductsController@paypal');
	//Users Order page
	Route::get('/orders','ProductsController@userOrders');
	//Users Ordered product page
	Route::get('/orders/{id}','ProductsController@userOrderDetails');
	//Paypal Thanks Page
	Route::get('/paypal/thanks','ProductsController@thanksPaypal');
	//Paypal Cancel Page
	Route::get('/paypal/cancel','ProductsController@cancelPaypal');
});


//check if user already exists

Route::match(['GET','POST'],'/check-email','UsersController@checkEmail');

Route::group(['middleware'=>['adminlogin']],function(){
Route::get('/admin/dashboard','AdminController@dashboard');	
Route::get('/admin/settings','AdminController@settings');
Route::get('/admin/check-pwd','AdminController@chkPassword');
Route::match(['get','post'],'/admin/update-pwd','AdminController@updatePassword');

//Categories Routes(admin)
Route::match(['get','post'],'/admin/add-category','CategoryController@addCategory');
Route::match(['get','post'],'/admin/edit-category/{id}','CategoryController@editCategory');
Route::match(['get','post'],'/admin/delete-category/{id}','CategoryController@deleteCategory');
Route::get('/admin/view-categories','CategoryController@viewCategories');

//Products Routr
Route::match(['get','post'],'/admin/add-product','ProductsController@addProduct');
Route::match(['get','post'],'/admin/edit-product/{id}','ProductsController@editProduct');
Route::get('/admin/view-products','ProductsController@viewProducts');
Route::get('/admin/delete-product/{id}','ProductsController@deleteProduct');
Route::get('/admin/delete-product-image/{id}','ProductsController@deleteProductImage');

//Products Attribute Route
Route::match(['get','post'],'/admin/add-attributes/{id}','ProductsController@addAttributes');
Route::match(['get','post'],'/admin/edit-attributes/{id}','ProductsController@editAttributes');
Route::get('/admin/delete-attribute/{id}','ProductsController@deleteAttribute');
Route::match(['get','post'],'/admin/add-images/{id}','ProductsController@addImages');
Route::get('/admin/delete-alt-image/{id}','ProductsController@deleteAltImage');

//Coupon Route
Route::match(['get','post'],'/admin/add-coupon','CouponsController@addCoupon');
Route::match(['get','post'],'/admin/edit-coupon/{id}','CouponsController@editCoupon');
Route::get('/admin/view-coupons','CouponsController@viewCoupons');
Route::get('/admin/delete-coupon/{id}','CouponsController@deleteCoupon');

//Admin Banner Route
Route::match(['get','post'],'/admin/add-banner','BannersController@addBanner');
Route::match(['get','post'],'/admin/edit-banner/{id}','BannersController@editBanner');
Route::get('/admin/view-banners','BannersController@viewBanners');
Route::get('/admin/delete-banner/{id}','BannersController@deleteBanner');
//Admin Order Routes
Route::get('/admin/view-orders','ProductsController@viewOrders');
//Admin Order Details Route
Route::get('/admin/view-order/{id}','ProductsController@viewOrderDetails');
//Update Order Status
Route::post('/admin/update-order-status','ProductsController@updateOrderStatus');
Route::get('admin/view-users','UsersController@viewUsers');

});

Route::get('/logout','AdminController@logout');

