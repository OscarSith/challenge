<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function($table)
		{
			$table->increments('id');
			$table->char('codigo', 8);
			$table->string('nombre', 255);
			$table->text('descripcion')->nullable();
			$table->string('cracking', 20);
			$table->string('packing', 20);
			$table->decimal('precio', 10, 2);
			$table->char('estado', 1);
			$table->string('path_img', 255);
			$table->string('path_thumb_img', 255);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}
