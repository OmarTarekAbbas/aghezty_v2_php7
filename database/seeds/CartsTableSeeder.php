<?php

use Illuminate\Database\Seeder;

class CartsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('carts')->delete();
        
        \DB::table('carts')->insert(array (
            0 => 
            array (
                'id' => 5,
                'quantity' => 1,
                'price' => '1200.00',
                'total_price' => '1200.00',
                'client_id' => 15,
                'product_id' => 7,
                'created_at' => '2019-09-26 12:47:36',
                'updated_at' => '2019-09-26 12:47:36',
            ),
        ));
        
        
    }
}