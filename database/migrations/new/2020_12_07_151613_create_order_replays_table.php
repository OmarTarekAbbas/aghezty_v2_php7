<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderReplaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_replays', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('order_id');
            $table->tinyInteger('status')->comment("1-pending 2-under_shipping 3-Finshed");;
            $table->longText('message')->nullable();
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
        Schema::dropIfExists('order_replays');
    }
}
