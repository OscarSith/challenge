<?php

class AuthController extends BaseController
{
	public function signinPage()
	{
		$txt_loading = 'Entrando';
		return View::make('signin', compact('txt_loading'));
	}

	public function signin()
	{
		$back = Redirect::to('admin');
		$data = Input::only(array('email', 'password', 'remember'));
		$credentials = array(
			'email' => $data['email'], 
			'password' => $data['password']
		);

		if (Auth::attempt($credentials, $data['remember']))
		{
			$back = Redirect::intended('admin');
		}
		else
		{
			$back->with('login_error', 1);
		}
		return $back;
	}

	public function signout()
	{
		Auth::logout();
		return Redirect::to('login');
	}
}
