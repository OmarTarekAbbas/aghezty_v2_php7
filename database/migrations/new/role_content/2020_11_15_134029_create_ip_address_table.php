<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIPAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ip_address', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ip',191);
            $table->timestamps();
        });
        DB::statement("INSERT INTO `routes` (`id`, `method`, `route`, `controller_name`, `created_at`, `updated_at`, `function_name`) VALUES (NULL, 'get', 'reports', 'ReportIpController', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'index')");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ip_address');
    }
}
