<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeToAdvertisements extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('advertisements', function (Blueprint $table) {
            $table->string('type', 100);
            $table->boolean('active');
        });

        DB::table('advertisements')->insert(
            array(
                array(
                    'image' => 'public/frontv2/images/ads/slide-1.jpg',
                    'type' => 'slider',
                    'active' => true,
                ),array(
                    'image' => 'public/frontv2/images/ads/slide-2.jpg',
                    'type' => 'slider',
                    'active' => true,
                ),array(
                    'image' => 'public/frontv2/images/ads/slide-3.jpg',
                    'type' => 'slider',
                    'active' => true,
                ),array(
                    'image' => 'public/frontv2/images/ads/slide-1.jpg',
                    'type' => 'slider',
                    'active' => true,
                ),array(
                    'image' => 'public/frontv2/images/ads/slide-2.jpg',
                    'type' => 'slider',
                    'active' => true,
                ),array(
                    'image' => 'public/frontv2/images/ads/slide-3.jpg',
                    'type' => 'slider',
                    'active' => true,
                ),array(
                    'image' => 'public/frontv2/images/ads/slide-1.jpg',
                    'type' => 'slider',
                    'active' => true,
                ),array(
                    'image' => 'public/frontv2/images/ads/slide-2.jpg',
                    'type' => 'slider',
                    'active' => true,
                ),array(
                    'image' => 'public/frontv2/images/ads/slide-3.jpg',
                    'type' => 'slider',
                    'active' => true,
                ),array(
                    'image' => 'public/frontv2/images/ads/slide-1.jpg',
                    'type' => 'slider',
                    'active' => true,
                ),array(
                    'image' => 'public/frontv2/images/ads/top-banner.jpg',
                    'type' => 'homeads',
                    'active' => true,
                ),array(
                    'image' => 'public/frontv2/images/ads/bottom-banner.jpg',
                    'type' => 'homeads',
                    'active' => true,
                ),array(
                    'image' => 'public/frontv2/images/ads/top-wide.jpg',
                    'type' => 'homeads',
                    'active' => true,
                ),array(
                    'image' => 'public/frontv2/images/ads/right.jpg',
                    'type' => 'homeads',
                    'active' => true,
                ),array(
                    'image' => 'public/frontv2/images/ads/left.jpg',
                    'type' => 'homeads',
                    'active' => true,
                ),array(
                    'image' => 'public/frontv2/images/ads/bottom-wide.jpg',
                    'type' => 'homeads',
                    'active' => true,
                )
            )
        );
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
