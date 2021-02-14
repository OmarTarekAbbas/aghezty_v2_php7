<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeleteForProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

      $name_database = env('DB_DATABASE');
      \DB::statement("CREATE TABLE `$name_database`.`delete_products` ( `id` INT(10) NOT NULL AUTO_INCREMENT , `product_id` INT(10) UNSIGNED NOT NULL , `category_id` INT(10) UNSIGNED NOT NULL , `created_at` TIMESTAMP NULL DEFAULT NULL , `updated_at` TIMESTAMP NULL DEFAULT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;");
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
