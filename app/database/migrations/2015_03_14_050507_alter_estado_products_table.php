<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEstadoProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::statement('ALTER TABLE products CHANGE COLUMN estado estado CHAR(1) DEFAULT "A"');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::statement('ALTER TABLE products CHANGE COLUMN estado estado CHAR(1) NOT NULL');
	}

}
