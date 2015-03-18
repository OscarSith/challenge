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

	public function get()
	{
		return $this->where('estado', 'A')->paginate(8, array('id', 'path_img', 'path_thumb_img', 'codigo', 'nombre', 'packing', 'precio'));
	}
}