<?php

use Illuminate\Database\Seeder;

class AdvertisementsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('advertisements')->delete();

        \DB::table('advertisements')->insert(array (
            0 =>
            array (
                'id' => 1,
                'image' => '/uploads/ads/2019-09-26/1569509243712.png',
                'ads_url' => 'https://googel.com',
                'created_at' => '2019-09-23 14:35:05',
                'updated_at' => '2019-09-25 10:55:44',
            ),
            1 =>
            array (
                'id' => 3,
                'image' => '/uploads/ads/2019-09-26/1569509253628.png',
                'ads_url' => 'https://googel.com',
                'created_at' => '2019-09-25 10:56:02',
                'updated_at' => '2019-09-25 10:56:02',
            ),
        ));


    }
}
