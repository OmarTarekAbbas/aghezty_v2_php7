<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->text('key_feature')->nullable()->after('stock');
            $table->text('warranty')->nullable()->after('key_feature');
            $table->text('delivery_time')->nullable()->after('warranty');
            $table->text('cash_on_delivery')->nullable()->after('delivery_time');
            $table->text('return_or_refund')->nullable()->after('cash_on_delivery');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
