<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumToContact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->char('lang',4)->nullable()->after('message');
            $table->string('name')->nullable()->after('message');
            $table->text('message')->nullable()->change();
            $table->integer('city_id')->unsigned()->nullable()->after('message');
            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->integer('product_id')->unsigned()->nullable()->after('message');
            $table->foreign('product_id')->references('id')->on('products')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('lang');
            $table->dropForeign('city_id');
            $table->dropForeign('product_id');
        });
    }
}
