<?php

use Illuminate\Database\Seeder;

class TranslatablesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('translatables')->delete();
        
        \DB::table('translatables')->insert(array (
            0 => 
            array (
                'id' => 1,
                'table_name' => 'categories',
                'record_id' => '7',
                'column_name' => 'title',
                'created_at' => '2019-09-12 07:25:51',
                'updated_at' => '2019-09-12 07:25:51',
            ),
            1 => 
            array (
                'id' => 2,
                'table_name' => 'categories',
                'record_id' => '11',
                'column_name' => 'title',
                'created_at' => '2019-09-12 07:25:59',
                'updated_at' => '2019-09-12 07:25:59',
            ),
            2 => 
            array (
                'id' => 3,
                'table_name' => 'categories',
                'record_id' => '14',
                'column_name' => 'title',
                'created_at' => '2019-09-12 07:26:06',
                'updated_at' => '2019-09-12 07:26:06',
            ),
            3 => 
            array (
                'id' => 4,
                'table_name' => 'categories',
                'record_id' => '8',
                'column_name' => 'title',
                'created_at' => '2019-09-12 07:26:17',
                'updated_at' => '2019-09-12 07:26:17',
            ),
            4 => 
            array (
                'id' => 5,
                'table_name' => 'categories',
                'record_id' => '9',
                'column_name' => 'title',
                'created_at' => '2019-09-12 07:26:24',
                'updated_at' => '2019-09-12 07:26:24',
            ),
            5 => 
            array (
                'id' => 6,
                'table_name' => 'categories',
                'record_id' => '10',
                'column_name' => 'title',
                'created_at' => '2019-09-12 07:26:33',
                'updated_at' => '2019-09-12 07:26:33',
            ),
            6 => 
            array (
                'id' => 7,
                'table_name' => 'categories',
                'record_id' => '12',
                'column_name' => 'title',
                'created_at' => '2019-09-12 07:26:44',
                'updated_at' => '2019-09-12 07:26:44',
            ),
            7 => 
            array (
                'id' => 8,
                'table_name' => 'categories',
                'record_id' => '13',
                'column_name' => 'title',
                'created_at' => '2019-09-12 07:26:51',
                'updated_at' => '2019-09-12 07:26:51',
            ),
            8 => 
            array (
                'id' => 9,
                'table_name' => 'categories',
                'record_id' => '15',
                'column_name' => 'title',
                'created_at' => '2019-09-12 07:27:11',
                'updated_at' => '2019-09-12 07:27:11',
            ),
            9 => 
            array (
                'id' => 10,
                'table_name' => 'categories',
                'record_id' => '16',
                'column_name' => 'title',
                'created_at' => '2019-09-12 07:27:27',
                'updated_at' => '2019-09-12 07:27:27',
            ),
            10 => 
            array (
                'id' => 11,
                'table_name' => 'brands',
                'record_id' => '1',
                'column_name' => 'title',
                'created_at' => '2019-09-12 07:27:40',
                'updated_at' => '2019-09-12 07:27:40',
            ),
            11 => 
            array (
                'id' => 12,
                'table_name' => 'brands',
                'record_id' => '2',
                'column_name' => 'title',
                'created_at' => '2019-09-12 07:27:52',
                'updated_at' => '2019-09-12 07:27:52',
            ),
            12 => 
            array (
                'id' => 13,
                'table_name' => 'brands',
                'record_id' => '3',
                'column_name' => 'title',
                'created_at' => '2019-09-12 07:27:59',
                'updated_at' => '2019-09-12 07:27:59',
            ),
            13 => 
            array (
                'id' => 14,
                'table_name' => 'products',
                'record_id' => '2',
                'column_name' => 'title',
                'created_at' => '2019-09-12 07:28:32',
                'updated_at' => '2019-09-12 07:28:32',
            ),
            14 => 
            array (
                'id' => 15,
                'table_name' => 'products',
                'record_id' => '2',
                'column_name' => 'description',
                'created_at' => '2019-09-12 07:28:32',
                'updated_at' => '2019-09-12 07:28:32',
            ),
            15 => 
            array (
                'id' => 16,
                'table_name' => 'products',
                'record_id' => '2',
                'column_name' => 'short_description',
                'created_at' => '2019-09-12 07:28:32',
                'updated_at' => '2019-09-12 07:28:32',
            ),
            16 => 
            array (
                'id' => 17,
                'table_name' => 'products',
                'record_id' => '3',
                'column_name' => 'title',
                'created_at' => '2019-09-12 07:28:49',
                'updated_at' => '2019-09-12 07:28:49',
            ),
            17 => 
            array (
                'id' => 18,
                'table_name' => 'products',
                'record_id' => '3',
                'column_name' => 'description',
                'created_at' => '2019-09-12 07:28:49',
                'updated_at' => '2019-09-12 07:28:49',
            ),
            18 => 
            array (
                'id' => 19,
                'table_name' => 'products',
                'record_id' => '3',
                'column_name' => 'short_description',
                'created_at' => '2019-09-12 07:28:49',
                'updated_at' => '2019-09-12 07:28:49',
            ),
            19 => 
            array (
                'id' => 20,
                'table_name' => 'products',
                'record_id' => '4',
                'column_name' => 'title',
                'created_at' => '2019-09-12 07:29:07',
                'updated_at' => '2019-09-12 07:29:07',
            ),
            20 => 
            array (
                'id' => 21,
                'table_name' => 'products',
                'record_id' => '4',
                'column_name' => 'description',
                'created_at' => '2019-09-12 07:29:07',
                'updated_at' => '2019-09-12 07:29:07',
            ),
            21 => 
            array (
                'id' => 22,
                'table_name' => 'products',
                'record_id' => '4',
                'column_name' => 'short_description',
                'created_at' => '2019-09-12 07:29:07',
                'updated_at' => '2019-09-12 07:29:07',
            ),
            22 => 
            array (
                'id' => 23,
                'table_name' => 'categories',
                'record_id' => '17',
                'column_name' => 'title',
                'created_at' => '2019-09-26 10:02:48',
                'updated_at' => '2019-09-26 10:02:48',
            ),
            23 => 
            array (
                'id' => 24,
                'table_name' => 'products',
                'record_id' => '5',
                'column_name' => 'title',
                'created_at' => '2019-09-26 10:05:01',
                'updated_at' => '2019-09-26 10:05:01',
            ),
            24 => 
            array (
                'id' => 25,
                'table_name' => 'products',
                'record_id' => '5',
                'column_name' => 'description',
                'created_at' => '2019-09-26 10:05:02',
                'updated_at' => '2019-09-26 10:05:02',
            ),
            25 => 
            array (
                'id' => 26,
                'table_name' => 'products',
                'record_id' => '5',
                'column_name' => 'short_description',
                'created_at' => '2019-09-26 10:05:02',
                'updated_at' => '2019-09-26 10:05:02',
            ),
            26 => 
            array (
                'id' => 27,
                'table_name' => 'products',
                'record_id' => '6',
                'column_name' => 'title',
                'created_at' => '2019-09-26 10:06:27',
                'updated_at' => '2019-09-26 10:06:27',
            ),
            27 => 
            array (
                'id' => 28,
                'table_name' => 'products',
                'record_id' => '6',
                'column_name' => 'description',
                'created_at' => '2019-09-26 10:06:27',
                'updated_at' => '2019-09-26 10:06:27',
            ),
            28 => 
            array (
                'id' => 29,
                'table_name' => 'products',
                'record_id' => '6',
                'column_name' => 'short_description',
                'created_at' => '2019-09-26 10:06:27',
                'updated_at' => '2019-09-26 10:06:27',
            ),
            29 => 
            array (
                'id' => 30,
                'table_name' => 'products',
                'record_id' => '7',
                'column_name' => 'title',
                'created_at' => '2019-09-26 10:12:36',
                'updated_at' => '2019-09-26 10:12:36',
            ),
            30 => 
            array (
                'id' => 31,
                'table_name' => 'products',
                'record_id' => '7',
                'column_name' => 'description',
                'created_at' => '2019-09-26 10:12:36',
                'updated_at' => '2019-09-26 10:12:36',
            ),
            31 => 
            array (
                'id' => 33,
                'table_name' => 'products',
                'record_id' => '8',
                'column_name' => 'title',
                'created_at' => '2019-09-26 10:16:12',
                'updated_at' => '2019-09-26 10:16:12',
            ),
            32 => 
            array (
                'id' => 34,
                'table_name' => 'products',
                'record_id' => '8',
                'column_name' => 'description',
                'created_at' => '2019-09-26 10:16:12',
                'updated_at' => '2019-09-26 10:16:12',
            ),
            33 => 
            array (
                'id' => 35,
                'table_name' => 'products',
                'record_id' => '8',
                'column_name' => 'short_description',
                'created_at' => '2019-09-26 10:16:12',
                'updated_at' => '2019-09-26 10:16:12',
            ),
            34 => 
            array (
                'id' => 36,
                'table_name' => 'products',
                'record_id' => '9',
                'column_name' => 'title',
                'created_at' => '2019-09-26 10:19:42',
                'updated_at' => '2019-09-26 10:19:42',
            ),
            35 => 
            array (
                'id' => 37,
                'table_name' => 'products',
                'record_id' => '9',
                'column_name' => 'description',
                'created_at' => '2019-09-26 10:19:42',
                'updated_at' => '2019-09-26 10:19:42',
            ),
            36 => 
            array (
                'id' => 38,
                'table_name' => 'products',
                'record_id' => '9',
                'column_name' => 'short_description',
                'created_at' => '2019-09-26 10:19:42',
                'updated_at' => '2019-09-26 10:19:42',
            ),
            37 => 
            array (
                'id' => 39,
                'table_name' => 'products',
                'record_id' => '10',
                'column_name' => 'title',
                'created_at' => '2019-09-26 10:21:28',
                'updated_at' => '2019-09-26 10:21:28',
            ),
            38 => 
            array (
                'id' => 40,
                'table_name' => 'products',
                'record_id' => '10',
                'column_name' => 'description',
                'created_at' => '2019-09-26 10:21:28',
                'updated_at' => '2019-09-26 10:21:28',
            ),
            39 => 
            array (
                'id' => 41,
                'table_name' => 'products',
                'record_id' => '10',
                'column_name' => 'short_description',
                'created_at' => '2019-09-26 10:21:28',
                'updated_at' => '2019-09-26 10:21:28',
            ),
            40 => 
            array (
                'id' => 42,
                'table_name' => 'products',
                'record_id' => '11',
                'column_name' => 'title',
                'created_at' => '2019-09-26 10:22:07',
                'updated_at' => '2019-09-26 10:22:07',
            ),
            41 => 
            array (
                'id' => 43,
                'table_name' => 'products',
                'record_id' => '11',
                'column_name' => 'description',
                'created_at' => '2019-09-26 10:22:07',
                'updated_at' => '2019-09-26 10:22:07',
            ),
            42 => 
            array (
                'id' => 44,
                'table_name' => 'products',
                'record_id' => '11',
                'column_name' => 'short_description',
                'created_at' => '2019-09-26 10:22:08',
                'updated_at' => '2019-09-26 10:22:08',
            ),
            43 => 
            array (
                'id' => 45,
                'table_name' => 'products',
                'record_id' => '12',
                'column_name' => 'title',
                'created_at' => '2019-09-26 10:23:21',
                'updated_at' => '2019-09-26 10:23:21',
            ),
            44 => 
            array (
                'id' => 46,
                'table_name' => 'products',
                'record_id' => '12',
                'column_name' => 'description',
                'created_at' => '2019-09-26 10:23:22',
                'updated_at' => '2019-09-26 10:23:22',
            ),
            45 => 
            array (
                'id' => 47,
                'table_name' => 'products',
                'record_id' => '12',
                'column_name' => 'short_description',
                'created_at' => '2019-09-26 10:23:22',
                'updated_at' => '2019-09-26 10:23:22',
            ),
            46 => 
            array (
                'id' => 48,
                'table_name' => 'products',
                'record_id' => '13',
                'column_name' => 'title',
                'created_at' => '2019-09-26 10:24:03',
                'updated_at' => '2019-09-26 10:24:03',
            ),
            47 => 
            array (
                'id' => 49,
                'table_name' => 'products',
                'record_id' => '13',
                'column_name' => 'description',
                'created_at' => '2019-09-26 10:24:03',
                'updated_at' => '2019-09-26 10:24:03',
            ),
            48 => 
            array (
                'id' => 50,
                'table_name' => 'products',
                'record_id' => '13',
                'column_name' => 'short_description',
                'created_at' => '2019-09-26 10:24:03',
                'updated_at' => '2019-09-26 10:24:03',
            ),
            49 => 
            array (
                'id' => 51,
                'table_name' => 'products',
                'record_id' => '14',
                'column_name' => 'title',
                'created_at' => '2019-09-26 10:29:06',
                'updated_at' => '2019-09-26 10:29:06',
            ),
            50 => 
            array (
                'id' => 52,
                'table_name' => 'products',
                'record_id' => '14',
                'column_name' => 'description',
                'created_at' => '2019-09-26 10:29:07',
                'updated_at' => '2019-09-26 10:29:07',
            ),
            51 => 
            array (
                'id' => 53,
                'table_name' => 'products',
                'record_id' => '14',
                'column_name' => 'short_description',
                'created_at' => '2019-09-26 10:29:07',
                'updated_at' => '2019-09-26 10:29:07',
            ),
            52 => 
            array (
                'id' => 54,
                'table_name' => 'products',
                'record_id' => '15',
                'column_name' => 'title',
                'created_at' => '2019-09-26 10:30:07',
                'updated_at' => '2019-09-26 10:30:07',
            ),
            53 => 
            array (
                'id' => 55,
                'table_name' => 'products',
                'record_id' => '15',
                'column_name' => 'description',
                'created_at' => '2019-09-26 10:30:07',
                'updated_at' => '2019-09-26 10:30:07',
            ),
            54 => 
            array (
                'id' => 56,
                'table_name' => 'products',
                'record_id' => '15',
                'column_name' => 'short_description',
                'created_at' => '2019-09-26 10:30:07',
                'updated_at' => '2019-09-26 10:30:07',
            ),
            55 => 
            array (
                'id' => 57,
                'table_name' => 'products',
                'record_id' => '16',
                'column_name' => 'title',
                'created_at' => '2019-09-26 10:31:23',
                'updated_at' => '2019-09-26 10:31:23',
            ),
            56 => 
            array (
                'id' => 58,
                'table_name' => 'products',
                'record_id' => '16',
                'column_name' => 'description',
                'created_at' => '2019-09-26 10:31:23',
                'updated_at' => '2019-09-26 10:31:23',
            ),
            57 => 
            array (
                'id' => 59,
                'table_name' => 'products',
                'record_id' => '16',
                'column_name' => 'short_description',
                'created_at' => '2019-09-26 10:31:23',
                'updated_at' => '2019-09-26 10:31:23',
            ),
            58 => 
            array (
                'id' => 60,
                'table_name' => 'products',
                'record_id' => '17',
                'column_name' => 'title',
                'created_at' => '2019-09-26 10:31:55',
                'updated_at' => '2019-09-26 10:31:55',
            ),
            59 => 
            array (
                'id' => 61,
                'table_name' => 'products',
                'record_id' => '17',
                'column_name' => 'description',
                'created_at' => '2019-09-26 10:31:55',
                'updated_at' => '2019-09-26 10:31:55',
            ),
            60 => 
            array (
                'id' => 62,
                'table_name' => 'products',
                'record_id' => '17',
                'column_name' => 'short_description',
                'created_at' => '2019-09-26 10:31:56',
                'updated_at' => '2019-09-26 10:31:56',
            ),
        ));
        
        
    }
}