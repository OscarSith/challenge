<?php

class AdminController extends BaseController {

	public function admin()
	{
		$txt_loading = '';
		return View::make('admin', compact('txt_loading'));
	}

	public function add()
	{
		$Product = new Product();
		$Product->add(Input::all());
		return Redirect::back();
	}
}
