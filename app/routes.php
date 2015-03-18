<?php
Route::get('/', array('as' => 'home', 'uses' => 'HomeController@home'));
Route::get('nosotros', 'HomeController@aboutUs');
Route::get('eventos', 'HomeController@events');
Route::get('contacto', 'HomeController@contact');
Route::get('productos', 'HomeController@products');
Route::post('selected-product', array('as' => 'addToCart', 'uses' => 'HomeController@addProductToCart'));

Route::group(array('before' => 'guest'), function($route){

	$route->get('login', 'AuthController@signinPage');
	$route->post('signin', array('as' => 'signin', 'uses' => 'AuthController@signin'));

});

Route::group(array('before' => 'auth'), function($route) {

	$route->get('admin', 'AdminController@admin');
	$route->post('add', array('as' => 'addProduct', 'uses' => 'AdminController@add'));
	$route->get('signout', array('as' => 'signout', 'uses' => 'AuthController@signout'));

});
