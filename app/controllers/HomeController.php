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
				$message .= $rec['codigo'].' -> '.$rec['name']."\n";
			}
		}
		return View::make('contacto', compact('background', 'message'));
	}

	public function products($name = null, $id = 0)
	{
		$background = 'product';
		$Product = new Product();
		$Categoria = new Categoria();

		$data = $Product->get(false, $id);
		$categorias = $Categoria->get($id);

		return View::make('products', compact('background', 'data', 'categorias'));
	}

	public function addProductToCart()
	{
		Session::push('product', Input::only('id', 'name', 'codigo'));
		return Response::json(array('type' => 'add'));
	}

	public function removeToCart()
	{
		$values = Input::only('id');
		$data = Session::get('product');
		$n = 0;

		foreach ($data as $rec) {
			if($rec['id'] == $values['id']) {
				unset($data[$n]);
				break;
			}
			$n++;
		}
		if (count($data)) {
			sort($data);// Reordeno los indices
			Session::set('product', $data);
		} else {
			Session::forget('product');
		}
		return Response::json(array('type' => 'remove'));
	}

	public function send()
	{
		$data = Input::only('fullname', 'email', 'message_send');
		$data['message_send'] = nl2br($data['message_send']);

		Mail::send('emails.email_contact', $data, function($message) {
			$message->to('challengerperu@gmail.com', 'Challenge Perú')->subject('Cotización enviada desde la web de Challenge');
		});
		Session::forget('product');
		return Redirect::back()->with('success', 'Mensaje enviado exitosamente.');
	}
}
