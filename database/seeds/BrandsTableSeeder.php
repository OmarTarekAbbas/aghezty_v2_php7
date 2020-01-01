<?php

use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('brands')->delete();
        
        \DB::table('brands')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Samsung',
                'image' => '/uploads/brand/2019-09-10/1568111002525.png',
                'created_at' => '2019-09-10 07:34:57',
                'updated_at' => '2019-09-10 10:23:22',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'LG',
                'image' => '/uploads/brand/2019-09-10/1568111011566.png',
                'created_at' => '2019-09-10 07:35:19',
                'updated_at' => '2019-09-10 10:23:31',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Toshiba',
                'image' => '/uploads/brand/2019-09-10/1568111119116.png',
                'created_at' => '2019-09-10 07:35:48',
                'updated_at' => '2019-09-10 10:25:19',
            ),
        ));
        
        
    }
}