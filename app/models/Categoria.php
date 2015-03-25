<?php

/**
* 
*/
class Categoria extends Eloquent
{
	protected $table = 'categoria';

	public function get()
	{
		return $this->all(array('id', 'nombre', 'path'));
	}
}