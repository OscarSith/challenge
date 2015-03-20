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
		return $this->where('estado', 'A')->orderBy('id', 'DESC')->paginate(10, array('id', 'path_thumb_img', 'codigo', 'nombre', 'packing', 'precio', 'created_at'));
	}
}