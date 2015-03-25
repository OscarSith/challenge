<?php
Route::get('/', array('as' => 'home', 'uses' => 'HomeController@home'));
Route::get('nosotros', 'HomeController@aboutUs');
Route::get('eventos', 'HomeController@events');
Route::get('contacto', 'HomeController@contact');
Route::get('productos', 'HomeController@products');
Route::get('productos/{name}-{id}', array('as' => 'productos', 'uses' => 'HomeController@products'));
Route::post('selected-product', array('as' => 'addToCart', 'uses' => 'HomeController@addProductToCart'));
Route::post('remove-selected-product', array('as' => 'removeToCart', 'uses' => 'HomeController@removeToCart'));
Route::post('send', 'HomeController@send');
Route::get('oskitar', function() {
	Session::forget('product');
});

Route::group(array('before' => 'guest'), function($route){

	$route->get('login', 'AuthController@signinPage');
	$route->post('signin', array('as' => 'signin', 'uses' => 'AuthController@signin'));

});

Route::group(array('before' => 'auth'), function($route) {

	$route->get('admin', 'AdminController@admin');
	$route->post('add', array('as' => 'addProduct', 'uses' => 'AdminController@add'));
	$route->get('signout', array('as' => 'signout', 'uses' => 'AuthController@signout'));
	$route->delete('remove-product', 'AdminController@remove');
	$route->put('change-status', 'AdminController@changeStatus');

});
