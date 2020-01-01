<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('published_date');
			$table->boolean('active');
			$table->string('url', 191);
			$table->integer('product_id')->unsigned()->index('posts_product_id_foreign');
			$table->integer('operator_id')->unsigned()->index('posts_operator_id_foreign');
			$table->integer('user_id')->unsigned()->index('posts_user_id_foreign');
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
		Schema::drop('posts');
	}

}
