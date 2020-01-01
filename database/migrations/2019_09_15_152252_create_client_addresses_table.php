<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientAddressesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('client_addresses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('address', 191);
			$table->text('details', 65535);
			$table->integer('city_id')->unsigned()->index('client_addresses_city_id_foreign');
			$table->integer('client_id')->unsigned()->index('client_addresses_client_id_foreign');
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
		Schema::drop('client_addresses');
	}

}
