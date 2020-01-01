<?php

use Illuminate\Database\Seeder;

class LanguagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('languages')->delete();
        
        \DB::table('languages')->insert(array (
            0 => 
            array (
                'id' => 3,
                'title' => 'English',
                'created_at' => '2019-09-09 10:24:31',
                'updated_at' => '2019-09-09 11:10:10',
                'short_code' => 'en',
                'rtl' => 0,
            ),
            1 => 
            array (
                'id' => 4,
                'title' => 'Arabic',
                'created_at' => '2019-09-09 10:24:45',
                'updated_at' => '2019-09-15 12:29:32',
                'short_code' => 'ar',
                'rtl' => 1,
            ),
        ));
        
        
    }
}