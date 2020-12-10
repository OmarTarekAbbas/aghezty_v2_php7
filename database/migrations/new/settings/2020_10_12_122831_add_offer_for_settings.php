<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOfferForSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("ALTER TABLE `categories` ADD `offer_image` VARCHAR(191) NULL DEFAULT NULL AFTER `image`;");
        \DB::statement("INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`, `type_id`, `order`) VALUES (NULL, 'brands_image', 'uploads/settings_images/5fd222d7910ab.png', '2020-12-10 13:29:59', '2020-12-10 13:29:59', '3', NULL)");
        \DB::statement("INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`, `type_id`, `order`) VALUES (NULL, 'offers_image', 'uploads/settings_images/5fd222d7910ab.png', '2020-12-10 13:29:59', '2020-12-10 13:29:59', '3', NULL)");
        \DB::statement("INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`, `type_id`, `order`) VALUES (NULL, 'services_offer', 'uploads/settings_images/5fd222d7910ab.png', '2020-12-10 13:29:59', '2020-12-10 13:29:59', '3', NULL)");
        \DB::statement("INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`, `type_id`, `order`) VALUES (NULL, 'contacts_offer', 'uploads/settings_images/5fd222d7910ab.png', '2020-12-10 13:29:59', '2020-12-10 13:29:59', '3', NULL)");
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
