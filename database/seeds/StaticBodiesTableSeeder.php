<?php

use Illuminate\Database\Seeder;

class StaticBodiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('static_bodies')->delete();
        
        \DB::table('static_bodies')->insert(array (
            0 => 
            array (
                'id' => 1,
                'language_id' => 3,
                'static_translation_id' => 1,
                'body' => '<p>11 Abou Al Karamat, Al Huwaiteyah, Agouza, Giza Governorate, Egypt</p>',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'language_id' => 4,
                'static_translation_id' => 1,
                'body' => '<p>11 أبو الكرامات، الحويتية، حي العجوزة، الجيزة</p>',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}