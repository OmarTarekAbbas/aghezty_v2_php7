<?php

use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cities')->delete();
        
        \DB::table('cities')->insert(array (
            0 => 
            array (
                'id' => 1,
                'city_en' => 'Cairo',
                'city_ar' => 'القاهره',
                'shipping_amount' => '50.00',
                'governorate_id' => 1,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'city_en' => 'Giza',
                'city_ar' => 'الجيزة',
                'shipping_amount' => '50.00',
                'governorate_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'city_en' => 'Sixth of October',
                'city_ar' => 'السادس من أكتوبر',
                'shipping_amount' => '50.00',
                'governorate_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'city_en' => 'Cheikh Zayed',
                'city_ar' => 'الشيخ زايد
',
                'shipping_amount' => '50.00',
                'governorate_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'city_en' => 'Hawamdiyah',
                'city_ar' => 'الحوامدية',
                'shipping_amount' => '50.00',
                'governorate_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'city_en' => 'Al Badrasheen',
                'city_ar' => 'البدرشين',
                'shipping_amount' => '50.00',
                'governorate_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'city_en' => 'Saf',
                'city_ar' => 'الصف',
                'shipping_amount' => '50.00',
                'governorate_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'city_en' => 'Atfih',
                'city_ar' => 'أطفيح',
                'shipping_amount' => '50.00',
                'governorate_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'city_en' => 'Al Ayat',
                'city_ar' => 'العياط',
                'shipping_amount' => '50.00',
                'governorate_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'city_en' => 'Al-Bawaiti',
                'city_ar' => 'الباويطي',
                'shipping_amount' => '50.00',
                'governorate_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'city_en' => 'ManshiyetAl Qanater',
                'city_ar' => 'منشأة القناطر',
                'shipping_amount' => '50.00',
                'governorate_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'city_en' => 'Oaseem',
                'city_ar' => 'أوسيم',
                'shipping_amount' => '50.00',
                'governorate_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'city_en' => 'Kerdasa',
                'city_ar' => 'كرداسة',
                'shipping_amount' => '50.00',
                'governorate_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'city_en' => 'Abu Nomros',
                'city_ar' => 'أبو النمرس',
                'shipping_amount' => '50.00',
                'governorate_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'city_en' => 'Kafr Ghati',
                'city_ar' => 'كفر غطاطي',
                'shipping_amount' => '50.00',
                'governorate_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'city_en' => 'Manshiyet Al Bakari',
                'city_ar' => 'منشأة البكاري',
                'shipping_amount' => '50.00',
                'governorate_id' => 2,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'city_en' => 'Alexandria',
                'city_ar' => 'الأسكندرية',
                'shipping_amount' => '50.00',
                'governorate_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'city_en' => 'Burj Al Arab',
                'city_ar' => 'برج العرب',
                'shipping_amount' => '50.00',
                'governorate_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'city_en' => 'New Burj Al Arab',
                'city_ar' => 'برج العرب الجديدة',
                'shipping_amount' => '50.00',
                'governorate_id' => 3,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'city_en' => 'Banha',
                'city_ar' => 'بنها',
                'shipping_amount' => '50.00',
                'governorate_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'city_en' => 'Qalyub',
                'city_ar' => 'قليوب',
                'shipping_amount' => '50.00',
                'governorate_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'city_en' => 'Shubra Al Khaimah',
                'city_ar' => 'شبرا الخيمة',
                'shipping_amount' => '50.00',
                'governorate_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'city_en' => 'Al Qanater Charity',
                'city_ar' => 'القناطر الخيرية',
                'shipping_amount' => '50.00',
                'governorate_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'city_en' => 'Khanka',
                'city_ar' => 'الخانكة',
                'shipping_amount' => '50.00',
                'governorate_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'city_en' => 'Kafr Shukr',
                'city_ar' => 'كفر شكر',
                'shipping_amount' => '50.00',
                'governorate_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'city_en' => 'Tukh',
                'city_ar' => 'طوخ',
                'shipping_amount' => '50.00',
                'governorate_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'city_en' => 'Qaha',
                'city_ar' => 'قها',
                'shipping_amount' => '50.00',
                'governorate_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'city_en' => 'Obour',
                'city_ar' => 'العبور',
                'shipping_amount' => '50.00',
                'governorate_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'city_en' => 'Khosous',
                'city_ar' => 'الخصوص',
                'shipping_amount' => '50.00',
                'governorate_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'city_en' => 'Shibin Al Qanater',
                'city_ar' => 'شبين القناطر',
                'shipping_amount' => '50.00',
                'governorate_id' => 12,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'city_en' => 'Damanhour',
                'city_ar' => 'دمنهور',
                'shipping_amount' => '50.00',
                'governorate_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'city_en' => 'Kafr El Dawar',
                'city_ar' => 'كفر الدوار',
                'shipping_amount' => '50.00',
                'governorate_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 => 
            array (
                'id' => 33,
                'city_en' => 'Rashid',
                'city_ar' => 'رشيد',
                'shipping_amount' => '50.00',
                'governorate_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 => 
            array (
                'id' => 34,
                'city_en' => 'Edco',
                'city_ar' => 'إدكو',
                'shipping_amount' => '50.00',
                'governorate_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 => 
            array (
                'id' => 35,
                'city_en' => 'Abu al-Matamir',
                'city_ar' => 'أبو المطامير',
                'shipping_amount' => '50.00',
                'governorate_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 => 
            array (
                'id' => 36,
                'city_en' => 'Abu Homs',
                'city_ar' => 'أبو حمص',
                'shipping_amount' => '50.00',
                'governorate_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 => 
            array (
                'id' => 37,
                'city_en' => 'Delengat',
                'city_ar' => 'الدلنجات',
                'shipping_amount' => '50.00',
                'governorate_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 => 
            array (
                'id' => 38,
                'city_en' => 'Mahmoudiyah',
                'city_ar' => 'المحمودية',
                'shipping_amount' => '50.00',
                'governorate_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 => 
            array (
                'id' => 39,
                'city_en' => 'Rahmaniyah',
                'city_ar' => 'الرحمانية',
                'shipping_amount' => '50.00',
                'governorate_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 => 
            array (
                'id' => 40,
                'city_en' => 'Itai Baroud',
                'city_ar' => 'إيتاي البارود',
                'shipping_amount' => '50.00',
                'governorate_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 => 
            array (
                'id' => 41,
                'city_en' => 'Housh Eissa',
                'city_ar' => 'حوش عيسى',
                'shipping_amount' => '50.00',
                'governorate_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 => 
            array (
                'id' => 42,
                'city_en' => 'Shubrakhit',
                'city_ar' => 'شبراخيت',
                'shipping_amount' => '50.00',
                'governorate_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 => 
            array (
                'id' => 43,
                'city_en' => 'Kom Hamada',
                'city_ar' => 'كوم حمادة',
                'shipping_amount' => '50.00',
                'governorate_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 => 
            array (
                'id' => 44,
                'city_en' => 'Badr',
                'city_ar' => 'بدر',
                'shipping_amount' => '50.00',
                'governorate_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 => 
            array (
                'id' => 45,
                'city_en' => 'Wadi Natrun',
                'city_ar' => 'وادي النطرون',
                'shipping_amount' => '50.00',
                'governorate_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 => 
            array (
                'id' => 46,
                'city_en' => 'New Nubaria',
                'city_ar' => 'النوبارية الجديدة',
                'shipping_amount' => '50.00',
                'governorate_id' => 6,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 => 
            array (
                'id' => 47,
                'city_en' => 'Marsa Matrouh',
                'city_ar' => 'مرسى مطروح',
                'shipping_amount' => '50.00',
                'governorate_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 => 
            array (
                'id' => 48,
                'city_en' => 'El Hamam',
                'city_ar' => 'الحمام',
                'shipping_amount' => '50.00',
                'governorate_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 => 
            array (
                'id' => 49,
                'city_en' => 'Alamein',
                'city_ar' => 'العلمين',
                'shipping_amount' => '50.00',
                'governorate_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 => 
            array (
                'id' => 50,
                'city_en' => 'Dabaa',
                'city_ar' => 'الضبعة',
                'shipping_amount' => '50.00',
                'governorate_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 => 
            array (
                'id' => 51,
                'city_en' => 'Al-Nagila',
                'city_ar' => 'النجيلة',
                'shipping_amount' => '50.00',
                'governorate_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 => 
            array (
                'id' => 52,
                'city_en' => 'Sidi Brani',
                'city_ar' => 'سيدي براني',
                'shipping_amount' => '50.00',
                'governorate_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 => 
            array (
                'id' => 53,
                'city_en' => 'Salloum',
                'city_ar' => 'السلوم',
                'shipping_amount' => '50.00',
                'governorate_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 => 
            array (
                'id' => 54,
                'city_en' => 'Siwa',
                'city_ar' => 'سيوة',
                'shipping_amount' => '50.00',
                'governorate_id' => 23,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 => 
            array (
                'id' => 55,
                'city_en' => 'Damietta',
                'city_ar' => 'دمياط',
                'shipping_amount' => '50.00',
                'governorate_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 => 
            array (
                'id' => 56,
                'city_en' => 'New Damietta',
                'city_ar' => 'دمياط الجديدة',
                'shipping_amount' => '50.00',
                'governorate_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 => 
            array (
                'id' => 57,
                'city_en' => 'Ras El Bar',
                'city_ar' => 'رأس البر',
                'shipping_amount' => '50.00',
                'governorate_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 => 
            array (
                'id' => 58,
                'city_en' => 'Faraskour',
                'city_ar' => 'فارسكور',
                'shipping_amount' => '50.00',
                'governorate_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 => 
            array (
                'id' => 59,
                'city_en' => 'Zarqa',
                'city_ar' => 'الزرقا',
                'shipping_amount' => '50.00',
                'governorate_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 => 
            array (
                'id' => 60,
                'city_en' => 'alsaru',
                'city_ar' => 'السرو',
                'shipping_amount' => '50.00',
                'governorate_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 => 
            array (
                'id' => 61,
                'city_en' => 'alruwda',
                'city_ar' => 'الروضة',
                'shipping_amount' => '50.00',
                'governorate_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 => 
            array (
                'id' => 62,
                'city_en' => 'Kafr El-Batikh',
                'city_ar' => 'كفر البطيخ',
                'shipping_amount' => '50.00',
                'governorate_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 => 
            array (
                'id' => 63,
                'city_en' => 'Azbet Al Burg',
                'city_ar' => 'عزبة البرج',
                'shipping_amount' => '50.00',
                'governorate_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 => 
            array (
                'id' => 64,
                'city_en' => 'Meet Abou Ghalib',
                'city_ar' => 'ميت أبو غالب',
                'shipping_amount' => '50.00',
                'governorate_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 => 
            array (
                'id' => 65,
                'city_en' => 'Kafr Saad',
                'city_ar' => 'كفر سعد',
                'shipping_amount' => '50.00',
                'governorate_id' => 19,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 => 
            array (
                'id' => 66,
                'city_en' => 'Mansoura',
                'city_ar' => 'المنصورة',
                'shipping_amount' => '50.00',
                'governorate_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 => 
            array (
                'id' => 67,
                'city_en' => 'Talkha',
                'city_ar' => 'طلخا',
                'shipping_amount' => '50.00',
                'governorate_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 => 
            array (
                'id' => 68,
                'city_en' => 'Mitt Ghamr',
                'city_ar' => 'ميت غمر',
                'shipping_amount' => '50.00',
                'governorate_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 => 
            array (
                'id' => 69,
                'city_en' => 'Dekernes',
                'city_ar' => 'دكرنس',
                'shipping_amount' => '50.00',
                'governorate_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 => 
            array (
                'id' => 70,
                'city_en' => 'Aga',
                'city_ar' => 'أجا',
                'shipping_amount' => '50.00',
                'governorate_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 => 
            array (
                'id' => 71,
                'city_en' => 'Menia El Nasr',
                'city_ar' => 'منية النصر',
                'shipping_amount' => '50.00',
                'governorate_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 => 
            array (
                'id' => 72,
                'city_en' => 'Sinbillawin',
                'city_ar' => 'السنبلاوين',
                'shipping_amount' => '50.00',
                'governorate_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 => 
            array (
                'id' => 73,
                'city_en' => 'El Kurdi',
                'city_ar' => 'الكردي',
                'shipping_amount' => '50.00',
                'governorate_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 => 
            array (
                'id' => 74,
                'city_en' => 'Bani Ubaid',
                'city_ar' => 'بني عبيد',
                'shipping_amount' => '50.00',
                'governorate_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 => 
            array (
                'id' => 75,
                'city_en' => 'Al Manzala',
                'city_ar' => 'المنزلة',
                'shipping_amount' => '50.00',
                'governorate_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 => 
            array (
                'id' => 76,
                'city_en' => 'tami al\'amdid',
                'city_ar' => 'تمي الأمديد',
                'shipping_amount' => '50.00',
                'governorate_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 => 
            array (
                'id' => 77,
                'city_en' => 'aljamalia',
                'city_ar' => 'الجمالية',
                'shipping_amount' => '50.00',
                'governorate_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 => 
            array (
                'id' => 78,
                'city_en' => 'Sherbin',
                'city_ar' => 'شربين',
                'shipping_amount' => '50.00',
                'governorate_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 => 
            array (
                'id' => 79,
                'city_en' => 'Mataria',
                'city_ar' => 'المطرية',
                'shipping_amount' => '50.00',
                'governorate_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 => 
            array (
                'id' => 80,
                'city_en' => 'Belqas',
                'city_ar' => 'بلقاس',
                'shipping_amount' => '50.00',
                'governorate_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 => 
            array (
                'id' => 81,
                'city_en' => 'Meet Salsil',
                'city_ar' => 'ميت سلسيل',
                'shipping_amount' => '50.00',
                'governorate_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 => 
            array (
                'id' => 82,
                'city_en' => 'Gamasa',
                'city_ar' => 'جمصة',
                'shipping_amount' => '50.00',
                'governorate_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 => 
            array (
                'id' => 83,
                'city_en' => 'Mahalat Damana',
                'city_ar' => 'محلة دمنة',
                'shipping_amount' => '50.00',
                'governorate_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 => 
            array (
                'id' => 84,
                'city_en' => 'Nabroh',
                'city_ar' => 'نبروه',
                'shipping_amount' => '50.00',
                'governorate_id' => 4,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 => 
            array (
                'id' => 85,
                'city_en' => 'Kafr El Sheikh',
                'city_ar' => 'كفر الشيخ',
                'shipping_amount' => '50.00',
                'governorate_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 => 
            array (
                'id' => 86,
                'city_en' => 'Desouq',
                'city_ar' => 'دسوق',
                'shipping_amount' => '50.00',
                'governorate_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 => 
            array (
                'id' => 87,
                'city_en' => 'Fooh',
                'city_ar' => 'فوه',
                'shipping_amount' => '50.00',
                'governorate_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 => 
            array (
                'id' => 88,
                'city_en' => 'Metobas',
                'city_ar' => 'مطوبس',
                'shipping_amount' => '50.00',
                'governorate_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 => 
            array (
                'id' => 89,
                'city_en' => 'Burg Al Burullus',
                'city_ar' => 'برج البرلس',
                'shipping_amount' => '50.00',
                'governorate_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 => 
            array (
                'id' => 90,
                'city_en' => 'Baltim',
                'city_ar' => 'بلطيم',
                'shipping_amount' => '50.00',
                'governorate_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 => 
            array (
                'id' => 91,
                'city_en' => 'Masief Baltim',
                'city_ar' => 'مصيف بلطيم',
                'shipping_amount' => '50.00',
                'governorate_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 => 
            array (
                'id' => 92,
                'city_en' => 'Hamol',
                'city_ar' => 'الحامول',
                'shipping_amount' => '50.00',
                'governorate_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 => 
            array (
                'id' => 93,
                'city_en' => 'Bella',
                'city_ar' => 'بيلا',
                'shipping_amount' => '50.00',
                'governorate_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 => 
            array (
                'id' => 94,
                'city_en' => 'Riyadh',
                'city_ar' => 'الرياض',
                'shipping_amount' => '50.00',
                'governorate_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 => 
            array (
                'id' => 95,
                'city_en' => 'Sidi Salm',
                'city_ar' => 'سيدي سالم',
                'shipping_amount' => '50.00',
                'governorate_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 => 
            array (
                'id' => 96,
                'city_en' => 'Qellen',
                'city_ar' => 'قلين',
                'shipping_amount' => '50.00',
                'governorate_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 => 
            array (
                'id' => 97,
                'city_en' => 'Sidi Ghazi',
                'city_ar' => 'سيدي غازي',
                'shipping_amount' => '50.00',
                'governorate_id' => 22,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 => 
            array (
                'id' => 98,
                'city_en' => 'Tanta',
                'city_ar' => 'طنطا',
                'shipping_amount' => '50.00',
                'governorate_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 => 
            array (
                'id' => 99,
                'city_en' => 'Al Mahalla Al Kobra',
                'city_ar' => 'المحلة الكبرى',
                'shipping_amount' => '50.00',
                'governorate_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 => 
            array (
                'id' => 100,
                'city_en' => 'Kafr El Zayat',
                'city_ar' => 'كفر الزيات',
                'shipping_amount' => '50.00',
                'governorate_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            100 => 
            array (
                'id' => 101,
                'city_en' => 'Zefta',
                'city_ar' => 'زفتى',
                'shipping_amount' => '50.00',
                'governorate_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            101 => 
            array (
                'id' => 102,
                'city_en' => 'El Santa',
                'city_ar' => 'السنطة',
                'shipping_amount' => '50.00',
                'governorate_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            102 => 
            array (
                'id' => 103,
                'city_en' => 'Qutour',
                'city_ar' => 'قطور',
                'shipping_amount' => '50.00',
                'governorate_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            103 => 
            array (
                'id' => 104,
                'city_en' => 'Basion',
                'city_ar' => 'بسيون',
                'shipping_amount' => '50.00',
                'governorate_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            104 => 
            array (
                'id' => 105,
                'city_en' => 'Samannoud',
                'city_ar' => 'سمنود',
                'shipping_amount' => '50.00',
                'governorate_id' => 8,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            105 => 
            array (
                'id' => 106,
                'city_en' => 'Shbeen El Koom',
                'city_ar' => 'شبين الكوم',
                'shipping_amount' => '50.00',
                'governorate_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            106 => 
            array (
                'id' => 107,
                'city_en' => 'Sadat City',
                'city_ar' => 'مدينة السادات',
                'shipping_amount' => '50.00',
                'governorate_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            107 => 
            array (
                'id' => 108,
                'city_en' => 'Menouf',
                'city_ar' => 'منوف',
                'shipping_amount' => '50.00',
                'governorate_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            108 => 
            array (
                'id' => 109,
                'city_en' => 'Sars El-Layan',
                'city_ar' => 'سرس الليان',
                'shipping_amount' => '50.00',
                'governorate_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            109 => 
            array (
                'id' => 110,
                'city_en' => 'Ashmon',
                'city_ar' => 'أشمون',
                'shipping_amount' => '50.00',
                'governorate_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            110 => 
            array (
                'id' => 111,
                'city_en' => 'Al Bagor',
                'city_ar' => 'الباجور',
                'shipping_amount' => '50.00',
                'governorate_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            111 => 
            array (
                'id' => 112,
                'city_en' => 'Quesna',
                'city_ar' => 'قويسنا',
                'shipping_amount' => '50.00',
                'governorate_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            112 => 
            array (
                'id' => 113,
                'city_en' => 'Berkat El Saba',
                'city_ar' => 'بركة السبع',
                'shipping_amount' => '50.00',
                'governorate_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            113 => 
            array (
                'id' => 114,
                'city_en' => 'Tala',
                'city_ar' => 'تلا',
                'shipping_amount' => '50.00',
                'governorate_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            114 => 
            array (
                'id' => 115,
                'city_en' => 'Al Shohada',
                'city_ar' => 'الشهداء',
                'shipping_amount' => '50.00',
                'governorate_id' => 10,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            115 => 
            array (
                'id' => 116,
                'city_en' => 'Zagazig',
                'city_ar' => 'الزقازيق',
                'shipping_amount' => '50.00',
                'governorate_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            116 => 
            array (
                'id' => 117,
                'city_en' => 'Al Ashr Men Ramadan',
                'city_ar' => 'العاشر من رمضان',
                'shipping_amount' => '50.00',
                'governorate_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            117 => 
            array (
                'id' => 118,
                'city_en' => 'Minya Al Qamh',
                'city_ar' => 'منيا القمح',
                'shipping_amount' => '50.00',
                'governorate_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            118 => 
            array (
                'id' => 119,
                'city_en' => 'Belbeis',
                'city_ar' => 'بلبيس',
                'shipping_amount' => '50.00',
                'governorate_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            119 => 
            array (
                'id' => 120,
                'city_en' => 'Mashtoul El Souq',
                'city_ar' => 'مشتول السوق',
                'shipping_amount' => '50.00',
                'governorate_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            120 => 
            array (
                'id' => 121,
                'city_en' => 'Qenaiat',
                'city_ar' => 'القنايات',
                'shipping_amount' => '50.00',
                'governorate_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            121 => 
            array (
                'id' => 122,
                'city_en' => 'Abu Hammad',
                'city_ar' => 'أبو حماد',
                'shipping_amount' => '50.00',
                'governorate_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            122 => 
            array (
                'id' => 123,
                'city_en' => 'El Qurain',
                'city_ar' => 'القرين',
                'shipping_amount' => '50.00',
                'governorate_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            123 => 
            array (
                'id' => 124,
                'city_en' => 'Hehia',
                'city_ar' => 'ههيا',
                'shipping_amount' => '50.00',
                'governorate_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            124 => 
            array (
                'id' => 125,
                'city_en' => 'Abu Kabir',
                'city_ar' => 'أبو كبير',
                'shipping_amount' => '50.00',
                'governorate_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            125 => 
            array (
                'id' => 126,
                'city_en' => 'Faccus',
                'city_ar' => 'فاقوس',
                'shipping_amount' => '50.00',
                'governorate_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            126 => 
            array (
                'id' => 127,
                'city_en' => 'El Salihia El Gedida',
                'city_ar' => 'الصالحية الجديدة',
                'shipping_amount' => '50.00',
                'governorate_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            127 => 
            array (
                'id' => 128,
                'city_en' => 'Al Ibrahimiyah',
                'city_ar' => 'الإبراهيمية',
                'shipping_amount' => '50.00',
                'governorate_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            128 => 
            array (
                'id' => 129,
                'city_en' => 'Deirb Negm',
                'city_ar' => 'ديرب نجم',
                'shipping_amount' => '50.00',
                'governorate_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            129 => 
            array (
                'id' => 130,
                'city_en' => 'Kafr Saqr',
                'city_ar' => 'كفر صقر',
                'shipping_amount' => '50.00',
                'governorate_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            130 => 
            array (
                'id' => 131,
                'city_en' => 'Awlad Saqr',
                'city_ar' => 'أولاد صقر',
                'shipping_amount' => '50.00',
                'governorate_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            131 => 
            array (
                'id' => 132,
                'city_en' => 'Husseiniya',
                'city_ar' => 'الحسينية',
                'shipping_amount' => '50.00',
                'governorate_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            132 => 
            array (
                'id' => 133,
                'city_en' => 'san alhajar alqablia',
                'city_ar' => 'صان الحجر القبلية',
                'shipping_amount' => '50.00',
                'governorate_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            133 => 
            array (
                'id' => 134,
                'city_en' => 'Manshayat Abu Omar',
                'city_ar' => 'منشأة أبو عمر',
                'shipping_amount' => '50.00',
                'governorate_id' => 20,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            134 => 
            array (
                'id' => 135,
                'city_en' => 'PorSaid',
                'city_ar' => 'بورسعيد',
                'shipping_amount' => '50.00',
                'governorate_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            135 => 
            array (
                'id' => 136,
                'city_en' => 'PorFouad',
                'city_ar' => 'بورفؤاد',
                'shipping_amount' => '50.00',
                'governorate_id' => 18,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            136 => 
            array (
                'id' => 137,
                'city_en' => 'Ismailia',
                'city_ar' => 'الإسماعيلية',
                'shipping_amount' => '50.00',
                'governorate_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            137 => 
            array (
                'id' => 138,
                'city_en' => 'Fayed',
                'city_ar' => 'فايد',
                'shipping_amount' => '50.00',
                'governorate_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            138 => 
            array (
                'id' => 139,
                'city_en' => 'Qantara Sharq',
                'city_ar' => 'القنطرة شرق',
                'shipping_amount' => '50.00',
                'governorate_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            139 => 
            array (
                'id' => 140,
                'city_en' => 'Qantara Gharb',
                'city_ar' => 'القنطرة غرب',
                'shipping_amount' => '50.00',
                'governorate_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            140 => 
            array (
                'id' => 141,
                'city_en' => 'El Tal El Kabier',
                'city_ar' => 'التل الكبير',
                'shipping_amount' => '50.00',
                'governorate_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            141 => 
            array (
                'id' => 142,
                'city_en' => 'Abu Sawir',
                'city_ar' => 'أبو صوير',
                'shipping_amount' => '50.00',
                'governorate_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            142 => 
            array (
                'id' => 143,
                'city_en' => 'Kasasien El Gedida',
                'city_ar' => 'القصاصين الجديدة',
                'shipping_amount' => '50.00',
                'governorate_id' => 9,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            143 => 
            array (
                'id' => 144,
                'city_en' => 'Suez',
                'city_ar' => 'السويس',
                'shipping_amount' => '50.00',
                'governorate_id' => 14,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            144 => 
            array (
                'id' => 145,
                'city_en' => 'Arish',
                'city_ar' => 'العريش',
                'shipping_amount' => '50.00',
                'governorate_id' => 26,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            145 => 
            array (
                'id' => 146,
                'city_en' => 'Sheikh Zowaid',
                'city_ar' => 'الشيخ زويد',
                'shipping_amount' => '50.00',
                'governorate_id' => 26,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            146 => 
            array (
                'id' => 147,
                'city_en' => 'Nakhl',
                'city_ar' => 'نخل',
                'shipping_amount' => '50.00',
                'governorate_id' => 26,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            147 => 
            array (
                'id' => 148,
                'city_en' => 'Rafah',
                'city_ar' => 'رفح',
                'shipping_amount' => '50.00',
                'governorate_id' => 26,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            148 => 
            array (
                'id' => 149,
                'city_en' => 'Bir al-Abed',
                'city_ar' => 'بئر العبد',
                'shipping_amount' => '50.00',
                'governorate_id' => 26,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            149 => 
            array (
                'id' => 150,
                'city_en' => 'Al Hasana',
                'city_ar' => 'الحسنة',
                'shipping_amount' => '50.00',
                'governorate_id' => 26,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            150 => 
            array (
                'id' => 151,
                'city_en' => 'Al Toor',
                'city_ar' => 'الطور',
                'shipping_amount' => '50.00',
                'governorate_id' => 21,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            151 => 
            array (
                'id' => 152,
                'city_en' => 'Sharm El-Shaikh',
                'city_ar' => 'شرم الشيخ',
                'shipping_amount' => '50.00',
                'governorate_id' => 21,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            152 => 
            array (
                'id' => 153,
                'city_en' => 'Dahab',
                'city_ar' => 'دهب',
                'shipping_amount' => '50.00',
                'governorate_id' => 21,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            153 => 
            array (
                'id' => 154,
                'city_en' => 'Nuweiba',
                'city_ar' => 'نويبع',
                'shipping_amount' => '50.00',
                'governorate_id' => 21,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            154 => 
            array (
                'id' => 155,
                'city_en' => 'Taba',
                'city_ar' => 'طابا',
                'shipping_amount' => '50.00',
                'governorate_id' => 21,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            155 => 
            array (
                'id' => 156,
                'city_en' => 'Saint Catherine',
                'city_ar' => 'سانت كاترين',
                'shipping_amount' => '50.00',
                'governorate_id' => 21,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            156 => 
            array (
                'id' => 157,
                'city_en' => 'Abu Redis',
                'city_ar' => 'أبو رديس',
                'shipping_amount' => '50.00',
                'governorate_id' => 21,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            157 => 
            array (
                'id' => 158,
                'city_en' => 'Abu Zenaima',
                'city_ar' => 'أبو زنيمة',
                'shipping_amount' => '50.00',
                'governorate_id' => 21,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            158 => 
            array (
                'id' => 159,
                'city_en' => 'Ras Sidr',
                'city_ar' => 'رأس سدر',
                'shipping_amount' => '50.00',
                'governorate_id' => 21,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            159 => 
            array (
                'id' => 160,
                'city_en' => 'Bani Sweif',
                'city_ar' => 'بني سويف',
                'shipping_amount' => '50.00',
                'governorate_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            160 => 
            array (
                'id' => 161,
                'city_en' => 'Beni Suef El Gedida',
                'city_ar' => 'بني سويف الجديدة',
                'shipping_amount' => '50.00',
                'governorate_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            161 => 
            array (
                'id' => 162,
                'city_en' => 'Al Wasta',
                'city_ar' => 'الواسطى',
                'shipping_amount' => '50.00',
                'governorate_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            162 => 
            array (
                'id' => 163,
                'city_en' => 'Naser',
                'city_ar' => 'ناصر',
                'shipping_amount' => '50.00',
                'governorate_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            163 => 
            array (
                'id' => 164,
                'city_en' => 'Ehnasia',
                'city_ar' => 'إهناسيا',
                'shipping_amount' => '50.00',
                'governorate_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            164 => 
            array (
                'id' => 165,
                'city_en' => 'beba',
                'city_ar' => 'ببا',
                'shipping_amount' => '50.00',
                'governorate_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            165 => 
            array (
                'id' => 166,
                'city_en' => 'Fashn',
                'city_ar' => 'الفشن',
                'shipping_amount' => '50.00',
                'governorate_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            166 => 
            array (
                'id' => 167,
                'city_en' => 'Somasta',
                'city_ar' => 'سمسطا',
                'shipping_amount' => '50.00',
                'governorate_id' => 17,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            167 => 
            array (
                'id' => 168,
                'city_en' => 'Fayoum',
                'city_ar' => 'الفيوم',
                'shipping_amount' => '50.00',
                'governorate_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            168 => 
            array (
                'id' => 169,
                'city_en' => 'Fayoum El Gedida',
                'city_ar' => 'الفيوم الجديدة',
                'shipping_amount' => '50.00',
                'governorate_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            169 => 
            array (
                'id' => 170,
                'city_en' => 'Tamiya',
                'city_ar' => 'طامية',
                'shipping_amount' => '50.00',
                'governorate_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            170 => 
            array (
                'id' => 171,
                'city_en' => 'Snores',
                'city_ar' => 'سنورس',
                'shipping_amount' => '50.00',
                'governorate_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            171 => 
            array (
                'id' => 172,
                'city_en' => 'Etsa',
                'city_ar' => 'إطسا',
                'shipping_amount' => '50.00',
                'governorate_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            172 => 
            array (
                'id' => 173,
                'city_en' => 'Epschway',
                'city_ar' => 'إبشواي',
                'shipping_amount' => '50.00',
                'governorate_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            173 => 
            array (
                'id' => 174,
                'city_en' => 'Yusuf El Sediaq',
                'city_ar' => 'يوسف الصديق',
                'shipping_amount' => '50.00',
                'governorate_id' => 7,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            174 => 
            array (
                'id' => 175,
                'city_en' => 'Minya',
                'city_ar' => 'المنيا',
                'shipping_amount' => '50.00',
                'governorate_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            175 => 
            array (
                'id' => 176,
                'city_en' => 'Minya El Gedida',
                'city_ar' => 'المنيا الجديدة',
                'shipping_amount' => '50.00',
                'governorate_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            176 => 
            array (
                'id' => 177,
                'city_en' => 'El Adwa',
                'city_ar' => 'العدوة',
                'shipping_amount' => '50.00',
                'governorate_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            177 => 
            array (
                'id' => 178,
                'city_en' => 'Magagha',
                'city_ar' => 'مغاغة',
                'shipping_amount' => '50.00',
                'governorate_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            178 => 
            array (
                'id' => 179,
                'city_en' => 'Bani Mazar',
                'city_ar' => 'بني مزار',
                'shipping_amount' => '50.00',
                'governorate_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            179 => 
            array (
                'id' => 180,
                'city_en' => 'Mattay',
                'city_ar' => 'مطاي',
                'shipping_amount' => '50.00',
                'governorate_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            180 => 
            array (
                'id' => 181,
                'city_en' => 'Samalut',
                'city_ar' => 'سمالوط',
                'shipping_amount' => '50.00',
                'governorate_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            181 => 
            array (
                'id' => 182,
                'city_en' => 'Madinat El Fekria',
                'city_ar' => 'المدينة الفكرية',
                'shipping_amount' => '50.00',
                'governorate_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            182 => 
            array (
                'id' => 183,
                'city_en' => 'Meloy',
                'city_ar' => 'ملوي',
                'shipping_amount' => '50.00',
                'governorate_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            183 => 
            array (
                'id' => 184,
                'city_en' => 'Deir Mawas',
                'city_ar' => 'دير مواس',
                'shipping_amount' => '50.00',
                'governorate_id' => 11,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            184 => 
            array (
                'id' => 185,
                'city_en' => 'Assiut',
                'city_ar' => 'أسيوط',
                'shipping_amount' => '50.00',
                'governorate_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            185 => 
            array (
                'id' => 186,
                'city_en' => 'Assiut El Gedida',
                'city_ar' => 'أسيوط الجديدة',
                'shipping_amount' => '50.00',
                'governorate_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            186 => 
            array (
                'id' => 187,
                'city_en' => 'Dayrout',
                'city_ar' => 'ديروط',
                'shipping_amount' => '50.00',
                'governorate_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            187 => 
            array (
                'id' => 188,
                'city_en' => 'Manfalut',
                'city_ar' => 'منفلوط',
                'shipping_amount' => '50.00',
                'governorate_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            188 => 
            array (
                'id' => 189,
                'city_en' => 'Qusiya',
                'city_ar' => 'القوصية',
                'shipping_amount' => '50.00',
                'governorate_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            189 => 
            array (
                'id' => 190,
                'city_en' => 'Abnoub',
                'city_ar' => 'أبنوب',
                'shipping_amount' => '50.00',
                'governorate_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            190 => 
            array (
                'id' => 191,
                'city_en' => 'Abu Tig',
                'city_ar' => 'أبو تيج',
                'shipping_amount' => '50.00',
                'governorate_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            191 => 
            array (
                'id' => 192,
                'city_en' => 'El Ghanaim',
                'city_ar' => 'الغنايم',
                'shipping_amount' => '50.00',
                'governorate_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            192 => 
            array (
                'id' => 193,
                'city_en' => 'Sahel Selim',
                'city_ar' => 'ساحل سليم',
                'shipping_amount' => '50.00',
                'governorate_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            193 => 
            array (
                'id' => 194,
                'city_en' => 'El Badari',
                'city_ar' => 'البداري',
                'shipping_amount' => '50.00',
                'governorate_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            194 => 
            array (
                'id' => 195,
                'city_en' => 'Sidfa',
                'city_ar' => 'صدفا',
                'shipping_amount' => '50.00',
                'governorate_id' => 16,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            195 => 
            array (
                'id' => 196,
                'city_en' => 'El Kharga',
                'city_ar' => 'الخارجة',
                'shipping_amount' => '50.00',
                'governorate_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            196 => 
            array (
                'id' => 197,
                'city_en' => 'Paris',
                'city_ar' => 'باريس',
                'shipping_amount' => '50.00',
                'governorate_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            197 => 
            array (
                'id' => 198,
                'city_en' => 'Mout',
                'city_ar' => 'موط',
                'shipping_amount' => '50.00',
                'governorate_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            198 => 
            array (
                'id' => 199,
                'city_en' => 'Farafra',
                'city_ar' => 'الفرافرة',
                'shipping_amount' => '50.00',
                'governorate_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            199 => 
            array (
                'id' => 200,
                'city_en' => 'Balat',
                'city_ar' => 'بلاط',
                'shipping_amount' => '50.00',
                'governorate_id' => 13,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            200 => 
            array (
                'id' => 201,
                'city_en' => 'Hurghada',
                'city_ar' => 'الغردقة',
                'shipping_amount' => '50.00',
                'governorate_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            201 => 
            array (
                'id' => 202,
                'city_en' => 'Ras Ghareb',
                'city_ar' => 'رأس غارب',
                'shipping_amount' => '50.00',
                'governorate_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            202 => 
            array (
                'id' => 203,
                'city_en' => 'Safaga',
                'city_ar' => 'سفاجا',
                'shipping_amount' => '60.00',
                'governorate_id' => 5,
                'created_at' => NULL,
                'updated_at' => '2019-09-23 14:05:52',
            ),
            203 => 
            array (
                'id' => 204,
                'city_en' => 'El Qusiar',
                'city_ar' => 'القصير',
                'shipping_amount' => '50.00',
                'governorate_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            204 => 
            array (
                'id' => 205,
                'city_en' => 'Marsa Alam',
                'city_ar' => 'مرسى علم',
                'shipping_amount' => '50.00',
                'governorate_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            205 => 
            array (
                'id' => 206,
                'city_en' => 'Shalatin',
                'city_ar' => 'الشلاتين',
                'shipping_amount' => '50.00',
                'governorate_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            206 => 
            array (
                'id' => 207,
                'city_en' => 'Halaib',
                'city_ar' => 'حلايب',
                'shipping_amount' => '50.00',
                'governorate_id' => 5,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            207 => 
            array (
                'id' => 221,
                'city_en' => 'Qena',
                'city_ar' => 'قنا',
                'shipping_amount' => '50.00',
                'governorate_id' => 25,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            208 => 
            array (
                'id' => 222,
                'city_en' => 'New Qena',
                'city_ar' => 'قنا الجديدة',
                'shipping_amount' => '50.00',
                'governorate_id' => 25,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            209 => 
            array (
                'id' => 223,
                'city_en' => 'Abu Tesht',
                'city_ar' => 'أبو تشت',
                'shipping_amount' => '50.00',
                'governorate_id' => 25,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            210 => 
            array (
                'id' => 224,
                'city_en' => 'Nag Hammadi',
                'city_ar' => 'نجع حمادي',
                'shipping_amount' => '50.00',
                'governorate_id' => 25,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            211 => 
            array (
                'id' => 225,
                'city_en' => 'Deshna',
                'city_ar' => 'دشنا',
                'shipping_amount' => '50.00',
                'governorate_id' => 25,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            212 => 
            array (
                'id' => 226,
                'city_en' => 'Alwaqf',
                'city_ar' => 'الوقف',
                'shipping_amount' => '50.00',
                'governorate_id' => 25,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            213 => 
            array (
                'id' => 227,
                'city_en' => 'Qaft',
                'city_ar' => 'قفط',
                'shipping_amount' => '50.00',
                'governorate_id' => 25,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            214 => 
            array (
                'id' => 228,
                'city_en' => 'Naqada',
                'city_ar' => 'نقادة',
                'shipping_amount' => '50.00',
                'governorate_id' => 25,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            215 => 
            array (
                'id' => 229,
                'city_en' => 'Farshout',
                'city_ar' => 'فرشوط',
                'shipping_amount' => '50.00',
                'governorate_id' => 25,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            216 => 
            array (
                'id' => 230,
                'city_en' => 'Quos',
                'city_ar' => 'قوص',
                'shipping_amount' => '50.00',
                'governorate_id' => 25,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            217 => 
            array (
                'id' => 231,
                'city_en' => 'Luxor',
                'city_ar' => 'الأقصر',
                'shipping_amount' => '50.00',
                'governorate_id' => 24,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            218 => 
            array (
                'id' => 232,
                'city_en' => 'New Luxor',
                'city_ar' => 'الأقصر الجديدة',
                'shipping_amount' => '50.00',
                'governorate_id' => 24,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            219 => 
            array (
                'id' => 233,
                'city_en' => 'Esna',
                'city_ar' => 'إسنا',
                'shipping_amount' => '50.00',
                'governorate_id' => 24,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            220 => 
            array (
                'id' => 234,
                'city_en' => 'New Tiba',
                'city_ar' => 'طيبة الجديدة',
                'shipping_amount' => '50.00',
                'governorate_id' => 24,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            221 => 
            array (
                'id' => 235,
                'city_en' => 'Al ziynia',
                'city_ar' => 'الزينية',
                'shipping_amount' => '50.00',
                'governorate_id' => 24,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            222 => 
            array (
                'id' => 236,
                'city_en' => 'Al Bayadieh',
                'city_ar' => 'البياضية',
                'shipping_amount' => '50.00',
                'governorate_id' => 24,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            223 => 
            array (
                'id' => 237,
                'city_en' => 'Al Qarna',
                'city_ar' => 'القرنة',
                'shipping_amount' => '50.00',
                'governorate_id' => 24,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            224 => 
            array (
                'id' => 238,
                'city_en' => 'Armant',
                'city_ar' => 'أرمنت',
                'shipping_amount' => '50.00',
                'governorate_id' => 24,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            225 => 
            array (
                'id' => 239,
                'city_en' => 'Al Tud',
                'city_ar' => 'الطود',
                'shipping_amount' => '50.00',
                'governorate_id' => 24,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            226 => 
            array (
                'id' => 240,
                'city_en' => 'Aswan',
                'city_ar' => 'أسوان',
                'shipping_amount' => '50.00',
                'governorate_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            227 => 
            array (
                'id' => 241,
                'city_en' => 'Aswan El Gedida',
                'city_ar' => 'أسوان الجديدة',
                'shipping_amount' => '50.00',
                'governorate_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            228 => 
            array (
                'id' => 242,
                'city_en' => 'Drau',
                'city_ar' => 'دراو',
                'shipping_amount' => '50.00',
                'governorate_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            229 => 
            array (
                'id' => 243,
                'city_en' => 'Kom Ombo',
                'city_ar' => 'كوم أمبو',
                'shipping_amount' => '50.00',
                'governorate_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            230 => 
            array (
                'id' => 244,
                'city_en' => 'Nasr Al Nuba',
                'city_ar' => 'نصر النوبة',
                'shipping_amount' => '50.00',
                'governorate_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            231 => 
            array (
                'id' => 245,
                'city_en' => 'Kalabsha',
                'city_ar' => 'كلابشة',
                'shipping_amount' => '50.00',
                'governorate_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            232 => 
            array (
                'id' => 246,
                'city_en' => 'Edfu',
                'city_ar' => 'إدفو',
                'shipping_amount' => '50.00',
                'governorate_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            233 => 
            array (
                'id' => 247,
                'city_en' => 'Al-Radisiyah',
                'city_ar' => 'الرديسية',
                'shipping_amount' => '50.00',
                'governorate_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            234 => 
            array (
                'id' => 248,
                'city_en' => 'Al Basilia',
                'city_ar' => 'البصيلية',
                'shipping_amount' => '50.00',
                'governorate_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            235 => 
            array (
                'id' => 249,
                'city_en' => 'Al Sibaeia',
                'city_ar' => 'السباعية',
                'shipping_amount' => '50.00',
                'governorate_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            236 => 
            array (
                'id' => 250,
                'city_en' => 'Abo Simbl Al Siyahia',
                'city_ar' => 'ابوسمبل السياحية',
                'shipping_amount' => '50.00',
                'governorate_id' => 15,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}