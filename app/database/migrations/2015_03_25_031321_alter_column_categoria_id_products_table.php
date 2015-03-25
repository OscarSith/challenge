<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterColumnCategoriaIdProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('products', function($table)
		{
			$table->integer('categoria_id')->unsigned()->after('id');
			$table->foreign('categoria_id')->references('id')->on('categoria');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('products', function($table)
		{
			$table->dropForeign('products_categoria_id_foreign');
			$table->dropColumn('categoria_id');
		});
	}

}
