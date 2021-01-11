<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInstagramForSettings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`, `type_id`, `order`) VALUES (NULL, 'instagram', 'https://www.instagram.com/aghezty.me/', '2021-01-11 14:13:33', '2021-01-11 19:52:49', '2', NULL)
        ");
        \DB::statement("INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`, `type_id`, `order`) VALUES (NULL, 'company_info_ar', 'تعمل شركة \"أجهزتى\" في مجال البيع عبر الإنترنت لجميع الأجهزة الكهربائية والإلكترونية ومكيفات الهواء والأجهزة المحمولة والانتركوم وأجهزة الإنذار وأجهزة المراقبة ، وتقدم منتجات عالية الجودة بتقنية متطورة تلبي رغبات وتوقعات المستهلك', '2021-01-11 12:24:19', '2021-01-11 12:24:19', '2', NULL)");
        \DB::statement("INSERT INTO `settings` (`id`, `key`, `value`, `created_at`, `updated_at`, `type_id`, `order`) VALUES (NULL, 'company_info_en', 'The company \'Aghezty\' works in the field of online sale of all electrical and electronic devices, air conditioners, mobile devices, intercoms, alarms and monitoring devices, and provides high-quality products with advanced technology that meet the desires and expectations of the consumer.', '2021-01-11 12:24:19', '2021-01-11 12:24:19', '2', NULL)");
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
