<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeAllTableInnodb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      $res = \DB::select("SELECT  CONCAT('ALTER TABLE `', table_name, '` ENGINE=InnoDB;') AS sql_statements FROM  information_schema.tables AS tb WHERE  table_schema = 'aghezty2' AND  `ENGINE` = 'MyISAM' AND  `TABLE_TYPE` = 'BASE TABLE' ORDER BY table_name DESC");
      foreach ($res as $re) {
        \DB::statement($re->sql_statements);
      }
      \DB::statement("SET FOREIGN_KEY_CHECKS=0;");
      \DB::statement("SET Global FOREIGN_KEY_CHECKS=0;");
      \DB::statement("ALTER TABLE `carts` ADD CONSTRAINT `carts_client_id_foreign1` FOREIGN KEY (`client_id`) REFERENCES `clients`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;");
      \DB::statement("ALTER TABLE `carts` ADD CONSTRAINT `carts_product_id_foreign1` FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;");
      \DB::statement("ALTER TABLE `categories` ADD CONSTRAINT `categories_parent_id_foreign1` FOREIGN KEY (`parent_id`) REFERENCES `categories`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;");
      \DB::statement("ALTER TABLE `cities` ADD CONSTRAINT `cities_governorate_id_foreign1` FOREIGN KEY (`governorate_id`) REFERENCES `governorates`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;");
      \DB::statement("ALTER TABLE `client_addresses` ADD CONSTRAINT `client_addresses_city_id_foreign1` FOREIGN KEY (`city_id`) REFERENCES `cities`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;");
      \DB::statement("ALTER TABLE `client_addresses` ADD CONSTRAINT `client_addresses_client_id_foreign1` FOREIGN KEY (`client_id`) REFERENCES `clients`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;");
      \DB::statement("ALTER TABLE `client_rates` ADD CONSTRAINT `client_rates_client_id_foreign1` FOREIGN KEY (`client_id`) REFERENCES `clients`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;");
      \DB::statement("ALTER TABLE `client_rates` ADD CONSTRAINT `client_rates_product_id_foreign1` FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;");
      \DB::statement("ALTER TABLE `contacts` ADD CONSTRAINT `contacts_city_id_foreign1` FOREIGN KEY (`city_id`) REFERENCES `cities`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;");
      \DB::statement("ALTER TABLE `contacts` ADD CONSTRAINT `contacts_product_id_foreign1` FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;");
      \DB::statement("ALTER TABLE `coupons` ADD CONSTRAINT `coupons_client_id_foreign1` FOREIGN KEY (`client_id`) REFERENCES `clients`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;");
      \DB::statement("ALTER TABLE `orders` ADD CONSTRAINT `orders_client_id_foreign1` FOREIGN KEY (`client_id`) REFERENCES `clients`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;");
      \DB::statement("ALTER TABLE `orders` ADD CONSTRAINT `orders_address_id_foreign1` FOREIGN KEY (`address_id`) REFERENCES `client_addresses`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;");
      \DB::statement("ALTER TABLE `order_details` ADD CONSTRAINT `order_details_order_id_foreign1` FOREIGN KEY (`order_id`) REFERENCES `orders`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;");
      \DB::statement("ALTER TABLE `order_details` ADD CONSTRAINT `order_details_product_id_foreign1` FOREIGN KEY (`product_id`) REFERENCES `products`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;");
      \DB::statement("ALTER TABLE `products` ADD CONSTRAINT `products_category_id_foreign1` FOREIGN KEY (`category_id`) REFERENCES `categories`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;");
      \DB::statement("ALTER TABLE `products` ADD CONSTRAINT `products_brand_id_foreign1` FOREIGN KEY (`brand_id`) REFERENCES `brands`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;");
      \DB::statement("SET FOREIGN_KEY_CHECKS=1;");
      \DB::statement("SET Global FOREIGN_KEY_CHECKS=1;");
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
