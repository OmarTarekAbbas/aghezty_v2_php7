<?php

use Illuminate\Database\Seeder;

class ClientRatesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('client_rates')->delete();
        
        \DB::table('client_rates')->insert(array (
            0 => 
            array (
                'id' => 1,
                'rate' => 3,
                'comment' => 'الخدمة جيدة ولكن يجب الاهتمام بالموعيد شكرا',
                'publish' => 1,
                'client_id' => 15,
                'product_id' => 5,
                'created_at' => '2019-09-25 18:07:41',
                'updated_at' => '2019-09-25 18:07:41',
            ),
            1 => 
            array (
                'id' => 2,
                'rate' => 3,
                'comment' => 'شكرا',
                'publish' => 1,
                'client_id' => 15,
                'product_id' => 2,
                'created_at' => '2019-09-25 20:03:38',
                'updated_at' => '2019-09-25 20:03:38',
            ),
        ));
        
        
    }
}