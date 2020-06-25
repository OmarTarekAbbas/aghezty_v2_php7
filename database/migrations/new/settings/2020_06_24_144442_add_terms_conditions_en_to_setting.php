<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTermsConditionsEnToSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::table('settings')->insert([
            'key' => 'terms_conditions_en',
            'value' => '<p style="color: rgb(248, 170, 77);">who are we</p>

            <p>My devices are one of the biggest companies for selling and distributing electronics in Egypt of all kinds and models with a new modern concept.</p>
            
            <p>In my devices, we promise our customers a unique buying experience, where they can buy all their needs from electronic devices safely, at the best prices and the highest quality.</p>
            
            <p style="color: rgb(248, 170, 77);">the prices:</p>
            
            <p>In my devices, we promise our customers to provide the best price in Egypt for electronic devices with secure payment methods via the Internet.</p>
            
            <p style="color: rgb(248, 170, 77);">payment methods:</p>
            
            <p>Enjoy the largest selection of payment methods, such as payment on receipt, credit card, credit card on receipt, Al Ahli Bank Visa installment, direct installment.</p>
            
            <p style="color: rgb(248, 170, 77);">Refund or replacement:</p>
            
            <p>Enjoy 14 days exchange or refund on your purchases.</p>
            
            <p style="color: rgb(248, 170, 77);">Delivery:</p>
            
            <p>With my devices, enjoy the fastest delivery service in Egypt, where you receive your order to your door on the same day or within 48 hours.</p>
            
            <p style="color: rgb(248, 170, 77);">the quality:</p>
            
            <p>All products are original and guaranteed by the agent ..</p>
            
            <p>We promise to provide service with a different modern concept</p>
            
            <p>&nbsp;</p>
            
            <p>Aghezty team</p>
            ',
            'type_id' => 1
        ]);
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
