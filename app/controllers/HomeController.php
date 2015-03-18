<?php

class HomeController extends BaseController {

	public function home()
	{
		$background = 'home';
		return View::make('home', compact('background'));
	}

	public function aboutUs()
	{
		$background = 'us';
		return View::make('nosotros', compact('background'));
	}

	public function events()
	{
		$background = 'events';
		return View::make('eventos', compact('background'));
	}

	public function contact()
	{
		$background = 'contact';
		$message = '';
		if(Session::has('product')) {
			$message = "\n\n\nProductos Seleccionados\n------------------------------\n";
			foreach(Session::get('product') as $rec) {
				$message .= $rec['name']."\n";
			}
		}
		return View::make('contacto', compact('background', 'message'));
	}

	public function products()
	{
		$background = 'product';
		$Product = new Product();
		$data = $Product->get();
		return View::make('products', compact('background', 'data'));
	}

	public function addProductToCart()
	{
		Session::push('product', Input::only('id', 'name'));
		return Redirect::back();
	}
}
