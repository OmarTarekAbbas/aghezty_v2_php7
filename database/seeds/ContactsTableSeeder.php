<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contacts')->delete();
        
        \DB::table('contacts')->insert(array (
            0 => 
            array (
                'id' => 6,
                'email' => 'mh124404@gmail.com',
                'phone' => '01128023501',
                'message' => 'شكرا لحضرتكم',
                'product_id' => NULL,
                'city_id' => NULL,
                'name' => NULL,
                'lang' => NULL,
                'created_at' => '2019-09-25 18:02:17',
                'updated_at' => '2019-09-25 18:02:17',
            ),
            1 => 
            array (
                'id' => 7,
                'email' => 'err@yy.cc',
                'phone' => '132123132',
                'message' => 'dfgdf',
                'product_id' => NULL,
                'city_id' => NULL,
                'name' => NULL,
                'lang' => NULL,
                'created_at' => '2019-09-26 09:47:58',
                'updated_at' => '2019-09-26 09:47:58',
            ),
            2 => 
            array (
                'id' => 8,
                'email' => 'mh124404@gmail.com',
                'phone' => '01128',
                'message' => NULL,
                'product_id' => NULL,
                'city_id' => 190,
                'name' => 'mohamed',
                'lang' => 'ar',
                'created_at' => '2019-10-07 12:37:28',
                'updated_at' => '2019-10-07 12:37:28',
            ),
            3 => 
            array (
                'id' => 9,
                'email' => 'mh124404@gmail.com',
                'phone' => '01128023502',
                'message' => NULL,
                'product_id' => NULL,
                'city_id' => 139,
                'name' => 'mohamed',
                'lang' => 'ar',
                'created_at' => '2019-10-07 12:44:24',
                'updated_at' => '2019-10-07 12:44:24',
            ),
            4 => 
            array (
                'id' => 12,
                'email' => 'mh124404@gmail.com',
                'phone' => '01128023501',
                'message' => NULL,
                'product_id' => 2,
                'city_id' => 196,
                'name' => 'mohamed',
                'lang' => 'ar',
                'created_at' => '2019-10-07 13:46:22',
                'updated_at' => '2019-10-07 13:46:22',
            ),
        ));
        
        
    }
}