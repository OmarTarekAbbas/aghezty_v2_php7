<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 7,
                'title' => 'heavy machine',
                'image' => '/uploads/category/2019-09-10/1568111432674.png',
                'coding' => 123345,
                'created_at' => '2019-09-09 11:11:13',
                'updated_at' => '2019-09-15 12:43:16',
                'parent_id' => NULL,
            ),
            1 => 
            array (
                'id' => 8,
                'title' => 'fridge',
                'image' => '/uploads/category/2019-09-10/1568111480352.png',
                'coding' => 1464,
                'created_at' => '2019-09-09 11:12:23',
                'updated_at' => '2019-09-10 10:31:20',
                'parent_id' => 7,
            ),
            2 => 
            array (
                'id' => 9,
                'title' => 'Deep Freezer',
                'image' => '/uploads/category/2019-09-10/1568111489985.png',
                'coding' => 1234,
                'created_at' => '2019-09-09 11:13:46',
                'updated_at' => '2019-09-15 12:44:11',
                'parent_id' => 7,
            ),
            3 => 
            array (
                'id' => 10,
                'title' => 'Washing machines',
                'image' => '/uploads/category/2019-09-10/1568111496352.png',
                'coding' => 7994,
                'created_at' => '2019-09-09 11:14:24',
                'updated_at' => '2019-09-15 12:44:22',
                'parent_id' => 7,
            ),
            4 => 
            array (
                'id' => 11,
                'title' => 'Monitors and Receivers',
                'image' => '/uploads/category/2019-09-10/1568111438627.png',
                'coding' => 7893,
                'created_at' => '2019-09-09 11:15:16',
                'updated_at' => '2019-09-15 12:43:37',
                'parent_id' => NULL,
            ),
            5 => 
            array (
                'id' => 12,
                'title' => 'screens',
                'image' => '/uploads/category/2019-09-10/1568111509961.png',
                'coding' => 4567,
                'created_at' => '2019-09-09 11:15:53',
                'updated_at' => '2019-09-15 12:44:38',
                'parent_id' => 11,
            ),
            6 => 
            array (
                'id' => 13,
                'title' => 'Receivers',
                'image' => '/uploads/category/2019-09-10/1568111515573.png',
                'coding' => 4567112,
                'created_at' => '2019-09-09 11:16:55',
                'updated_at' => '2019-09-15 12:44:49',
                'parent_id' => 11,
            ),
            7 => 
            array (
                'id' => 14,
                'title' => 'Telephones and accessories',
                'image' => '/uploads/category/2019-09-10/156811146686.png',
                'coding' => 1236,
                'created_at' => '2019-09-09 11:17:46',
                'updated_at' => '2019-09-15 12:43:48',
                'parent_id' => NULL,
            ),
            8 => 
            array (
                'id' => 15,
                'title' => 'phones',
                'image' => '/uploads/category/2019-09-10/1568111526339.png',
                'coding' => 1478,
                'created_at' => '2019-09-09 11:18:21',
                'updated_at' => '2019-09-12 09:27:11',
                'parent_id' => 14,
            ),
            9 => 
            array (
                'id' => 16,
                'title' => 'telphone',
                'image' => '/uploads/category/2019-09-10/1568111536770.png',
                'coding' => 4560,
                'created_at' => '2019-09-09 11:19:55',
                'updated_at' => '2019-09-12 09:27:27',
                'parent_id' => 14,
            ),
        ));
        
        
    }
}