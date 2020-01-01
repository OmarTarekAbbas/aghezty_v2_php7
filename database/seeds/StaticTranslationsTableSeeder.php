<?php

use Illuminate\Database\Seeder;

class StaticTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('static_translations')->delete();
        
        \DB::table('static_translations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'key_word' => 'address',
                'created_at' => '2019-09-15 13:00:59',
                'updated_at' => '2019-09-15 13:00:59',
            ),
        ));
        
        
    }
}