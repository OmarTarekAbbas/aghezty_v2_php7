<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientRatesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('client_rates', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('rate');
			$table->text('comment', 65535);
			$table->boolean('publish');
			$table->integer('client_id')->unsigned()->index('client_rates_client_id_foreign');
			$table->integer('product_id')->unsigned()->index('client_rates_product_id_foreign');
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
		Schema::drop('client_rates');
	}

}
