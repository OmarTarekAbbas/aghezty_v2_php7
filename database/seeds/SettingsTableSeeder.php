<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {




        \DB::table('settings')->insert(array (

            14 =>
            array (
                'id' => 44,
                'key' => 'location',
                'value' => '30.04249824173365,31.22443199157715',
                'created_at' => '2019-10-03 11:55:13',
                'updated_at' => '2019-10-03 12:48:51',
                'type_id' => 8,
                'order' => NULL,
            ),
            15 =>
            array (
                'id' => 45,
                'key' => 'contact_addressss',
                'value' => '30.029093372455513,31.15600888795848',
                'created_at' => '2019-10-07 08:01:12',
                'updated_at' => '2019-10-07 08:01:20',
                'type_id' => 8,
                'order' => NULL,
            ),
            16 =>
            array (
                'id' => 46,
                'key' => 'ios_link',
                'value' => 'https://google.com',
                'created_at' => '2019-10-07 16:40:14',
                'updated_at' => '2019-10-07 16:40:14',
                'type_id' => 2,
                'order' => NULL,
            ),
            17 =>
            array (
                'id' => 47,
                'key' => 'android_link',
                'value' => 'https://google.com',
                'created_at' => '2019-10-07 16:40:33',
                'updated_at' => '2019-10-07 16:40:33',
                'type_id' => 2,
                'order' => NULL,
            ),
        ));


    }
}
