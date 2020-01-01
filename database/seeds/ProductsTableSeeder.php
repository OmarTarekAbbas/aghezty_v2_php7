<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 2,
                'title' => 'Deep Freezer-Samsung-LLK 7S112 X EX',
                'main_image' => '/uploads/product/main_image/2019-09-26/1569499015783.png',
                'price' => '1200.00',
                'discount' => 21,
                'price_after_discount' => '948.00',
                'special' => 1,
                'active' => 1,
                'description' => '<table border="0" cellpadding="0" cellspacing="0" style="border-collapse:
collapse;width:919pt" width="1225">
<tbody>
<tr height="35" style="height:26.25pt">
<td class="xl64" dir="RTL" height="35" style="height:26.25pt;width:919pt" width="1225">مسطح اريستون30سم - يحتوى على2عيون الكهربية -6 مستويات مختلفة للحرارة- اللون : استانلس ستيل</td>
</tr>
</tbody>
</table>',
                'short_description' => 'LLK 7S112 X EX',
                'category_id' => 9,
                'brand_id' => 1,
                'stock' => 2,
                'created_at' => '2019-09-10 05:39:19',
                'updated_at' => '2019-09-29 12:45:00',
            ),
            1 => 
            array (
                'id' => 3,
                'title' => 'Deep Freezer-Samsung-LIC 3C26 F UK',
                'main_image' => '/uploads/product/main_image/2019-09-26/1569499088582.png',
                'price' => '14000.00',
                'discount' => 12,
                'price_after_discount' => '12320.00',
                'special' => 1,
                'active' => 1,
                'description' => '<table border="0" cellpadding="0" cellspacing="0" style="border-collapse:
collapse;width:919pt" width="1225">
<tbody>
<tr height="35" style="height:26.25pt">
<td class="xl66" dir="RTL" height="35" style="height:26.25pt;width:919pt" width="1225">مسطح اريستون90سم -4شعلات غاز-عين هالوجين بيضاوية -3شبكات من الاينمل-استانلس ستيل</td>
</tr>
</tbody>
</table>',
                'short_description' => 'LIC 3C26 F UK',
                'category_id' => 9,
                'brand_id' => 1,
                'stock' => 0,
                'created_at' => '2019-09-10 05:40:51',
                'updated_at' => '2019-09-29 12:45:27',
            ),
            2 => 
            array (
                'id' => 4,
                'title' => 'fridge-LG-PHN 942 T/IX/A',
                'main_image' => '/uploads/product/main_image/2019-09-26/1569499107609.png',
                'price' => '1450.00',
                'discount' => 0,
                'price_after_discount' => '1450.00',
                'special' => 1,
                'active' => 1,
            'description' => '<p><span background-color:="" open="" style="color: rgb(57, 57, 57); font-family: ">The classic Cascade 220 Wool is the perfect combination of affordability, quality and versatility that can be used for a wide range of projects. Each hank of this worsted weight 100% pure wool comes with a generous 220 yards. With a nearly unlimited color palette to chose from, you are sure to find the perfect colo</span></p>',
                'short_description' => 'PHN 942 T/IX/A',
                'category_id' => 8,
                'brand_id' => 2,
                'stock' => 0,
                'created_at' => '2019-09-10 05:44:51',
                'updated_at' => '2019-09-29 12:45:46',
            ),
            3 => 
            array (
                'id' => 5,
                'title' => 'fridge-Samsung-PK 951 T GH',
                'main_image' => '/uploads/product/main_image/2019-09-26/156949950167.png',
                'price' => '15000.00',
                'discount' => 10,
                'price_after_discount' => '13500.00',
                'special' => 1,
                'active' => 1,
                'description' => '<table border="0" cellpadding="0" cellspacing="0" style="border-collapse:
collapse;width:919pt" width="1225">
<tbody>
<tr height="35" style="height:26.25pt">
<td class="xl66" dir="RTL" height="35" style="height:26.25pt;width:919pt" width="1225">شفاط اريستون 60 سم- قوة الشفط : 385 م3/الساعة- 3سرعات للشفط -2فلاتر من الالمونيوم</td>
</tr>
</tbody>
</table>',
                'short_description' => 'PK 951 T GH',
                'category_id' => 8,
                'brand_id' => 1,
                'stock' => 15658,
                'created_at' => '2019-09-26 10:05:01',
                'updated_at' => '2019-09-29 12:46:15',
            ),
            4 => 
            array (
                'id' => 6,
            'title' => 'fridge-Samsung-SL 16.1 (WH)',
                'main_image' => '/uploads/product/main_image/2019-09-26/1569499587140.png',
                'price' => '2000.00',
                'discount' => 10,
                'price_after_discount' => '1800.00',
                'special' => 1,
                'active' => 1,
                'description' => '<table border="0" cellpadding="0" cellspacing="0" style="border-collapse:
collapse;width:919pt" width="1225">
<tbody>
<tr height="35" style="height:26.25pt">
<td class="xl66" dir="RTL" height="35" style="height:26.25pt;width:919pt" width="1225">شفاط اريستون 60سم بدون مدخنه - قوة الشفط : 460 م3/ الساعه-3سرعات-2لمبه هالوجين-2فلتر-سيلفر</td>
</tr>
</tbody>
</table>',
            'short_description' => 'SL 16.1 (WH)',
                'category_id' => 8,
                'brand_id' => 1,
                'stock' => 327,
                'created_at' => '2019-09-26 10:06:27',
                'updated_at' => '2019-09-29 12:46:44',
            ),
            5 => 
            array (
                'id' => 7,
                'title' => 'Deep Freezer-LG-UA8 F1C X',
                'main_image' => '/uploads/product/main_image/2019-09-26/1569499956367.png',
                'price' => '15000.00',
                'discount' => 25,
                'price_after_discount' => '11250.00',
                'special' => 1,
                'active' => 1,
                'description' => '<table border="0" cellpadding="0" cellspacing="0" style="border-collapse:
collapse;width:919pt" width="1225">
<tbody>
<tr height="35" style="height:26.25pt">
<td class="xl66" dir="RTL" height="35" style="height:26.25pt;width:919pt" width="1225">ديب فريزر اريستون 7&nbsp; درج- تحكم الكتروني - نو فروست-اللون :سيلفر</td>
</tr>
</tbody>
</table>',
                'short_description' => 'UA8 F1C X',
                'category_id' => 9,
                'brand_id' => 2,
                'stock' => 54,
                'created_at' => '2019-09-26 10:12:36',
                'updated_at' => '2019-09-29 12:47:21',
            ),
            6 => 
            array (
                'id' => 8,
                'title' => 'Washing machines-Toshiba-LFC 2B19 X + MQ 100',
                'main_image' => '/uploads/product/main_image/2019-09-26/1569500172641.png',
                'price' => '1500.00',
                'discount' => 5,
                'price_after_discount' => '1425.00',
                'special' => 1,
                'active' => 1,
                'description' => '<p>Washing&nbsp;Washing&nbsp;Washing&nbsp;Washing&nbsp;Washing&nbsp;</p>',
                'short_description' => 'LFC 2B19 X + MQ 100',
                'category_id' => 10,
                'brand_id' => 3,
                'stock' => 5,
                'created_at' => '2019-09-26 10:16:12',
                'updated_at' => '2019-09-29 12:48:18',
            ),
            7 => 
            array (
                'id' => 9,
                'title' => 'Washing machines-Samsung-PCN 642 IX/A+FA3 530 H IX A + ASLT 65 AS X',
                'main_image' => '/uploads/product/main_image/2019-09-26/156950038228.png',
                'price' => '0.00',
                'discount' => NULL,
                'price_after_discount' => NULL,
                'special' => 1,
                'active' => 1,
                'description' => '<p>Test&nbsp;Test&nbsp;Test&nbsp;Test&nbsp;Test&nbsp;Test&nbsp;</p>',
                'short_description' => 'PCN 642 IX/A+FA3 530 H IX A + ASLT 65 AS X',
                'category_id' => 10,
                'brand_id' => 1,
                'stock' => 5454,
                'created_at' => '2019-09-26 10:19:42',
                'updated_at' => '2019-09-29 12:48:40',
            ),
            8 => 
            array (
                'id' => 10,
                'title' => 'screens-Toshiba-LFC 2B19 X + MQ 100',
                'main_image' => '/uploads/product/main_image/2019-09-26/1569500487194.png',
                'price' => '500.00',
                'discount' => 1,
                'price_after_discount' => '495.00',
                'special' => 1,
                'active' => 1,
                'description' => '<p>Screen&nbsp;Screen&nbsp;Screen&nbsp;Screen&nbsp;Screen&nbsp;Screen&nbsp;Screen&nbsp;</p>',
                'short_description' => 'LFC 2B19 X + MQ 100',
                'category_id' => 12,
                'brand_id' => 3,
                'stock' => 45,
                'created_at' => '2019-09-26 10:21:27',
                'updated_at' => '2019-09-29 12:48:54',
            ),
            9 => 
            array (
                'id' => 11,
                'title' => 'screens-Samsung-PCN 642 IX/A+FA3 530 H IX A + ASLT 65 AS X',
                'main_image' => '/uploads/product/main_image/2019-09-26/1569500527306.png',
                'price' => '1000.00',
                'discount' => 2,
                'price_after_discount' => '980.00',
                'special' => 1,
                'active' => 1,
                'description' => '<p>Testing&nbsp;Testing&nbsp;Testing&nbsp;Testing&nbsp;Testing&nbsp;Testing&nbsp;</p>',
                'short_description' => 'PCN 642 IX/A+FA3 530 H IX A + ASLT 65 AS X',
                'category_id' => 12,
                'brand_id' => 1,
                'stock' => 546,
                'created_at' => '2019-09-26 10:22:07',
                'updated_at' => '2019-09-29 12:49:09',
            ),
            10 => 
            array (
                'id' => 12,
                'title' => 'Receivers-LG-MD 554 IX A',
                'main_image' => '/uploads/product/main_image/2019-09-26/156950060117.png',
                'price' => '5000.00',
                'discount' => 50,
                'price_after_discount' => '2500.00',
                'special' => 1,
                'active' => 1,
                'description' => '<p>Settings Settings&nbsp;Settings&nbsp;Settings&nbsp;Settings&nbsp;Settings&nbsp;Settings&nbsp;Settings&nbsp;</p>',
                'short_description' => 'MD 554 IX A',
                'category_id' => 13,
                'brand_id' => 2,
                'stock' => 5445,
                'created_at' => '2019-09-26 10:23:21',
                'updated_at' => '2019-09-29 12:49:27',
            ),
            11 => 
            array (
                'id' => 13,
                'title' => 'Receivers-Samsung-RPG 822 SS EX',
                'main_image' => '/uploads/product/main_image/2019-09-26/1569500643943.png',
                'price' => '2500.00',
                'discount' => 35,
                'price_after_discount' => '1625.00',
                'special' => 1,
                'active' => 1,
                'description' => '<p>Test&nbsp;Test&nbsp;Test&nbsp;Test&nbsp;Test&nbsp;Test&nbsp;</p>',
                'short_description' => 'RPG 822 SS EX',
                'category_id' => 13,
                'brand_id' => 1,
                'stock' => 18,
                'created_at' => '2019-09-26 10:24:03',
                'updated_at' => '2019-09-29 12:49:42',
            ),
            12 => 
            array (
                'id' => 14,
                'title' => 'phones-Samsung-WMG 9437BS EX',
                'main_image' => '/uploads/product/main_image/2019-09-26/1569500946418.png',
                'price' => '20000.00',
                'discount' => 18,
                'price_after_discount' => '16400.00',
                'special' => 1,
                'active' => 1,
                'description' => '<p>IPhone X&nbsp;IPhone X&nbsp;IPhone X&nbsp;IPhone X&nbsp;IPhone X&nbsp;</p>',
                'short_description' => 'WMG 9437BS EX',
                'category_id' => 15,
                'brand_id' => 1,
                'stock' => 544,
                'created_at' => '2019-09-26 10:29:06',
                'updated_at' => '2019-09-29 12:49:57',
            ),
            13 => 
            array (
                'id' => 15,
                'title' => 'phones-LG-LFP 4O23 WLT X',
                'main_image' => '/uploads/product/main_image/2019-09-26/1569501007131.png',
                'price' => '10000.00',
                'discount' => 50,
                'price_after_discount' => '5000.00',
                'special' => 1,
                'active' => 1,
                'description' => '<p>Nokia&nbsp;Nokia&nbsp;Nokia&nbsp;Nokia&nbsp;Nokia&nbsp;</p>',
                'short_description' => 'LFP 4O23 WLT X',
                'category_id' => 15,
                'brand_id' => 2,
                'stock' => 4540,
                'created_at' => '2019-09-26 10:30:07',
                'updated_at' => '2019-09-29 12:50:12',
            ),
            14 => 
            array (
                'id' => 16,
                'title' => 'telphone-Toshiba-PHN 961 TS/IX/A+FKYG X+SL 19.1P IX',
                'main_image' => '/uploads/product/main_image/2019-09-26/1569501083177.png',
                'price' => '1200.00',
                'discount' => 12,
                'price_after_discount' => '1056.00',
                'special' => 1,
                'active' => 1,
                'description' => '<p>Panisonic&nbsp;Panisonic&nbsp;Panisonic&nbsp;Panisonic&nbsp;Panisonic&nbsp;Panisonic&nbsp;Panisonic&nbsp;Panisonic&nbsp;</p>',
                'short_description' => 'PHN 961 TS/IX/A+FKYG X+SL 19.1P IX',
                'category_id' => 16,
                'brand_id' => 3,
                'stock' => 145,
                'created_at' => '2019-09-26 10:31:23',
                'updated_at' => '2019-09-29 12:50:30',
            ),
            15 => 
            array (
                'id' => 17,
                'title' => 'telphone-Samsung-UA8 F1C X',
                'main_image' => '/uploads/product/main_image/2019-09-26/1569501115996.png',
                'price' => '2500.00',
                'discount' => 25,
                'price_after_discount' => '1875.00',
                'special' => 1,
                'active' => 1,
                'description' => '<p>Samsung&nbsp;Samsung&nbsp;Samsung&nbsp;Samsung&nbsp;</p>',
                'short_description' => 'UA8 F1C X',
                'category_id' => 16,
                'brand_id' => 1,
                'stock' => 2110,
                'created_at' => '2019-09-26 10:31:55',
                'updated_at' => '2019-09-29 12:47:59',
            ),
        ));
        
        
    }
}