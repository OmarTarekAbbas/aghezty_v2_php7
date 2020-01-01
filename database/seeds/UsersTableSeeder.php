<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'super admin',
                'email' => 'super_admin@ivas.com',
                'password' => '$2y$10$u2evAW530miwgUb2jcXkTuqIGswxnSQ3DSmX1Ji5rtO3Tx.MtVcX2',
                'image' => '',
                'phone' => '01234567890',
                'remember_token' => 'Ohi9lUvtmDHQir7vBnaMTZdki3k79w53oPDV4GFypxspbTcdmkxXIJRWi3Z5',
                'created_at' => '2017-11-09 06:13:14',
                'updated_at' => '2018-11-26 08:11:50',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'admin',
                'email' => 'admin@yahoo.com',
                'password' => '$2y$10$FCCehYgednF3ZgJqLpAhj.0j6lh8yERgIip8z.RckDrEA16OVeTB2',
                'image' => NULL,
                'phone' => '01128023506',
                'remember_token' => 'FQc5sdooWg8Ey14OepDn0n2Hr4cDfKdof90aID4Rkq37Mrzi5TZmVc3Ag7Q3',
                'created_at' => '2019-09-29 12:35:44',
                'updated_at' => '2019-09-29 12:35:44',
            ),
        ));
        
        
    }
}