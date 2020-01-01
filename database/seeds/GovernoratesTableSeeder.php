<?php

use Illuminate\Database\Seeder;

class GovernoratesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('governorates')->delete();
        
        \DB::table('governorates')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title_en' => 'Cairo',
                'title_ar' => 'القاهرة',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'title_en' => 'Giza',
                'title_ar' => 'الجيزة',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'title_en' => 'Alexandria',
                'title_ar' => 'الأسكندرية',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'title_en' => 'Dakahlia',
                'title_ar' => 'الدقهلية',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'title_en' => 'Red Sea',
                'title_ar' => 'البحر الأحمر',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'title_en' => 'Beheira',
                'title_ar' => 'البحيرة',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'title_en' => 'Fayoum',
                'title_ar' => 'الفيوم',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'title_en' => 'Gharbiya',
                'title_ar' => 'الغربية',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'title_en' => 'Ismailia',
                'title_ar' => 'الإسماعلية',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'title_en' => 'Monofia',
                'title_ar' => 'المنوفية',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'title_en' => 'Minya',
                'title_ar' => 'المنيا',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'title_en' => 'Qaliubiya',
                'title_ar' => 'القليوبية',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'title_en' => 'New Valley',
                'title_ar' => 'الوادي الجديد',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'title_en' => 'Suez',
                'title_ar' => 'السويس',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'title_en' => 'Aswan',
                'title_ar' => 'اسوان',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'title_en' => 'Assiut',
                'title_ar' => 'اسيوط',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'title_en' => 'Beni Suef',
                'title_ar' => 'بني سويف',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'title_en' => 'Port Said',
                'title_ar' => 'بورسعيد',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'title_en' => 'Damietta',
                'title_ar' => 'دمياط',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'title_en' => 'Sharkia',
                'title_ar' => 'الشرقية',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'title_en' => 'South Sinai',
                'title_ar' => 'جنوب سيناء',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'title_en' => 'Kafr Al sheikh',
                'title_ar' => 'كفر الشيخ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'title_en' => 'Matrouh',
                'title_ar' => 'مطروح',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'title_en' => 'Luxor',
                'title_ar' => 'الأقصر',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'title_en' => 'Qena',
                'title_ar' => 'قنا',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'title_en' => 'North Sinai',
                'title_ar' => 'شمال سيناء',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 28,
                'title_en' => 'Sohag',
                'title_ar' => 'سوهاج',
                'created_at' => '2019-09-23 13:16:32',
                'updated_at' => '2019-09-23 13:16:32',
            ),
        ));
        
        
    }
}