<?php

use Illuminate\Database\Seeder;

class RoutesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('routes')->delete();
        
        \DB::table('routes')->insert(array (
            0 => 
            array (
                'id' => 2,
                'method' => 'get',
                'route' => 'setting/new',
                'controller_name' => 'SettingController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '2018-02-05 20:39:21',
                'function_name' => 'create',
            ),
            1 => 
            array (
                'id' => 3,
                'method' => 'post',
                'route' => 'setting',
                'controller_name' => 'SettingController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '2018-02-05 20:39:21',
                'function_name' => 'store',
            ),
            2 => 
            array (
                'id' => 4,
                'method' => 'get',
                'route' => 'dashboard',
                'controller_name' => 'DashboardController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '2018-07-24 19:47:45',
                'function_name' => 'index',
            ),
            3 => 
            array (
                'id' => 5,
                'method' => 'get',
                'route' => '/',
                'controller_name' => 'DashboardController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
                'function_name' => 'index',
            ),
            4 => 
            array (
                'id' => 6,
                'method' => 'get',
                'route' => 'user_profile',
                'controller_name' => 'UserController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
                'function_name' => 'profile',
            ),
            5 => 
            array (
                'id' => 7,
                'method' => 'post',
                'route' => 'user_profile/updatepassword',
                'controller_name' => 'UserController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '2017-11-14 19:29:01',
                'function_name' => 'UpdatePassword',
            ),
            6 => 
            array (
                'id' => 8,
                'method' => 'post',
                'route' => 'user_profile/updateprofilepic',
                'controller_name' => 'UserController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '2017-11-14 19:29:08',
                'function_name' => 'UpdateProfilePicture',
            ),
            7 => 
            array (
                'id' => 9,
                'method' => 'post',
                'route' => 'user_profile/updateuserdata',
                'controller_name' => 'UserController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '2017-11-14 19:29:19',
                'function_name' => 'UpdateNameAndEmail',
            ),
            8 => 
            array (
                'id' => 10,
                'method' => 'get',
                'route' => 'setting/{id}/delete',
                'controller_name' => 'SettingController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '2018-02-05 20:39:22',
                'function_name' => 'destroy',
            ),
            9 => 
            array (
                'id' => 11,
                'method' => 'get',
                'route' => 'setting/{id}/edit',
                'controller_name' => 'SettingController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '2018-02-05 20:39:21',
                'function_name' => 'edit',
            ),
            10 => 
            array (
                'id' => 12,
                'method' => 'post',
                'route' => 'setting/{id}',
                'controller_name' => 'SettingController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '2018-02-05 20:56:27',
                'function_name' => 'update',
            ),
            11 => 
            array (
                'id' => 14,
                'method' => 'get',
                'route' => 'static_translation',
                'controller_name' => 'StaticTranslationController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '2017-11-14 19:29:57',
                'function_name' => 'index',
            ),
            12 => 
            array (
                'id' => 21,
                'method' => 'get',
                'route' => 'file_manager',
                'controller_name' => 'DashboardController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
                'function_name' => 'file_manager',
            ),
            13 => 
            array (
                'id' => 22,
                'method' => 'get',
                'route' => 'upload_items',
                'controller_name' => 'DashboardController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
                'function_name' => 'multi_upload',
            ),
            14 => 
            array (
                'id' => 23,
                'method' => 'post',
                'route' => 'save_items',
                'controller_name' => 'DashboardController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
                'function_name' => 'save_uploaded',
            ),
            15 => 
            array (
                'id' => 24,
                'method' => 'get',
                'route' => 'upload_resize',
                'controller_name' => 'DashboardController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
                'function_name' => 'upload_resize',
            ),
            16 => 
            array (
                'id' => 25,
                'method' => 'post',
                'route' => 'save_image',
                'controller_name' => 'DashboardController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
                'function_name' => 'save_image',
            ),
            17 => 
            array (
                'id' => 26,
                'method' => 'post',
                'route' => 'static_translation/{id}/update',
                'controller_name' => 'StaticTranslationController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '2017-11-12 19:19:46',
                'function_name' => 'update',
            ),
            18 => 
            array (
                'id' => 27,
                'method' => 'get',
                'route' => 'static_translation/{id}/delete',
                'controller_name' => 'StaticTranslationController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
                'function_name' => 'destroy',
            ),
            19 => 
            array (
                'id' => 28,
                'method' => 'get',
                'route' => 'language/{id}/delete',
                'controller_name' => 'LanguageController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
                'function_name' => 'destroy',
            ),
            20 => 
            array (
                'id' => 29,
                'method' => 'post',
                'route' => 'language/{id}/update',
                'controller_name' => 'LanguageController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
                'function_name' => 'update',
            ),
            21 => 
            array (
                'id' => 30,
                'method' => 'get',
                'route' => 'roles',
                'controller_name' => 'RoleController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
                'function_name' => 'index',
            ),
            22 => 
            array (
                'id' => 31,
                'method' => 'get',
                'route' => 'roles/new',
                'controller_name' => 'RoleController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
                'function_name' => 'create',
            ),
            23 => 
            array (
                'id' => 32,
                'method' => 'post',
                'route' => 'roles',
                'controller_name' => 'RoleController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
                'function_name' => 'store',
            ),
            24 => 
            array (
                'id' => 33,
                'method' => 'get',
                'route' => 'roles/{id}/delete',
                'controller_name' => 'RoleController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
                'function_name' => 'destroy',
            ),
            25 => 
            array (
                'id' => 34,
                'method' => 'get',
                'route' => 'roles/{id}/edit',
                'controller_name' => 'RoleController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
                'function_name' => 'edit',
            ),
            26 => 
            array (
                'id' => 35,
                'method' => 'post',
                'route' => 'roles/{id}/update',
                'controller_name' => 'RoleController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
                'function_name' => 'update',
            ),
            27 => 
            array (
                'id' => 36,
                'method' => 'get',
                'route' => 'language',
                'controller_name' => 'LanguageController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
                'function_name' => 'index',
            ),
            28 => 
            array (
                'id' => 37,
                'method' => 'get',
                'route' => 'language/create',
                'controller_name' => 'LanguageController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
                'function_name' => 'create',
            ),
            29 => 
            array (
                'id' => 38,
                'method' => 'post',
                'route' => 'language',
                'controller_name' => 'LanguageController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
                'function_name' => 'store',
            ),
            30 => 
            array (
                'id' => 39,
                'method' => 'get',
                'route' => 'language/{id}/edit',
                'controller_name' => 'LanguageController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
                'function_name' => 'edit',
            ),
            31 => 
            array (
                'id' => 40,
                'method' => 'get',
                'route' => 'all_routes',
                'controller_name' => 'RouteController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '2019-09-10 14:21:52',
                'function_name' => 'index',
            ),
            32 => 
            array (
                'id' => 41,
                'method' => 'post',
                'route' => 'routes',
                'controller_name' => 'RouteController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
                'function_name' => 'store',
            ),
            33 => 
            array (
                'id' => 42,
                'method' => 'get',
                'route' => 'routes/{id}/edit',
                'controller_name' => 'RouteController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
                'function_name' => 'edit',
            ),
            34 => 
            array (
                'id' => 43,
                'method' => 'post',
                'route' => 'routes/{id}/update',
                'controller_name' => 'RouteController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '2018-01-28 16:25:29',
                'function_name' => 'update',
            ),
            35 => 
            array (
                'id' => 44,
                'method' => 'get',
                'route' => 'routes/{id}/delete',
                'controller_name' => 'RouteController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
                'function_name' => 'destroy',
            ),
            36 => 
            array (
                'id' => 45,
                'method' => 'get',
                'route' => 'routes/create',
                'controller_name' => 'RouteController',
                'created_at' => '0000-00-00 00:00:00',
                'updated_at' => '0000-00-00 00:00:00',
                'function_name' => 'create',
            ),
            37 => 
            array (
                'id' => 57,
                'method' => 'get',
                'route' => 'routes/index_v2',
                'controller_name' => 'RouteController',
                'created_at' => '2017-11-12 20:45:15',
                'updated_at' => '2017-11-12 21:04:53',
                'function_name' => 'index_v2',
            ),
            38 => 
            array (
                'id' => 58,
                'method' => 'get',
                'route' => 'roles/{id}/view_access',
                'controller_name' => 'RoleController',
                'created_at' => '2017-11-14 17:56:14',
                'updated_at' => '2017-11-15 15:14:14',
                'function_name' => 'view_access',
            ),
            39 => 
            array (
                'id' => 59,
                'method' => 'get',
                'route' => 'types/index',
                'controller_name' => 'TypeController',
                'created_at' => '2018-01-28 15:25:37',
                'updated_at' => '2018-01-28 15:25:37',
                'function_name' => 'index',
            ),
            40 => 
            array (
                'id' => 60,
                'method' => 'get',
                'route' => 'types/create',
                'controller_name' => 'TypeController',
                'created_at' => '2018-01-28 15:25:37',
                'updated_at' => '2018-01-28 15:25:37',
                'function_name' => 'create',
            ),
            41 => 
            array (
                'id' => 61,
                'method' => 'post',
                'route' => 'types',
                'controller_name' => 'TypeController',
                'created_at' => '2018-01-28 15:25:38',
                'updated_at' => '2018-01-28 15:25:38',
                'function_name' => 'store',
            ),
            42 => 
            array (
                'id' => 62,
                'method' => 'get',
                'route' => 'types/{id}/edit',
                'controller_name' => 'TypeController',
                'created_at' => '2018-01-28 15:25:38',
                'updated_at' => '2018-01-28 15:25:38',
                'function_name' => 'edit',
            ),
            43 => 
            array (
                'id' => 63,
                'method' => 'patch',
                'route' => 'types/{id}',
                'controller_name' => 'TypeController',
                'created_at' => '2018-01-28 15:25:38',
                'updated_at' => '2018-01-28 15:25:38',
                'function_name' => 'update',
            ),
            44 => 
            array (
                'id' => 64,
                'method' => 'get',
                'route' => 'types/{id}/delete',
                'controller_name' => 'TypeController',
                'created_at' => '2018-01-28 15:25:38',
                'updated_at' => '2018-01-28 15:25:38',
                'function_name' => 'destroy',
            ),
            45 => 
            array (
                'id' => 65,
                'method' => 'post',
                'route' => 'sortabledatatable',
                'controller_name' => 'SettingController',
                'created_at' => '2018-01-28 16:22:00',
                'updated_at' => '2018-01-28 16:22:00',
                'function_name' => 'updateOrder',
            ),
            46 => 
            array (
                'id' => 66,
                'method' => 'get',
                'route' => 'buildroutes',
                'controller_name' => 'RouteController',
                'created_at' => '2018-01-28 16:23:55',
                'updated_at' => '2018-01-28 16:23:55',
                'function_name' => 'buildroutes',
            ),
            47 => 
            array (
                'id' => 69,
                'method' => 'get',
                'route' => 'delete_all',
                'controller_name' => 'DashboardController',
                'created_at' => '2018-02-04 19:01:23',
                'updated_at' => '2018-02-04 19:01:23',
                'function_name' => 'delete_all_index',
            ),
            48 => 
            array (
                'id' => 70,
                'method' => 'post',
                'route' => 'delete_all',
                'controller_name' => 'DashboardController',
                'created_at' => '2018-02-04 19:01:23',
                'updated_at' => '2018-02-04 19:01:23',
                'function_name' => 'delete_all_store',
            ),
            49 => 
            array (
                'id' => 71,
                'method' => 'get',
                'route' => 'upload_resize_v2',
                'controller_name' => 'DashboardController',
                'created_at' => '2018-02-04 20:02:56',
                'updated_at' => '2018-02-04 20:02:56',
                'function_name' => 'upload_resize_v2',
            ),
            50 => 
            array (
                'id' => 72,
                'method' => 'post',
                'route' => 'sortabledatatable',
                'controller_name' => 'UserController',
                'created_at' => '2018-02-05 20:39:22',
                'updated_at' => '2018-02-05 20:39:22',
                'function_name' => 'updateOrder',
            ),
            51 => 
            array (
                'id' => 79,
                'method' => 'get',
                'route' => 'setting',
                'controller_name' => 'SettingController',
                'created_at' => '2018-02-05 21:10:10',
                'updated_at' => '2018-02-05 21:10:10',
                'function_name' => 'index',
            ),
            52 => 
            array (
                'id' => 80,
                'method' => 'get',
                'route' => 'users',
                'controller_name' => 'UserController',
                'created_at' => '2018-05-31 15:42:21',
                'updated_at' => '2018-05-31 15:42:21',
                'function_name' => 'index',
            ),
            53 => 
            array (
                'id' => 81,
                'method' => 'get',
                'route' => 'users/new',
                'controller_name' => 'UserController',
                'created_at' => '2018-05-31 15:42:21',
                'updated_at' => '2018-05-31 15:42:21',
                'function_name' => 'create',
            ),
            54 => 
            array (
                'id' => 82,
                'method' => 'post',
                'route' => 'users',
                'controller_name' => 'UserController',
                'created_at' => '2018-05-31 15:42:21',
                'updated_at' => '2018-05-31 15:42:21',
                'function_name' => 'store',
            ),
            55 => 
            array (
                'id' => 83,
                'method' => 'get',
                'route' => 'users/{id}/edit',
                'controller_name' => 'UserController',
                'created_at' => '2018-05-31 15:42:21',
                'updated_at' => '2018-05-31 15:42:21',
                'function_name' => 'edit',
            ),
            56 => 
            array (
                'id' => 84,
                'method' => 'post',
                'route' => 'users/{id}/update',
                'controller_name' => 'UserController',
                'created_at' => '2018-05-31 15:42:21',
                'updated_at' => '2018-05-31 15:42:21',
                'function_name' => 'update',
            ),
            57 => 
            array (
                'id' => 106,
                'method' => 'get',
                'route' => 'country',
                'controller_name' => 'CountryController',
                'created_at' => '2019-02-10 15:09:36',
                'updated_at' => '2019-02-10 15:09:36',
                'function_name' => 'index',
            ),
            58 => 
            array (
                'id' => 107,
                'method' => 'get',
                'route' => 'country/create',
                'controller_name' => 'CountryController',
                'created_at' => '2019-02-10 15:09:36',
                'updated_at' => '2019-02-10 15:09:36',
                'function_name' => 'create',
            ),
            59 => 
            array (
                'id' => 108,
                'method' => 'post',
                'route' => 'country',
                'controller_name' => 'CountryController',
                'created_at' => '2019-02-10 15:09:36',
                'updated_at' => '2019-02-10 15:09:36',
                'function_name' => 'store',
            ),
            60 => 
            array (
                'id' => 109,
                'method' => 'get',
                'route' => 'country/{id}',
                'controller_name' => 'CountryController',
                'created_at' => '2019-02-10 15:09:36',
                'updated_at' => '2019-02-10 15:09:36',
                'function_name' => 'show',
            ),
            61 => 
            array (
                'id' => 110,
                'method' => 'get',
                'route' => 'country/{id}/edit',
                'controller_name' => 'CountryController',
                'created_at' => '2019-02-10 15:09:37',
                'updated_at' => '2019-02-10 15:09:37',
                'function_name' => 'edit',
            ),
            62 => 
            array (
                'id' => 111,
                'method' => 'patch',
                'route' => 'country/{id}',
                'controller_name' => 'CountryController',
                'created_at' => '2019-02-10 15:09:37',
                'updated_at' => '2019-02-10 15:10:42',
                'function_name' => 'update',
            ),
            63 => 
            array (
                'id' => 112,
                'method' => 'get',
                'route' => 'country/{id}/delete',
                'controller_name' => 'CountryController',
                'created_at' => '2019-02-10 15:09:37',
                'updated_at' => '2019-02-10 15:09:37',
                'function_name' => 'delete',
            ),
            64 => 
            array (
                'id' => 113,
                'method' => 'get',
                'route' => 'operator',
                'controller_name' => 'OperatorController',
                'created_at' => '2019-02-10 15:10:27',
                'updated_at' => '2019-02-10 15:10:27',
                'function_name' => 'index',
            ),
            65 => 
            array (
                'id' => 114,
                'method' => 'get',
                'route' => 'operator/create',
                'controller_name' => 'OperatorController',
                'created_at' => '2019-02-10 15:10:27',
                'updated_at' => '2019-02-10 15:10:27',
                'function_name' => 'create',
            ),
            66 => 
            array (
                'id' => 115,
                'method' => 'post',
                'route' => 'operator',
                'controller_name' => 'OperatorController',
                'created_at' => '2019-02-10 15:10:27',
                'updated_at' => '2019-02-10 15:10:27',
                'function_name' => 'store',
            ),
            67 => 
            array (
                'id' => 116,
                'method' => 'get',
                'route' => 'operator/{id}',
                'controller_name' => 'OperatorController',
                'created_at' => '2019-02-10 15:10:27',
                'updated_at' => '2019-02-10 15:10:27',
                'function_name' => 'show',
            ),
            68 => 
            array (
                'id' => 117,
                'method' => 'get',
                'route' => 'operator/{id}/edit',
                'controller_name' => 'OperatorController',
                'created_at' => '2019-02-10 15:10:27',
                'updated_at' => '2019-02-10 15:10:27',
                'function_name' => 'edit',
            ),
            69 => 
            array (
                'id' => 118,
                'method' => 'patch',
                'route' => 'operator/{id}',
                'controller_name' => 'OperatorController',
                'created_at' => '2019-02-10 15:10:27',
                'updated_at' => '2019-02-10 15:10:27',
                'function_name' => 'update',
            ),
            70 => 
            array (
                'id' => 119,
                'method' => 'get',
                'route' => 'operator/{id}/delete',
                'controller_name' => 'OperatorController',
                'created_at' => '2019-02-10 15:10:27',
                'updated_at' => '2019-02-10 15:10:27',
                'function_name' => 'destroy',
            ),
            71 => 
            array (
                'id' => 120,
                'method' => 'get',
                'route' => 'category',
                'controller_name' => 'CategoryController',
                'created_at' => '2019-02-14 20:01:13',
                'updated_at' => '2019-02-14 20:01:13',
                'function_name' => 'index',
            ),
            72 => 
            array (
                'id' => 121,
                'method' => 'get',
                'route' => 'category/create',
                'controller_name' => 'CategoryController',
                'created_at' => '2019-02-14 20:01:13',
                'updated_at' => '2019-02-14 20:01:13',
                'function_name' => 'create',
            ),
            73 => 
            array (
                'id' => 122,
                'method' => 'post',
                'route' => 'category',
                'controller_name' => 'CategoryController',
                'created_at' => '2019-02-14 20:01:13',
                'updated_at' => '2019-02-14 20:01:13',
                'function_name' => 'store',
            ),
            74 => 
            array (
                'id' => 123,
                'method' => 'get',
                'route' => 'category/{id}',
                'controller_name' => 'CategoryController',
                'created_at' => '2019-02-14 20:01:13',
                'updated_at' => '2019-02-14 20:01:13',
                'function_name' => 'show',
            ),
            75 => 
            array (
                'id' => 124,
                'method' => 'get',
                'route' => 'category/{id}/edit',
                'controller_name' => 'CategoryController',
                'created_at' => '2019-02-14 20:01:13',
                'updated_at' => '2019-02-14 20:01:13',
                'function_name' => 'edit',
            ),
            76 => 
            array (
                'id' => 125,
                'method' => 'patch',
                'route' => 'category/{id}',
                'controller_name' => 'CategoryController',
                'created_at' => '2019-02-14 20:01:13',
                'updated_at' => '2019-02-14 20:01:13',
                'function_name' => 'update',
            ),
            77 => 
            array (
                'id' => 126,
                'method' => 'get',
                'route' => 'category/{id}/delete',
                'controller_name' => 'CategoryController',
                'created_at' => '2019-02-14 20:01:13',
                'updated_at' => '2019-02-14 20:01:13',
                'function_name' => 'destroy',
            ),
            78 => 
            array (
                'id' => 127,
                'method' => 'get',
                'route' => 'content_type',
                'controller_name' => 'ContentTypeController',
                'created_at' => '2019-02-14 20:02:21',
                'updated_at' => '2019-02-14 20:02:21',
                'function_name' => 'index',
            ),
            79 => 
            array (
                'id' => 128,
                'method' => 'get',
                'route' => 'content_type/create',
                'controller_name' => 'ContentTypeController',
                'created_at' => '2019-02-14 20:02:21',
                'updated_at' => '2019-02-14 20:02:21',
                'function_name' => 'create',
            ),
            80 => 
            array (
                'id' => 129,
                'method' => 'post',
                'route' => 'content_type',
                'controller_name' => 'ContentTypeController',
                'created_at' => '2019-02-14 20:02:21',
                'updated_at' => '2019-02-14 20:02:21',
                'function_name' => 'store',
            ),
            81 => 
            array (
                'id' => 130,
                'method' => 'get',
                'route' => 'content_type/{id}',
                'controller_name' => 'ContentTypeController',
                'created_at' => '2019-02-14 20:02:21',
                'updated_at' => '2019-02-14 20:02:21',
                'function_name' => 'show',
            ),
            82 => 
            array (
                'id' => 131,
                'method' => 'get',
                'route' => 'content_type/{id}/edit',
                'controller_name' => 'ContentTypeController',
                'created_at' => '2019-02-14 20:02:22',
                'updated_at' => '2019-02-14 20:02:22',
                'function_name' => 'edit',
            ),
            83 => 
            array (
                'id' => 132,
                'method' => 'patch',
                'route' => 'content_type/{id}',
                'controller_name' => 'ContentTypeController',
                'created_at' => '2019-02-14 20:02:22',
                'updated_at' => '2019-02-14 20:02:22',
                'function_name' => 'update',
            ),
            84 => 
            array (
                'id' => 133,
                'method' => 'get',
                'route' => 'content_type/{id}/delete',
                'controller_name' => 'ContentTypeController',
                'created_at' => '2019-02-14 20:02:22',
                'updated_at' => '2019-02-14 20:02:22',
                'function_name' => 'destroy',
            ),
            85 => 
            array (
                'id' => 134,
                'method' => 'get',
                'route' => 'content',
                'controller_name' => 'ContentController',
                'created_at' => '2019-02-14 20:03:26',
                'updated_at' => '2019-02-14 20:03:26',
                'function_name' => 'index',
            ),
            86 => 
            array (
                'id' => 135,
                'method' => 'get',
                'route' => 'content/create',
                'controller_name' => 'ContentController',
                'created_at' => '2019-02-14 20:03:26',
                'updated_at' => '2019-02-14 20:03:26',
                'function_name' => 'create',
            ),
            87 => 
            array (
                'id' => 136,
                'method' => 'post',
                'route' => 'content',
                'controller_name' => 'ContentController',
                'created_at' => '2019-02-14 20:03:26',
                'updated_at' => '2019-02-14 20:03:26',
                'function_name' => 'store',
            ),
            88 => 
            array (
                'id' => 137,
                'method' => 'get',
                'route' => 'content/{id}',
                'controller_name' => 'ContentController',
                'created_at' => '2019-02-14 20:03:26',
                'updated_at' => '2019-02-14 20:03:26',
                'function_name' => 'show',
            ),
            89 => 
            array (
                'id' => 138,
                'method' => 'get',
                'route' => 'content/{id}/edit',
                'controller_name' => 'ContentController',
                'created_at' => '2019-02-14 20:03:26',
                'updated_at' => '2019-02-14 20:03:26',
                'function_name' => 'edit',
            ),
            90 => 
            array (
                'id' => 139,
                'method' => 'patch',
                'route' => 'content/{id}',
                'controller_name' => 'ContentController',
                'created_at' => '2019-02-14 20:03:26',
                'updated_at' => '2019-02-14 20:03:26',
                'function_name' => 'update',
            ),
            91 => 
            array (
                'id' => 140,
                'method' => 'get',
                'route' => 'content/{id}/delete',
                'controller_name' => 'ContentController',
                'created_at' => '2019-02-14 20:03:26',
                'updated_at' => '2019-02-14 20:03:26',
                'function_name' => 'destroy',
            ),
            92 => 
            array (
                'id' => 141,
                'method' => 'get',
                'route' => 'post',
                'controller_name' => 'PostController',
                'created_at' => '2019-02-14 20:04:09',
                'updated_at' => '2019-02-14 20:04:09',
                'function_name' => 'index',
            ),
            93 => 
            array (
                'id' => 142,
                'method' => 'get',
                'route' => 'post/create',
                'controller_name' => 'PostController',
                'created_at' => '2019-02-14 20:04:09',
                'updated_at' => '2019-02-14 20:04:09',
                'function_name' => 'create',
            ),
            94 => 
            array (
                'id' => 143,
                'method' => 'post',
                'route' => 'post',
                'controller_name' => 'PostController',
                'created_at' => '2019-02-14 20:04:09',
                'updated_at' => '2019-02-14 20:04:09',
                'function_name' => 'store',
            ),
            95 => 
            array (
                'id' => 144,
                'method' => 'get',
                'route' => 'post/{id}',
                'controller_name' => 'PostController',
                'created_at' => '2019-02-14 20:04:09',
                'updated_at' => '2019-02-14 20:04:09',
                'function_name' => 'show',
            ),
            96 => 
            array (
                'id' => 145,
                'method' => 'get',
                'route' => 'post/{id}/edit',
                'controller_name' => 'PostController',
                'created_at' => '2019-02-14 20:04:09',
                'updated_at' => '2019-02-14 20:04:09',
                'function_name' => 'edit',
            ),
            97 => 
            array (
                'id' => 146,
                'method' => 'patch',
                'route' => 'post/{id}',
                'controller_name' => 'PostController',
                'created_at' => '2019-02-14 20:04:09',
                'updated_at' => '2019-02-14 20:04:09',
                'function_name' => 'update',
            ),
            98 => 
            array (
                'id' => 147,
                'method' => 'get',
                'route' => 'post/{id}/delete',
                'controller_name' => 'PostController',
                'created_at' => '2019-02-14 20:04:09',
                'updated_at' => '2019-02-14 20:04:09',
                'function_name' => 'destroy',
            ),
            99 => 
            array (
                'id' => 148,
                'method' => 'get',
                'route' => 'sub_category',
                'controller_name' => 'SubCategoryController',
                'created_at' => '2019-03-06 16:00:28',
                'updated_at' => '2019-03-06 16:00:28',
                'function_name' => 'index',
            ),
            100 => 
            array (
                'id' => 149,
                'method' => 'get',
                'route' => 'sub_category/create',
                'controller_name' => 'SubCategoryController',
                'created_at' => '2019-03-06 16:00:28',
                'updated_at' => '2019-03-06 16:00:28',
                'function_name' => 'create',
            ),
            101 => 
            array (
                'id' => 150,
                'method' => 'post',
                'route' => 'sub_category',
                'controller_name' => 'SubCategoryController',
                'created_at' => '2019-03-06 16:00:28',
                'updated_at' => '2019-03-06 16:00:28',
                'function_name' => 'store',
            ),
            102 => 
            array (
                'id' => 151,
                'method' => 'get',
                'route' => 'sub_category/{id}',
                'controller_name' => 'SubCategoryController',
                'created_at' => '2019-03-06 16:00:28',
                'updated_at' => '2019-03-06 16:00:28',
                'function_name' => 'show',
            ),
            103 => 
            array (
                'id' => 152,
                'method' => 'get',
                'route' => 'sub_category/{id}/edit',
                'controller_name' => 'SubCategoryController',
                'created_at' => '2019-03-06 16:00:28',
                'updated_at' => '2019-03-06 16:00:28',
                'function_name' => 'edit',
            ),
            104 => 
            array (
                'id' => 153,
                'method' => 'patch',
                'route' => 'sub_category/{id}',
                'controller_name' => 'SubCategoryController',
                'created_at' => '2019-03-06 16:00:28',
                'updated_at' => '2019-03-06 16:00:28',
                'function_name' => 'update',
            ),
            105 => 
            array (
                'id' => 154,
                'method' => 'get',
                'route' => 'sub_category/{id}/delete',
                'controller_name' => 'SubCategoryController',
                'created_at' => '2019-03-06 16:00:28',
                'updated_at' => '2019-03-06 16:00:28',
                'function_name' => 'destroy',
            ),
            106 => 
            array (
                'id' => 155,
                'method' => 'get',
                'route' => 'rbt',
                'controller_name' => 'RbtController',
                'created_at' => '2019-03-14 14:51:14',
                'updated_at' => '2019-03-14 14:51:14',
                'function_name' => 'index',
            ),
            107 => 
            array (
                'id' => 156,
                'method' => 'get',
                'route' => 'rbt/create',
                'controller_name' => 'RbtController',
                'created_at' => '2019-03-14 14:51:14',
                'updated_at' => '2019-03-14 14:51:14',
                'function_name' => 'create',
            ),
            108 => 
            array (
                'id' => 157,
                'method' => 'post',
                'route' => 'rbt',
                'controller_name' => 'RbtController',
                'created_at' => '2019-03-14 14:51:15',
                'updated_at' => '2019-03-14 14:51:15',
                'function_name' => 'store',
            ),
            109 => 
            array (
                'id' => 158,
                'method' => 'get',
                'route' => 'rbt/{id}',
                'controller_name' => 'RbtController',
                'created_at' => '2019-03-14 14:51:15',
                'updated_at' => '2019-03-14 14:51:15',
                'function_name' => 'show',
            ),
            110 => 
            array (
                'id' => 159,
                'method' => 'get',
                'route' => 'rbt/{id}/edit',
                'controller_name' => 'RbtController',
                'created_at' => '2019-03-14 14:51:15',
                'updated_at' => '2019-03-14 14:51:15',
                'function_name' => 'edit',
            ),
            111 => 
            array (
                'id' => 160,
                'method' => 'patch',
                'route' => 'rbt/{id}',
                'controller_name' => 'RbtController',
                'created_at' => '2019-03-14 14:51:15',
                'updated_at' => '2019-03-14 14:51:15',
                'function_name' => 'update',
            ),
            112 => 
            array (
                'id' => 161,
                'method' => 'get',
                'route' => 'rbt/{id}/delete',
                'controller_name' => 'RbtController',
                'created_at' => '2019-03-14 14:51:15',
                'updated_at' => '2019-03-14 14:51:15',
                'function_name' => 'destroy',
            ),
            113 => 
            array (
                'id' => 181,
                'method' => 'get',
                'route' => 'brand',
                'controller_name' => 'BrandController',
                'created_at' => '2019-09-10 13:20:04',
                'updated_at' => '2019-09-10 13:20:04',
                'function_name' => 'index',
            ),
            114 => 
            array (
                'id' => 182,
                'method' => 'get',
                'route' => 'brand/create',
                'controller_name' => 'BrandController',
                'created_at' => '2019-09-10 13:20:04',
                'updated_at' => '2019-09-10 13:20:04',
                'function_name' => 'create',
            ),
            115 => 
            array (
                'id' => 183,
                'method' => 'post',
                'route' => 'brand',
                'controller_name' => 'BrandController',
                'created_at' => '2019-09-10 13:20:04',
                'updated_at' => '2019-09-10 13:20:04',
                'function_name' => 'store',
            ),
            116 => 
            array (
                'id' => 184,
                'method' => 'get',
                'route' => 'brand/{id}',
                'controller_name' => 'BrandController',
                'created_at' => '2019-09-10 13:20:04',
                'updated_at' => '2019-09-10 13:20:04',
                'function_name' => 'show',
            ),
            117 => 
            array (
                'id' => 185,
                'method' => 'get',
                'route' => 'brand/{id}/edit',
                'controller_name' => 'BrandController',
                'created_at' => '2019-09-10 13:20:04',
                'updated_at' => '2019-09-10 13:20:04',
                'function_name' => 'edit',
            ),
            118 => 
            array (
                'id' => 186,
                'method' => 'patch',
                'route' => 'brand/{id}',
                'controller_name' => 'BrandController',
                'created_at' => '2019-09-10 13:20:04',
                'updated_at' => '2019-09-10 13:20:04',
                'function_name' => 'update',
            ),
            119 => 
            array (
                'id' => 187,
                'method' => 'get',
                'route' => 'brand/{id}/delete',
                'controller_name' => 'BrandController',
                'created_at' => '2019-09-10 13:20:04',
                'updated_at' => '2019-09-10 13:20:04',
                'function_name' => 'destroy',
            ),
            120 => 
            array (
                'id' => 188,
                'method' => 'get',
                'route' => 'client',
                'controller_name' => 'ClientController',
                'created_at' => '2019-09-10 13:20:58',
                'updated_at' => '2019-09-10 13:20:58',
                'function_name' => 'index',
            ),
            121 => 
            array (
                'id' => 189,
                'method' => 'get',
                'route' => 'address',
                'controller_name' => 'ClientAddressController',
                'created_at' => '2019-09-10 13:21:09',
                'updated_at' => '2019-09-10 13:21:09',
                'function_name' => 'index',
            ),
            122 => 
            array (
                'id' => 190,
                'method' => 'get',
                'route' => 'rate',
                'controller_name' => 'ClientRateController',
                'created_at' => '2019-09-10 13:22:07',
                'updated_at' => '2019-09-10 13:22:07',
                'function_name' => 'index',
            ),
            123 => 
            array (
                'id' => 191,
                'method' => 'get',
                'route' => 'rate/publish/{id}',
                'controller_name' => 'ClientRateController',
                'created_at' => '2019-09-10 13:22:07',
                'updated_at' => '2019-09-10 13:22:07',
                'function_name' => 'update_rate',
            ),
            124 => 
            array (
                'id' => 192,
                'method' => 'get',
                'route' => 'product',
                'controller_name' => 'ProductController',
                'created_at' => '2019-09-10 13:22:48',
                'updated_at' => '2019-09-10 13:22:48',
                'function_name' => 'index',
            ),
            125 => 
            array (
                'id' => 193,
                'method' => 'get',
                'route' => 'product/create',
                'controller_name' => 'ProductController',
                'created_at' => '2019-09-10 13:22:48',
                'updated_at' => '2019-09-10 13:22:48',
                'function_name' => 'create',
            ),
            126 => 
            array (
                'id' => 194,
                'method' => 'post',
                'route' => 'product',
                'controller_name' => 'ProductController',
                'created_at' => '2019-09-10 13:22:48',
                'updated_at' => '2019-09-10 13:22:48',
                'function_name' => 'store',
            ),
            127 => 
            array (
                'id' => 195,
                'method' => 'get',
                'route' => 'product/{id}',
                'controller_name' => 'ProductController',
                'created_at' => '2019-09-10 13:22:48',
                'updated_at' => '2019-09-10 13:22:48',
                'function_name' => 'show',
            ),
            128 => 
            array (
                'id' => 196,
                'method' => 'get',
                'route' => 'product/{id}/edit',
                'controller_name' => 'ProductController',
                'created_at' => '2019-09-10 13:22:48',
                'updated_at' => '2019-09-10 13:22:48',
                'function_name' => 'edit',
            ),
            129 => 
            array (
                'id' => 197,
                'method' => 'patch',
                'route' => 'product/{id}',
                'controller_name' => 'ProductController',
                'created_at' => '2019-09-10 13:22:48',
                'updated_at' => '2019-09-10 13:22:48',
                'function_name' => 'update',
            ),
            130 => 
            array (
                'id' => 198,
                'method' => 'get',
                'route' => 'product/{id}/delete',
                'controller_name' => 'ProductController',
                'created_at' => '2019-09-10 13:22:49',
                'updated_at' => '2019-09-10 13:22:49',
                'function_name' => 'destroy',
            ),
            131 => 
            array (
                'id' => 199,
                'method' => 'get',
                'route' => 'delete_image/{id}',
                'controller_name' => 'ProductController',
                'created_at' => '2019-09-10 13:22:49',
                'updated_at' => '2019-09-10 13:22:49',
                'function_name' => 'delete_image',
            ),
            132 => 
            array (
                'id' => 200,
                'method' => 'get',
                'route' => 'contact',
                'controller_name' => 'ContactController',
                'created_at' => '2019-09-10 19:24:01',
                'updated_at' => '2019-09-10 19:24:01',
                'function_name' => 'index',
            ),
            133 => 
            array (
                'id' => 201,
                'method' => 'get',
                'route' => 'contact/{id}/delete',
                'controller_name' => 'ContactController',
                'created_at' => '2019-09-10 19:24:01',
                'updated_at' => '2019-09-10 19:24:01',
                'function_name' => 'destroy',
            ),
            134 => 
            array (
                'id' => 202,
                'method' => 'get',
                'route' => 'order',
                'controller_name' => 'OrderController',
                'created_at' => '2019-09-17 20:20:39',
                'updated_at' => '2019-09-17 20:20:39',
                'function_name' => 'index',
            ),
            135 => 
            array (
                'id' => 203,
                'method' => 'get',
                'route' => 'order/{id}',
                'controller_name' => 'OrderController',
                'created_at' => '2019-09-17 20:20:39',
                'updated_at' => '2019-09-17 20:20:39',
                'function_name' => 'show',
            ),
            136 => 
            array (
                'id' => 204,
                'method' => 'get',
                'route' => 'order/{id}/delete',
                'controller_name' => 'OrderController',
                'created_at' => '2019-09-17 20:20:39',
                'updated_at' => '2019-09-17 20:20:39',
                'function_name' => 'delete',
            ),
            137 => 
            array (
                'id' => 205,
                'method' => 'get',
                'route' => 'delete_order',
                'controller_name' => 'OrderController',
                'created_at' => '2019-09-19 15:22:38',
                'updated_at' => '2019-09-19 15:28:43',
                'function_name' => 'delete_product',
            ),
            138 => 
            array (
                'id' => 206,
                'method' => 'get',
                'route' => 'governorate',
                'controller_name' => 'GovernorateController',
                'created_at' => '2019-09-23 19:13:06',
                'updated_at' => '2019-09-23 19:13:06',
                'function_name' => 'index',
            ),
            139 => 
            array (
                'id' => 207,
                'method' => 'get',
                'route' => 'governorate/create',
                'controller_name' => 'GovernorateController',
                'created_at' => '2019-09-23 19:13:07',
                'updated_at' => '2019-09-23 19:13:07',
                'function_name' => 'create',
            ),
            140 => 
            array (
                'id' => 208,
                'method' => 'post',
                'route' => 'governorate',
                'controller_name' => 'GovernorateController',
                'created_at' => '2019-09-23 19:13:07',
                'updated_at' => '2019-09-23 19:13:07',
                'function_name' => 'store',
            ),
            141 => 
            array (
                'id' => 209,
                'method' => 'get',
                'route' => 'governorate/{id}',
                'controller_name' => 'GovernorateController',
                'created_at' => '2019-09-23 19:13:07',
                'updated_at' => '2019-09-23 19:13:07',
                'function_name' => 'show',
            ),
            142 => 
            array (
                'id' => 210,
                'method' => 'get',
                'route' => 'governorate/{id}/edit',
                'controller_name' => 'GovernorateController',
                'created_at' => '2019-09-23 19:13:07',
                'updated_at' => '2019-09-23 19:13:07',
                'function_name' => 'edit',
            ),
            143 => 
            array (
                'id' => 211,
                'method' => 'patch',
                'route' => 'governorate/{id}',
                'controller_name' => 'GovernorateController',
                'created_at' => '2019-09-23 19:13:07',
                'updated_at' => '2019-09-23 19:13:07',
                'function_name' => 'update',
            ),
            144 => 
            array (
                'id' => 212,
                'method' => 'get',
                'route' => 'governorate/{id}/delete',
                'controller_name' => 'GovernorateController',
                'created_at' => '2019-09-23 19:13:07',
                'updated_at' => '2019-09-23 19:13:07',
                'function_name' => 'delete',
            ),
            145 => 
            array (
                'id' => 213,
                'method' => 'get',
                'route' => 'city',
                'controller_name' => 'CityController',
                'created_at' => '2019-09-23 19:46:04',
                'updated_at' => '2019-09-23 19:46:04',
                'function_name' => 'index',
            ),
            146 => 
            array (
                'id' => 214,
                'method' => 'get',
                'route' => 'city/create',
                'controller_name' => 'CityController',
                'created_at' => '2019-09-23 19:46:04',
                'updated_at' => '2019-09-23 19:46:04',
                'function_name' => 'create',
            ),
            147 => 
            array (
                'id' => 215,
                'method' => 'post',
                'route' => 'city',
                'controller_name' => 'CityController',
                'created_at' => '2019-09-23 19:46:05',
                'updated_at' => '2019-09-23 19:46:05',
                'function_name' => 'store',
            ),
            148 => 
            array (
                'id' => 216,
                'method' => 'get',
                'route' => 'city/{id}',
                'controller_name' => 'CityController',
                'created_at' => '2019-09-23 19:46:05',
                'updated_at' => '2019-09-23 19:46:05',
                'function_name' => 'show',
            ),
            149 => 
            array (
                'id' => 217,
                'method' => 'get',
                'route' => 'city/{id}/edit',
                'controller_name' => 'CityController',
                'created_at' => '2019-09-23 19:46:05',
                'updated_at' => '2019-09-23 19:46:05',
                'function_name' => 'edit',
            ),
            150 => 
            array (
                'id' => 218,
                'method' => 'patch',
                'route' => 'city/{id}',
                'controller_name' => 'CityController',
                'created_at' => '2019-09-23 19:46:05',
                'updated_at' => '2019-09-23 19:46:05',
                'function_name' => 'update',
            ),
            151 => 
            array (
                'id' => 219,
                'method' => 'get',
                'route' => 'city/{id}/delete',
                'controller_name' => 'CityController',
                'created_at' => '2019-09-23 19:46:05',
                'updated_at' => '2019-09-23 19:46:05',
                'function_name' => 'delete',
            ),
            152 => 
            array (
                'id' => 220,
                'method' => 'get',
                'route' => 'advertisement',
                'controller_name' => 'AdvertisementController',
                'created_at' => '2019-09-23 20:32:26',
                'updated_at' => '2019-09-23 20:32:26',
                'function_name' => 'index',
            ),
            153 => 
            array (
                'id' => 221,
                'method' => 'get',
                'route' => 'advertisement/create',
                'controller_name' => 'AdvertisementController',
                'created_at' => '2019-09-23 20:32:27',
                'updated_at' => '2019-09-23 20:32:27',
                'function_name' => 'create',
            ),
            154 => 
            array (
                'id' => 222,
                'method' => 'post',
                'route' => 'advertisement',
                'controller_name' => 'AdvertisementController',
                'created_at' => '2019-09-23 20:32:27',
                'updated_at' => '2019-09-23 20:32:27',
                'function_name' => 'store',
            ),
            155 => 
            array (
                'id' => 223,
                'method' => 'get',
                'route' => 'advertisement/{id}',
                'controller_name' => 'AdvertisementController',
                'created_at' => '2019-09-23 20:32:27',
                'updated_at' => '2019-09-23 20:32:27',
                'function_name' => 'show',
            ),
            156 => 
            array (
                'id' => 224,
                'method' => 'get',
                'route' => 'advertisement/{id}/edit',
                'controller_name' => 'AdvertisementController',
                'created_at' => '2019-09-23 20:32:27',
                'updated_at' => '2019-09-23 20:32:27',
                'function_name' => 'edit',
            ),
            157 => 
            array (
                'id' => 225,
                'method' => 'patch',
                'route' => 'advertisement/{id}',
                'controller_name' => 'AdvertisementController',
                'created_at' => '2019-09-23 20:32:27',
                'updated_at' => '2019-09-23 20:32:27',
                'function_name' => 'update',
            ),
            158 => 
            array (
                'id' => 226,
                'method' => 'get',
                'route' => 'advertisement/{id}/delete',
                'controller_name' => 'AdvertisementController',
                'created_at' => '2019-09-23 20:32:27',
                'updated_at' => '2019-09-23 20:32:27',
                'function_name' => 'delete',
            ),
            159 => 
            array (
                'id' => 227,
                'method' => 'get',
                'route' => 'coupon',
                'controller_name' => 'CouponController',
                'created_at' => '2019-09-23 20:45:14',
                'updated_at' => '2019-09-23 20:45:14',
                'function_name' => 'index',
            ),
            160 => 
            array (
                'id' => 228,
                'method' => 'get',
                'route' => 'coupon/create',
                'controller_name' => 'CouponController',
                'created_at' => '2019-09-23 20:45:14',
                'updated_at' => '2019-09-23 20:45:14',
                'function_name' => 'create',
            ),
            161 => 
            array (
                'id' => 229,
                'method' => 'get',
                'route' => 'coupon/{id}',
                'controller_name' => 'CouponController',
                'created_at' => '2019-09-23 20:45:14',
                'updated_at' => '2019-09-23 20:45:14',
                'function_name' => 'show',
            ),
            162 => 
            array (
                'id' => 230,
                'method' => 'get',
                'route' => 'coupon/{id}/edit',
                'controller_name' => 'CouponController',
                'created_at' => '2019-09-23 20:45:14',
                'updated_at' => '2019-09-23 20:45:14',
                'function_name' => 'edit',
            ),
            163 => 
            array (
                'id' => 231,
                'method' => 'post',
                'route' => 'coupon/{id}',
                'controller_name' => 'CouponController',
                'created_at' => '2019-09-23 20:45:14',
                'updated_at' => '2019-09-23 20:45:14',
                'function_name' => 'update',
            ),
            164 => 
            array (
                'id' => 232,
                'method' => 'get',
                'route' => 'coupon/{id}/delete',
                'controller_name' => 'CouponController',
                'created_at' => '2019-09-23 20:45:14',
                'updated_at' => '2019-09-23 20:45:14',
                'function_name' => 'destroy',
            ),
            165 => 
            array (
                'id' => 233,
                'method' => 'post',
                'route' => 'coupon',
                'controller_name' => 'CouponController',
                'created_at' => '2019-09-23 20:45:48',
                'updated_at' => '2019-09-23 20:45:48',
                'function_name' => 'store',
            ),
            166 => 
            array (
                'id' => 234,
                'method' => 'post',
                'route' => 'orders/update_status',
                'controller_name' => 'OrderController',
                'created_at' => '2019-09-24 22:52:26',
                'updated_at' => '2019-09-24 22:52:26',
                'function_name' => 'update_status',
            ),
            167 => 
            array (
                'id' => 235,
                'method' => 'get',
                'route' => 'client/{id}/delete',
                'controller_name' => 'ClientController',
                'created_at' => '2019-09-25 23:39:04',
                'updated_at' => '2019-09-25 23:39:04',
                'function_name' => 'destroy',
            ),
            168 => 
            array (
                'id' => 236,
                'method' => 'get',
                'route' => 'setting/address',
                'controller_name' => 'SettingController',
                'created_at' => '2019-10-03 17:20:00',
                'updated_at' => '2019-10-03 17:20:00',
                'function_name' => 'add_address',
            ),
            169 => 
            array (
                'id' => 237,
                'method' => 'get',
                'route' => 'products/get_excel',
                'controller_name' => 'ProductController',
                'created_at' => '2019-10-03 23:43:40',
                'updated_at' => '2019-10-03 23:43:40',
                'function_name' => 'get_excel',
            ),
            170 => 
            array (
                'id' => 238,
                'method' => 'post',
                'route' => 'products/store_excel',
                'controller_name' => 'ProductController',
                'created_at' => '2019-10-03 23:43:40',
                'updated_at' => '2019-10-04 00:22:36',
                'function_name' => 'store_excel',
            ),
            171 => 
            array (
                'id' => 239,
                'method' => 'get',
                'route' => 'product/downloadSampleNew',
                'controller_name' => 'ProductController',
                'created_at' => '2019-10-04 00:20:30',
                'updated_at' => '2019-10-04 00:20:30',
                'function_name' => 'getDownload',
            ),
            172 => 
            array (
                'id' => 240,
                'method' => 'get',
                'route' => 'unavailable',
                'controller_name' => 'ContactController',
                'created_at' => '2019-10-07 20:30:23',
                'updated_at' => '2019-10-07 20:30:23',
                'function_name' => 'request_index',
            ),
            173 => 
            array (
                'id' => 241,
                'method' => 'post',
                'route' => 'unavailable/{id}',
                'controller_name' => 'ContactController',
                'created_at' => '2019-10-07 20:30:23',
                'updated_at' => '2019-10-07 21:21:10',
                'function_name' => 'message_to_user',
            ),
            174 => 
            array (
                'id' => 242,
                'method' => 'get',
                'route' => 'property',
                'controller_name' => 'PropertyController',
                'created_at' => '2020-02-11 11:19:29',
                'updated_at' => '2020-02-11 11:19:29',
                'function_name' => 'index',
            ),
            175 => 
            array (
                'id' => 243,
                'method' => 'get',
                'route' => 'property/create',
                'controller_name' => 'PropertyController',
                'created_at' => '2020-02-11 11:19:29',
                'updated_at' => '2020-02-11 11:19:29',
                'function_name' => 'create',
            ),
            176 => 
            array (
                'id' => 244,
                'method' => 'post',
                'route' => 'property',
                'controller_name' => 'PropertyController',
                'created_at' => '2020-02-11 11:25:30',
                'updated_at' => '2020-02-11 11:25:30',
                'function_name' => 'store',
            ),
            177 => 
            array (
                'id' => 245,
                'method' => 'get',
                'route' => 'property/{id}',
                'controller_name' => 'PropertyController',
                'created_at' => '2020-02-11 11:28:09',
                'updated_at' => '2020-02-11 11:28:09',
                'function_name' => 'show',
            ),
            178 => 
            array (
                'id' => 246,
                'method' => 'get',
                'route' => 'property/{id}/edit',
                'controller_name' => 'PropertyController',
                'created_at' => '2020-02-11 11:28:09',
                'updated_at' => '2020-02-11 11:28:09',
                'function_name' => 'edit',
            ),
            179 => 
            array (
                'id' => 247,
                'method' => 'patch',
                'route' => 'property/{id}',
                'controller_name' => 'PropertyController',
                'created_at' => '2020-02-11 11:28:09',
                'updated_at' => '2020-02-11 11:28:09',
                'function_name' => 'update',
            ),
            180 => 
            array (
                'id' => 248,
                'method' => 'get',
                'route' => 'property/{id}/delete',
                'controller_name' => 'PropertyController',
                'created_at' => '2020-02-11 11:28:09',
                'updated_at' => '2020-02-11 11:28:09',
                'function_name' => 'destroy',
            ),
            181 => 
            array (
                'id' => 249,
                'method' => 'get',
                'route' => 'property_value',
                'controller_name' => 'PropertyValueController',
                'created_at' => '2020-02-11 12:10:30',
                'updated_at' => '2020-02-11 12:10:30',
                'function_name' => 'index',
            ),
            182 => 
            array (
                'id' => 250,
                'method' => 'get',
                'route' => 'property_value/create',
                'controller_name' => 'PropertyValueController',
                'created_at' => '2020-02-11 12:10:30',
                'updated_at' => '2020-02-11 12:10:30',
                'function_name' => 'create',
            ),
            183 => 
            array (
                'id' => 251,
                'method' => 'post',
                'route' => 'property_value',
                'controller_name' => 'PropertyValueController',
                'created_at' => '2020-02-11 12:10:30',
                'updated_at' => '2020-02-11 12:10:30',
                'function_name' => 'store',
            ),
            184 => 
            array (
                'id' => 252,
                'method' => 'get',
                'route' => 'property_value/{id}',
                'controller_name' => 'PropertyValueController',
                'created_at' => '2020-02-11 12:10:30',
                'updated_at' => '2020-02-11 12:10:30',
                'function_name' => 'show',
            ),
            185 => 
            array (
                'id' => 253,
                'method' => 'get',
                'route' => 'property_value/{id}/edit',
                'controller_name' => 'PropertyValueController',
                'created_at' => '2020-02-11 12:10:30',
                'updated_at' => '2020-02-11 12:10:30',
                'function_name' => 'edit',
            ),
            186 => 
            array (
                'id' => 254,
                'method' => 'patch',
                'route' => 'property_value/{id}',
                'controller_name' => 'PropertyValueController',
                'created_at' => '2020-02-11 12:10:30',
                'updated_at' => '2020-02-11 12:10:30',
                'function_name' => 'update',
            ),
            187 => 
            array (
                'id' => 255,
                'method' => 'get',
                'route' => 'property_value/{id}/delete',
                'controller_name' => 'PropertyValueController',
                'created_at' => '2020-02-11 12:10:30',
                'updated_at' => '2020-02-11 12:10:30',
                'function_name' => 'destroy',
            ),
            188 => 
            array (
                'id' => 256,
                'method' => 'get',
                'route' => 'users/{id}/delete',
                'controller_name' => 'UserController',
                'created_at' => '2020-02-18 14:02:36',
                'updated_at' => '2020-02-18 14:02:36',
                'function_name' => 'destroy',
            ),
        ));
        
        
    }
}