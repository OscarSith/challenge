<?php

class AdminController extends BaseController {

	public function admin($id)
	{
		$Product = new Product();
		$Categoria = new Categoria();

		$productos = $Product->get(true, $id);
		$categorias = $Categoria->get();

		$dataCategorias = array();
		foreach ($categorias->toArray() as $key) {
			$dataCategorias[$key['id']] = $key['nombre'];
		}
		$title = 'Challenge - Admin';
		return View::make('admin', compact('title', 'productos', 'dataCategorias', 'id'));
	}

	public function add() {
		$file = Input::file('path_thumb_img');
		$type = $file->getMimeType();
		if ($type === 'image/png' || $type === 'image/jpeg' || $type === 'image/gif' || $type === 'image/jpg') {
			if ($file->isValid()) {
				$values = Input::only('categoria_id', 'codigo', 'nombre', 'packing', 'precio');
				$fileName = str_replace([' ', '-'], '_', $file->getClientOriginalName());
				$values['path_thumb_img'] = $fileName;
				$values['path_img'] = $fileName;

				try {
					Image::make($file->getRealPath())->resize('340', '320')->save(public_path('/img/productos/'.$fileName));
				} catch (Exception $ex) {
					Log::error($ex->getMessage());
					return Redirect::back()->with('error', 'Ups... no se puede procesar el archivo subido, contacte con Blue360');
				}

				$Product = new Product();
				$Product->add($values);
				return Redirect::back();
			} else {
				return Redirect::back()->with('error', 'La imagen subida no es válida, verifique bien.');
			}
		} else {
			return Redirect::back()->with('error', 'Solo se aceptan imagenes tipo <strong>jpg</strong>, <strong>png</strong> o <strong>gif</strong>');
		}
	}

	public function remove()
	{
		$id = Input::get('id');
		$Product = new Product();
		if($Product->remove($id)) {
			return Redirect::back()->with('success', 'Producto eliminado exitosamente');
		}

		return Redirect::back()->with('error', 'Error, no se pudo eliminar le producto, intentelo de nuevo');
	}

	public function changeStatus()
	{
		$Product = new Product();
		if(!$Product->changeStatus(Input::only('id','status'))) {
			return Redirect::back()->with('error', 'Error, no se pudo ejecutar su proceso, intentelo de nuevo.');
		}

		return Redirect::back();
	}
}
