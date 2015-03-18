<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@home'));
Route::get('nosotros', 'HomeController@aboutUs');
Route::get('eventos', 'HomeController@events');
Route::get('contacto', 'HomeController@contact');
Route::get('productos', 'HomeController@products');


Route::group(array('before' => 'guest'), function($route){

	$route->get('login', 'AuthController@signinPage');
	$route->post('signin', array('as' => 'signin', 'uses' => 'AuthController@signin'));

});

Route::group(array('before' => 'auth'), function($route) {

	$route->get('admin', 'AdminController@admin');
	$route->post('add', array('as' => 'addProduct', 'uses' => 'AdminController@add'));
	$route->get('signout', array('as' => 'signout', 'uses' => 'AuthController@signout'));

});
