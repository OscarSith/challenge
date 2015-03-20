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

	public function send()
	{
		$data = Input::only('fullname', 'email', 'message_send');
		$data['message_send'] = nl2br($data['message_send']);

		Mail::send('emails.email_contact', $data, function($message) {
			$message->to('larriega@gmail.com', 'Oscar Larriega')->subject('Cotización enviada desde la web de Challenge');
		});
		Session::forget('product');
		return Redirect::back()->with('success', 'Mensaje enviado exitosamente.');
	}
}
