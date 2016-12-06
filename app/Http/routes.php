<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

//PRODUCTS

Route::get('/products/{type}', 'ProductController@index');
Route::get('/products', 'ProductController@getAllProducts');
Route::get('/products/{type}/{slug}', 'ProductController@showProductDetail');
Route::get('/cards/{flowers_row_id}', 'ProductController@showCards');

Route::auth();

Route::group(['middleware' => ['web']], function () {

	// ACCOUNT
	
    Route::get('/account','AccountController@show');
	Route::get('/account/edit','AccountController@edit');
	Route::post('/account/update','AccountController@update');
	Route::get('/account/orders', 'AccountController@showOrders');
	Route::get('/account/order/id', 'AccountController@showOrderDetail');
});

// CREATE NEW ACCOUNT

Route::get('/account/create','AccountController@create');
Route::post('/account/create','AccountController@store');
Route::get('/account/verify/{email}/{confirmation_code}','AccountController@verify');

// CART

Route::get('/cart/get', 'CartController@getCartContents');
Route::get('/cart/add/{id}','CartController@addItemToCart');
Route::get('/cart/update/{id}/{qty}','CartController@updateCartItem');
Route::get('/cart/remove/{id}','CartController@removeCartItem');

//CARD

Route::get('/card/{card_id}/customization/{flowers_row_id}','ProductController@showCardCustomization');
Route::post('/card/details/save', 'CartController@addCardToCart');
Route::get('/cart/remove/card/{row_id}', 'CartController@removeCard');

// CHECKOUT

Route::get('/checkout', 'CheckoutController@index');
Route::get('/checkout/overview', 'CheckoutController@showOverview');
Route::post('/checkout/delivery', 'CheckoutController@saveOrder');
Route::get('/checkout/delivery', 'CheckoutController@showDelivery');
Route::post('/checkout/order/create', 'CheckoutController@createOrder');
Route::get('/checkout/payment', 'PaymentController@index');
Route::get('/checkout/payment/create/{payment_id}', 'PaymentController@create');
Route::post('/checkout/payment/handle', 'PaymentController@handleResponse');
Route::get('/checkout/success/{order_id}', 'CheckoutController@showSuccess');

// ADMIN

Route::group(['prefix' => 'admin','namespace' => 'admin'], function () {
    Route::get('orders/open', 'AdminOrdersController@showOpenOrders');
    Route::get('/orders/completed', 'AdminOrdersController@showCompletedOrders');
    Route::get('/order/{id}', 'AdminOrdersController@showOrderDetail');
});
