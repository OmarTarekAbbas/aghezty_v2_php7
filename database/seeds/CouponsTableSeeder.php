<?php

use Illuminate\Database\Seeder;

class CouponsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('coupons')->delete();
        
        \DB::table('coupons')->insert(array (
            0 => 
            array (
                'id' => 1,
                'coupon' => 'yvYJPpZmsu',
                'value' => 100,
                'expire_date' => '2019-09-27',
                'client_id' => 15,
                'used' => 2,
                'created_at' => '2019-09-25 17:43:44',
                'updated_at' => '2019-09-25 17:46:11',
            ),
            1 => 
            array (
                'id' => 2,
                'coupon' => 'xaEXdG44H9',
                'value' => 100,
                'expire_date' => '2019-09-27',
                'client_id' => 15,
                'used' => 2,
                'created_at' => '2019-09-25 17:43:44',
                'updated_at' => '2019-09-25 17:46:11',
            ),
            2 => 
            array (
                'id' => 3,
                'coupon' => 'oKq80guJrT',
                'value' => 100,
                'expire_date' => '2019-09-27',
                'client_id' => 15,
                'used' => 2,
                'created_at' => '2019-09-25 17:43:44',
                'updated_at' => '2019-09-25 18:36:41',
            ),
            3 => 
            array (
                'id' => 4,
                'coupon' => 'YqAM3PZ3Sb',
                'value' => 100,
                'expire_date' => '2019-09-27',
                'client_id' => 15,
                'used' => 2,
                'created_at' => '2019-09-25 17:43:44',
                'updated_at' => '2019-09-26 10:32:17',
            ),
            4 => 
            array (
                'id' => 5,
                'coupon' => 'xGAQOrjLTl',
                'value' => 100,
                'expire_date' => '2019-09-27',
                'client_id' => 15,
                'used' => 2,
                'created_at' => '2019-09-25 17:43:44',
                'updated_at' => '2019-09-25 17:46:11',
            ),
            5 => 
            array (
                'id' => 6,
                'coupon' => 'Ks0xY9UmXh',
                'value' => 100,
                'expire_date' => '2019-09-27',
                'client_id' => 15,
                'used' => 2,
                'created_at' => '2019-09-25 17:43:44',
                'updated_at' => '2019-09-25 18:58:59',
            ),
            6 => 
            array (
                'id' => 7,
                'coupon' => '32r1spHZPc',
                'value' => 100,
                'expire_date' => '2019-09-27',
                'client_id' => 15,
                'used' => 2,
                'created_at' => '2019-09-25 17:43:44',
                'updated_at' => '2019-09-25 19:52:41',
            ),
            7 => 
            array (
                'id' => 8,
                'coupon' => 'ktwtHd89hD',
                'value' => 100,
                'expire_date' => '2019-09-27',
                'client_id' => 15,
                'used' => 2,
                'created_at' => '2019-09-25 17:43:45',
                'updated_at' => '2019-09-26 10:32:17',
            ),
            8 => 
            array (
                'id' => 9,
                'coupon' => 'L0Pf0x7CY5',
                'value' => 40,
                'expire_date' => '2019-09-30',
                'client_id' => 15,
                'used' => 2,
                'created_at' => '2019-09-26 10:07:03',
                'updated_at' => '2019-09-26 10:32:17',
            ),
            9 => 
            array (
                'id' => 10,
                'coupon' => 'ZRMNQfardh',
                'value' => 40,
                'expire_date' => '2019-09-30',
                'client_id' => 15,
                'used' => 2,
                'created_at' => '2019-09-26 10:07:03',
                'updated_at' => '2019-09-26 12:15:52',
            ),
            10 => 
            array (
                'id' => 11,
                'coupon' => 'tUdrgAWUK0',
                'value' => 40,
                'expire_date' => '2019-09-30',
                'client_id' => NULL,
                'used' => 0,
                'created_at' => '2019-09-26 10:07:03',
                'updated_at' => '2019-09-26 10:07:03',
            ),
            11 => 
            array (
                'id' => 12,
                'coupon' => 'R3rnTAG2qP',
                'value' => 40,
                'expire_date' => '2019-09-30',
                'client_id' => NULL,
                'used' => 0,
                'created_at' => '2019-09-26 10:07:03',
                'updated_at' => '2019-09-26 10:07:03',
            ),
            12 => 
            array (
                'id' => 13,
                'coupon' => 'NunoeEAArZ',
                'value' => 40,
                'expire_date' => '2019-09-30',
                'client_id' => NULL,
                'used' => 0,
                'created_at' => '2019-09-26 10:07:03',
                'updated_at' => '2019-09-26 10:07:03',
            ),
            13 => 
            array (
                'id' => 14,
                'coupon' => 'zEiftAcxWC',
                'value' => 100,
                'expire_date' => '2019-09-30',
                'client_id' => 15,
                'used' => 2,
                'created_at' => '2019-09-26 12:18:11',
                'updated_at' => '2019-09-26 12:35:37',
            ),
            14 => 
            array (
                'id' => 15,
                'coupon' => 'isgAJIlYgA',
                'value' => 100,
                'expire_date' => '2019-09-30',
                'client_id' => NULL,
                'used' => 0,
                'created_at' => '2019-09-26 12:18:13',
                'updated_at' => '2019-09-26 12:18:13',
            ),
        ));
        
        
    }
}