<?php

class Product extends Eloquent
{
	protected $table = 'products';

	protected $fillable = array(
		'codigo',
		'nombre',
		'descripcion',
		'packing',
		'precio',
		'path_img',
		'path_thumb_img',
	);

	public function add($values)
	{
		$this->fill($values);
		$this->save();
		return true;
	}

	public function get($flag = false)
	{
		$smt = $this;
		if (!$flag) {
			$smt = $this->where('estado', 'A');
		}
		return $smt->orderBy('id', 'DESC')->paginate(10, array('id', 'path_thumb_img', 'codigo', 'nombre', 'packing', 'precio', 'estado', 'created_at'));
	}

	public function remove($id)
	{
		$producto = Product::find($id);
		return $producto->delete();
	}

	public function changeStatus($values)
	{
		$producto = Product::find($values['id']);
		$producto->estado = $values['status'];
		return $producto->save();
	}
}