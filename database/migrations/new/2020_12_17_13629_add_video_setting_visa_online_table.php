<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddVideoSettingVisaOnlineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      DB::statement("INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`, `type_id`, `order`) VALUES (NULL, 'visa_online', 'uploads/settings_videos/5fdb44ff8e782.mp4', '2020-12-17 11:46:07', '2020-12-17 11:46:07', '4', NULL)");
      DB::statement("UPDATE `advertisements` SET `ads_url` = 'http://localhost/aghezty_v2_php7/clients/visa_online', `created_at` = NULL WHERE `advertisements`.`id` = 13");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
