<?php

use Illuminate\Database\Seeder;

class DeleteAllFlagsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('delete_all_flags')->delete();
        
        \DB::table('delete_all_flags')->insert(array (
            0 => 
            array (
                'id' => 1,
                'route_id' => 227,
                'created_at' => '2019-09-25 13:12:12',
                'updated_at' => '2019-09-25 13:12:12',
            ),
        ));
        
        
    }
}