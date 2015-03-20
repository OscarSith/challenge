<?php

class AdminController extends BaseController {

	public function admin()
	{
		$Product = new Product();
		$productos = $Product->get();
		$title = 'Challenge - Admin';
		return View::make('admin', compact('title', 'productos'));
	}

	public function add()
	{
		$file = Input::file('path_thumb_img');
		if ($file->isValid()) {
			$values = Input::only('codigo', 'nombre', 'packing', 'precio');
			$fileName = str_replace(' ', '_', $file->getClientOriginalName());
			$values['path_thumb_img'] = $fileName;
			$values['path_img'] = $fileName;

			$file->move(public_path().'/img/productos', $fileName);

			$Product = new Product();
			$Product->add($values);
			return Redirect::back();
		} else {
			return Redirect::back()->with('file', 1);
		}
	}
}
