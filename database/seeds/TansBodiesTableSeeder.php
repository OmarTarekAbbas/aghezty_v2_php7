<?php

use Illuminate\Database\Seeder;

class TansBodiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tans_bodies')->delete();
        
        \DB::table('tans_bodies')->insert(array (
            0 => 
            array (
                'id' => 1,
                'language_id' => 4,
                'translatable_id' => 1,
                'body' => 'الاجهزة الثقيلة',
                'created_at' => '2019-09-12 07:25:51',
                'updated_at' => '2019-09-12 07:25:51',
            ),
            1 => 
            array (
                'id' => 2,
                'language_id' => 4,
                'translatable_id' => 2,
                'body' => 'الشاشات والرسيفر',
                'created_at' => '2019-09-12 07:25:59',
                'updated_at' => '2019-09-12 07:25:59',
            ),
            2 => 
            array (
                'id' => 3,
                'language_id' => 4,
                'translatable_id' => 3,
                'body' => 'تليفونات واكسورات',
                'created_at' => '2019-09-12 07:26:06',
                'updated_at' => '2019-09-12 07:26:06',
            ),
            3 => 
            array (
                'id' => 4,
                'language_id' => 4,
                'translatable_id' => 4,
                'body' => 'ثلاجه',
                'created_at' => '2019-09-12 07:26:17',
                'updated_at' => '2019-09-12 07:26:17',
            ),
            4 => 
            array (
                'id' => 5,
                'language_id' => 4,
                'translatable_id' => 5,
                'body' => 'ديب فريزر',
                'created_at' => '2019-09-12 07:26:24',
                'updated_at' => '2019-09-12 07:26:24',
            ),
            5 => 
            array (
                'id' => 6,
                'language_id' => 4,
                'translatable_id' => 6,
                'body' => 'غسالات',
                'created_at' => '2019-09-12 07:26:33',
                'updated_at' => '2019-09-12 07:26:33',
            ),
            6 => 
            array (
                'id' => 7,
                'language_id' => 4,
                'translatable_id' => 7,
                'body' => 'شاشات',
                'created_at' => '2019-09-12 07:26:44',
                'updated_at' => '2019-09-12 07:26:44',
            ),
            7 => 
            array (
                'id' => 8,
                'language_id' => 4,
                'translatable_id' => 8,
                'body' => 'الرسيفر',
                'created_at' => '2019-09-12 07:26:51',
                'updated_at' => '2019-09-12 07:26:51',
            ),
            8 => 
            array (
                'id' => 9,
                'language_id' => 4,
                'translatable_id' => 9,
                'body' => 'محمول',
                'created_at' => '2019-09-12 07:27:11',
                'updated_at' => '2019-09-12 07:27:11',
            ),
            9 => 
            array (
                'id' => 10,
                'language_id' => 4,
                'translatable_id' => 10,
                'body' => 'ارضى',
                'created_at' => '2019-09-12 07:27:27',
                'updated_at' => '2019-09-12 07:27:27',
            ),
            10 => 
            array (
                'id' => 11,
                'language_id' => 4,
                'translatable_id' => 11,
                'body' => 'سامسونج',
                'created_at' => '2019-09-12 07:27:40',
                'updated_at' => '2019-09-12 07:27:40',
            ),
            11 => 
            array (
                'id' => 12,
                'language_id' => 4,
                'translatable_id' => 12,
                'body' => 'ال جى',
                'created_at' => '2019-09-12 07:27:52',
                'updated_at' => '2019-09-15 10:45:32',
            ),
            12 => 
            array (
                'id' => 13,
                'language_id' => 4,
                'translatable_id' => 13,
                'body' => 'توشيبا',
                'created_at' => '2019-09-12 07:27:59',
                'updated_at' => '2019-09-15 10:45:18',
            ),
            13 => 
            array (
                'id' => 14,
                'language_id' => 4,
                'translatable_id' => 14,
                'body' => 'ديب فريزر-سامسونج-LLK 7S112 X EX',
                'created_at' => '2019-09-12 07:28:32',
                'updated_at' => '2019-09-29 12:45:00',
            ),
            14 => 
            array (
                'id' => 15,
                'language_id' => 4,
                'translatable_id' => 15,
                'body' => '<table border="0" cellpadding="0" cellspacing="0" style="border-collapse:
collapse;width:919pt" width="1225">
<tbody>
<tr height="35" style="height:26.25pt">
<td class="xl64" dir="RTL" height="35" style="height:26.25pt;width:919pt" width="1225">مسطح اريستون30سم - يحتوى على2عيون الكهربية -6 مستويات مختلفة للحرارة- اللون : استانلس ستيل</td>
</tr>
</tbody>
</table>',
                'created_at' => '2019-09-12 07:28:32',
                'updated_at' => '2019-09-29 12:45:00',
            ),
            15 => 
            array (
                'id' => 16,
                'language_id' => 4,
                'translatable_id' => 16,
                'body' => 'LLK 7S112 X EX',
                'created_at' => '2019-09-12 07:28:32',
                'updated_at' => '2019-09-29 12:45:00',
            ),
            16 => 
            array (
                'id' => 17,
                'language_id' => 4,
                'translatable_id' => 17,
                'body' => 'ديب فريزر-سامسونج-LIC 3C26 F UK',
                'created_at' => '2019-09-12 07:28:49',
                'updated_at' => '2019-09-29 12:45:27',
            ),
            17 => 
            array (
                'id' => 18,
                'language_id' => 4,
                'translatable_id' => 18,
                'body' => '<table border="0" cellpadding="0" cellspacing="0" style="border-collapse:
collapse;width:919pt" width="1225">
<tbody>
<tr height="35" style="height:26.25pt">
<td class="xl66" dir="RTL" height="35" style="height:26.25pt;width:919pt" width="1225">مسطح اريستون90سم -4شعلات غاز-عين هالوجين بيضاوية -3شبكات من الاينمل-استانلس ستيل</td>
</tr>
</tbody>
</table>',
                'created_at' => '2019-09-12 07:28:49',
                'updated_at' => '2019-09-29 12:45:27',
            ),
            18 => 
            array (
                'id' => 19,
                'language_id' => 4,
                'translatable_id' => 19,
                'body' => 'LIC 3C26 F UK',
                'created_at' => '2019-09-12 07:28:49',
                'updated_at' => '2019-09-29 12:45:27',
            ),
            19 => 
            array (
                'id' => 20,
                'language_id' => 4,
                'translatable_id' => 20,
                'body' => 'ثلاجه-ال جى-PHN 942 T/IX/A',
                'created_at' => '2019-09-12 07:29:07',
                'updated_at' => '2019-09-29 12:45:46',
            ),
            20 => 
            array (
                'id' => 21,
                'language_id' => 4,
                'translatable_id' => 21,
            'body' => '<p><span style="color: rgb(0, 0, 0); font-family: Arial, Tahoma, Helvetica, sans-serif; font-size: 14px; text-align: right;">يعد Cascade 220 Wool الكلاسيكي مزيجًا مثاليًا من القدرة على تحمل التكاليف والجودة والتنوع الذي يمكن استخدامه في مجموعة واسعة من المشاريع. كل قطعة من هذا الصوف الخالص 100٪ تحتوي على 220 ياردة. بفضل لوحة الألوان غير المحدودة تقريبًا للاختيار من بينها ، فمن المؤكد أنك ستجد اللون (الألوان) المثالي لمشروعك القادم! ملاحظة: هذه الخيوط رائعة لمشاريع التلبيد أيضًا!</span></p>',
                'created_at' => '2019-09-12 07:29:07',
                'updated_at' => '2019-09-12 07:29:07',
            ),
            21 => 
            array (
                'id' => 22,
                'language_id' => 4,
                'translatable_id' => 22,
                'body' => 'PHN 942 T/IX/A',
                'created_at' => '2019-09-12 07:29:08',
                'updated_at' => '2019-09-29 12:45:46',
            ),
            22 => 
            array (
                'id' => 23,
                'language_id' => 4,
                'translatable_id' => 23,
                'body' => 'تليفون',
                'created_at' => '2019-09-26 10:02:49',
                'updated_at' => '2019-09-26 10:02:49',
            ),
            23 => 
            array (
                'id' => 24,
                'language_id' => 4,
                'translatable_id' => 24,
                'body' => 'ثلاجه-سامسونج-PK 951 T GH',
                'created_at' => '2019-09-26 10:05:02',
                'updated_at' => '2019-09-29 12:46:15',
            ),
            24 => 
            array (
                'id' => 25,
                'language_id' => 4,
                'translatable_id' => 25,
                'body' => '<table border="0" cellpadding="0" cellspacing="0" style="border-collapse:
collapse;width:919pt" width="1225">
<tbody>
<tr height="35" style="height:26.25pt">
<td class="xl66" dir="RTL" height="35" style="height:26.25pt;width:919pt" width="1225">شفاط اريستون 60 سم- قوة الشفط : 385 م3/الساعة- 3سرعات للشفط -2فلاتر من الالمونيوم</td>
</tr>
</tbody>
</table>',
                'created_at' => '2019-09-26 10:05:02',
                'updated_at' => '2019-09-29 12:46:15',
            ),
            25 => 
            array (
                'id' => 26,
                'language_id' => 4,
                'translatable_id' => 26,
                'body' => 'PK 951 T GH',
                'created_at' => '2019-09-26 10:05:02',
                'updated_at' => '2019-09-29 12:46:15',
            ),
            26 => 
            array (
                'id' => 27,
                'language_id' => 4,
                'translatable_id' => 27,
            'body' => 'ثلاجه-سامسونج-SL 16.1 (WH)',
                'created_at' => '2019-09-26 10:06:27',
                'updated_at' => '2019-09-29 12:46:44',
            ),
            27 => 
            array (
                'id' => 28,
                'language_id' => 4,
                'translatable_id' => 28,
                'body' => '<table border="0" cellpadding="0" cellspacing="0" style="border-collapse:
collapse;width:919pt" width="1225">
<tbody>
<tr height="35" style="height:26.25pt">
<td class="xl66" dir="RTL" height="35" style="height:26.25pt;width:919pt" width="1225">شفاط اريستون 60سم بدون مدخنه - قوة الشفط : 460 م3/ الساعه-3سرعات-2لمبه هالوجين-2فلتر-سيلفر</td>
</tr>
</tbody>
</table>',
                'created_at' => '2019-09-26 10:06:27',
                'updated_at' => '2019-09-29 12:46:44',
            ),
            28 => 
            array (
                'id' => 29,
                'language_id' => 4,
                'translatable_id' => 29,
            'body' => 'SL 16.1 (WH)',
                'created_at' => '2019-09-26 10:06:27',
                'updated_at' => '2019-09-29 12:46:44',
            ),
            29 => 
            array (
                'id' => 30,
                'language_id' => 4,
                'translatable_id' => 30,
                'body' => 'ديب فريزر-ال جى-UA8 F1C X',
                'created_at' => '2019-09-26 10:12:36',
                'updated_at' => '2019-09-29 12:47:21',
            ),
            30 => 
            array (
                'id' => 32,
                'language_id' => 4,
                'translatable_id' => 33,
                'body' => 'غسالات-توشيبا-LFC 2B19 X + MQ 100',
                'created_at' => '2019-09-26 10:16:12',
                'updated_at' => '2019-09-29 12:48:18',
            ),
            31 => 
            array (
                'id' => 33,
                'language_id' => 4,
                'translatable_id' => 34,
                'body' => '<p>Washing&nbsp;Washing&nbsp;Washing&nbsp;Washing&nbsp;</p>',
                'created_at' => '2019-09-26 10:16:12',
                'updated_at' => '2019-09-26 10:16:12',
            ),
            32 => 
            array (
                'id' => 34,
                'language_id' => 4,
                'translatable_id' => 35,
                'body' => 'LFC 2B19 X + MQ 100',
                'created_at' => '2019-09-26 10:16:13',
                'updated_at' => '2019-09-29 12:48:18',
            ),
            33 => 
            array (
                'id' => 35,
                'language_id' => 4,
                'translatable_id' => 36,
                'body' => 'غسالات-سامسونج-PCN 642 IX/A+FA3 530 H IX A + ASLT 65 AS X',
                'created_at' => '2019-09-26 10:19:42',
                'updated_at' => '2019-09-29 12:48:40',
            ),
            34 => 
            array (
                'id' => 36,
                'language_id' => 4,
                'translatable_id' => 37,
                'body' => '<p>Test&nbsp;Test&nbsp;Test&nbsp;Test&nbsp;</p>',
                'created_at' => '2019-09-26 10:19:42',
                'updated_at' => '2019-09-26 10:19:42',
            ),
            35 => 
            array (
                'id' => 37,
                'language_id' => 4,
                'translatable_id' => 38,
                'body' => 'PCN 642 IX/A+FA3 530 H IX A + ASLT 65 AS X',
                'created_at' => '2019-09-26 10:19:42',
                'updated_at' => '2019-09-29 12:48:41',
            ),
            36 => 
            array (
                'id' => 38,
                'language_id' => 4,
                'translatable_id' => 39,
                'body' => 'شاشات-توشيبا-LFC 2B19 X + MQ 100',
                'created_at' => '2019-09-26 10:21:28',
                'updated_at' => '2019-09-29 12:48:54',
            ),
            37 => 
            array (
                'id' => 39,
                'language_id' => 4,
                'translatable_id' => 40,
                'body' => '<p>Screen&nbsp;Screen&nbsp;Screen&nbsp;Screen&nbsp;</p>',
                'created_at' => '2019-09-26 10:21:28',
                'updated_at' => '2019-09-26 10:21:28',
            ),
            38 => 
            array (
                'id' => 40,
                'language_id' => 4,
                'translatable_id' => 41,
                'body' => 'LFC 2B19 X + MQ 100',
                'created_at' => '2019-09-26 10:21:28',
                'updated_at' => '2019-09-29 12:48:54',
            ),
            39 => 
            array (
                'id' => 41,
                'language_id' => 4,
                'translatable_id' => 42,
                'body' => 'شاشات-سامسونج-PCN 642 IX/A+FA3 530 H IX A + ASLT 65 AS X',
                'created_at' => '2019-09-26 10:22:07',
                'updated_at' => '2019-09-29 12:49:09',
            ),
            40 => 
            array (
                'id' => 42,
                'language_id' => 4,
                'translatable_id' => 43,
                'body' => '<p>Testing&nbsp;Testing&nbsp;Testing&nbsp;Testing&nbsp;Testing&nbsp;</p>',
                'created_at' => '2019-09-26 10:22:07',
                'updated_at' => '2019-09-26 10:22:07',
            ),
            41 => 
            array (
                'id' => 43,
                'language_id' => 4,
                'translatable_id' => 44,
                'body' => 'PCN 642 IX/A+FA3 530 H IX A + ASLT 65 AS X',
                'created_at' => '2019-09-26 10:22:08',
                'updated_at' => '2019-09-29 12:49:09',
            ),
            42 => 
            array (
                'id' => 44,
                'language_id' => 4,
                'translatable_id' => 45,
                'body' => 'الرسيفر-ال جى-MD 554 IX A',
                'created_at' => '2019-09-26 10:23:21',
                'updated_at' => '2019-09-29 12:49:27',
            ),
            43 => 
            array (
                'id' => 45,
                'language_id' => 4,
                'translatable_id' => 46,
                'body' => '<p>Settings&nbsp;Settings&nbsp;Settings&nbsp;Settings&nbsp;Settings&nbsp;Settings&nbsp;Settings&nbsp;Settings&nbsp;</p>',
                'created_at' => '2019-09-26 10:23:22',
                'updated_at' => '2019-09-26 10:23:22',
            ),
            44 => 
            array (
                'id' => 46,
                'language_id' => 4,
                'translatable_id' => 47,
                'body' => 'MD 554 IX A',
                'created_at' => '2019-09-26 10:23:22',
                'updated_at' => '2019-09-29 12:49:27',
            ),
            45 => 
            array (
                'id' => 47,
                'language_id' => 4,
                'translatable_id' => 48,
                'body' => 'الرسيفر-سامسونج-RPG 822 SS EX',
                'created_at' => '2019-09-26 10:24:03',
                'updated_at' => '2019-09-29 12:49:42',
            ),
            46 => 
            array (
                'id' => 48,
                'language_id' => 4,
                'translatable_id' => 49,
                'body' => '<p>Test&nbsp;Test&nbsp;Test&nbsp;Test&nbsp;Test&nbsp;Test&nbsp;</p>',
                'created_at' => '2019-09-26 10:24:03',
                'updated_at' => '2019-09-26 10:24:03',
            ),
            47 => 
            array (
                'id' => 49,
                'language_id' => 4,
                'translatable_id' => 50,
                'body' => 'RPG 822 SS EX',
                'created_at' => '2019-09-26 10:24:03',
                'updated_at' => '2019-09-29 12:49:42',
            ),
            48 => 
            array (
                'id' => 50,
                'language_id' => 4,
                'translatable_id' => 51,
                'body' => 'محمول-سامسونج-WMG 9437BS EX',
                'created_at' => '2019-09-26 10:29:07',
                'updated_at' => '2019-09-29 12:49:57',
            ),
            49 => 
            array (
                'id' => 51,
                'language_id' => 4,
                'translatable_id' => 52,
                'body' => '<p>IPhone X&nbsp;IPhone X&nbsp;IPhone X&nbsp;</p>',
                'created_at' => '2019-09-26 10:29:07',
                'updated_at' => '2019-09-26 10:29:07',
            ),
            50 => 
            array (
                'id' => 52,
                'language_id' => 4,
                'translatable_id' => 53,
                'body' => 'WMG 9437BS EX',
                'created_at' => '2019-09-26 10:29:07',
                'updated_at' => '2019-09-29 12:49:57',
            ),
            51 => 
            array (
                'id' => 53,
                'language_id' => 4,
                'translatable_id' => 54,
                'body' => 'محمول-ال جى-LFP 4O23 WLT X',
                'created_at' => '2019-09-26 10:30:07',
                'updated_at' => '2019-09-29 12:50:12',
            ),
            52 => 
            array (
                'id' => 54,
                'language_id' => 4,
                'translatable_id' => 55,
                'body' => '<p>Nokia&nbsp;Nokia&nbsp;Nokia&nbsp;</p>',
                'created_at' => '2019-09-26 10:30:07',
                'updated_at' => '2019-09-26 10:30:07',
            ),
            53 => 
            array (
                'id' => 55,
                'language_id' => 4,
                'translatable_id' => 56,
                'body' => 'LFP 4O23 WLT X',
                'created_at' => '2019-09-26 10:30:07',
                'updated_at' => '2019-09-29 12:50:12',
            ),
            54 => 
            array (
                'id' => 56,
                'language_id' => 4,
                'translatable_id' => 57,
                'body' => 'ارضى-توشيبا-PHN 961 TS/IX/A+FKYG X+SL 19.1P IX',
                'created_at' => '2019-09-26 10:31:23',
                'updated_at' => '2019-09-29 12:50:30',
            ),
            55 => 
            array (
                'id' => 57,
                'language_id' => 4,
                'translatable_id' => 58,
                'body' => '<p>Panisonic&nbsp;Panisonic&nbsp;Panisonic&nbsp;Panisonic&nbsp;Panisonic&nbsp;Panisonic&nbsp;</p>',
                'created_at' => '2019-09-26 10:31:23',
                'updated_at' => '2019-09-26 10:31:23',
            ),
            56 => 
            array (
                'id' => 58,
                'language_id' => 4,
                'translatable_id' => 59,
                'body' => 'PHN 961 TS/IX/A+FKYG X+SL 19.1P IX',
                'created_at' => '2019-09-26 10:31:23',
                'updated_at' => '2019-09-29 12:50:30',
            ),
            57 => 
            array (
                'id' => 59,
                'language_id' => 4,
                'translatable_id' => 60,
                'body' => 'ارضى-سامسونج-UA8 F1C X',
                'created_at' => '2019-09-26 10:31:55',
                'updated_at' => '2019-09-29 12:47:59',
            ),
            58 => 
            array (
                'id' => 60,
                'language_id' => 4,
                'translatable_id' => 61,
                'body' => '<p>Samsung&nbsp;Samsung&nbsp;Samsung&nbsp;</p>',
                'created_at' => '2019-09-26 10:31:56',
                'updated_at' => '2019-09-26 10:31:56',
            ),
            59 => 
            array (
                'id' => 61,
                'language_id' => 4,
                'translatable_id' => 62,
                'body' => 'UA8 F1C X',
                'created_at' => '2019-09-26 10:31:56',
                'updated_at' => '2019-09-29 12:47:59',
            ),
        ));
        
        
    }
}