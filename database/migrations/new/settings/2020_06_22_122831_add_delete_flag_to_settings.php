<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeleteFlagToSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("INSERT INTO `settings` (`key`, `value`, `created_at`, `updated_at`, `type_id`, `order`) VALUES
        ('enable_delete', '1', '2020-06-03 08:08:38', '2020-06-03 08:08:38', 7, NULL);");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
