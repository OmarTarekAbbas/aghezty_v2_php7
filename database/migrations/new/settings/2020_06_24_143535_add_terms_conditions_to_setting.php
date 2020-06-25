<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTermsConditionsToSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::table('settings')->insert([
            'key' => 'terms_conditions',
            'value' => '<p align="right"><span style="color: rgb(248, 170, 77); font-family: Arial, sans-serif; font-size: 13.3333px; font-weight: 700; text-transform: uppercase;">من نحن</span></p>

            <p align="right"><strong><span dir="RTL">اجهزتي من اكبر الشركات لبيع وتوزيع الالكترونيات في مصر بجميع انواعها و موديلاتها بمفهوم عصري جديد .</span></strong></p>
            
            <p align="right"><strong><span dir="RTL">في اجهزتي نحن نوعد عملائنا بتجربة شراء مميزة, حيث يمكنهم شراء جميع احتياجاتهم من الأجهزة الالكترونية بأمان, وبافضل الأسعار وأعلى جوده .</span></strong></p>
            
            <p align="right"><b style="color: rgb(0, 0, 0); font-family: Calibri, sans-serif; font-size: 14.6667px;"><span dir="RTL" lang="AR-SA" style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 10pt; line-height: inherit; font-family: Arial, sans-serif; vertical-align: baseline; color: rgb(248, 170, 77);">الأسعار</span></b><b style="color: rgb(0, 0, 0); font-family: Calibri, sans-serif; font-size: 14.6667px;"><span style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 10pt; line-height: inherit; vertical-align: baseline; color: rgb(248, 170, 77);">:</span></b></p>
            
            <p align="right"><strong><span dir="RTL">في اجهزتي نعد عملائنا بتقديم افضل سعر في مصر للاجهزه الالكترونيه بوسائل دفع امنه عن طريق الانترنت .</span>.</strong></p>
            
            <p align="right"><b style="color: rgb(0, 0, 0); font-family: Calibri, sans-serif; font-size: 14.6667px;"><span dir="RTL" lang="AR-SA" style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 10pt; line-height: inherit; font-family: Arial, sans-serif; vertical-align: baseline; color: rgb(248, 170, 77); text-transform: uppercase;">طرق الدفع</span></b><b style="color: rgb(0, 0, 0); font-family: Calibri, sans-serif; font-size: 14.6667px;"><span style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 10pt; line-height: inherit; vertical-align: baseline; color: rgb(248, 170, 77); text-transform: uppercase;">:</span></b></p>
            
            <p align="right"><strong><span dir="RTL">تمتع بأكبر تشكيلة من طرق الدفع, مثل الدفع عند الاستلام , بطاقة الائتمان , بطاقة الائتمان عند الاستلام &nbsp;, تقسيط فيزا البنك الأهلي , تقسيط مباشر</span></strong><strong>.</strong></p>
            
            <p align="right"><b style="color: rgb(0, 0, 0); font-family: Calibri, sans-serif; font-size: 14.6667px;"><span dir="RTL" lang="AR-SA" style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 10pt; line-height: inherit; font-family: Arial, sans-serif; vertical-align: baseline; color: rgb(248, 170, 77); text-transform: uppercase;">الاسترجاع أو الاستبدال</span></b><b style="color: rgb(0, 0, 0); font-family: Calibri, sans-serif; font-size: 14.6667px;"><span style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 10pt; line-height: inherit; vertical-align: baseline; color: rgb(248, 170, 77); text-transform: uppercase;">:</span></b></p>
            
            <p align="right"><strong><span dir="RTL">استمتع بـ 14 يوم استبدال أو استرجاع على مشترياتك .</span></strong><strong>.</strong></p>
            
            <p align="right"><b style="color: rgb(0, 0, 0); font-family: Calibri, sans-serif; font-size: 14.6667px;"><span dir="RTL" lang="AR-SA" style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 10pt; line-height: inherit; font-family: Arial, sans-serif; vertical-align: baseline; color: rgb(248, 170, 77);">التوصيل</span></b><b style="color: rgb(0, 0, 0); font-family: Calibri, sans-serif; font-size: 14.6667px;"><span style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 10pt; line-height: inherit; vertical-align: baseline; color: rgb(248, 170, 77);">:</span></b></p>
            
            <p align="right"><strong><span dir="RTL">مع اجهزتي استمتع باسرع خدمة توصيل في مصر, حيث يصلك طلبك حتى باب منزلك في نفس اليوم او في خلال 48 ساعة</span></strong><strong>.</strong></p>
            
            <p align="right"><b style="color: rgb(0, 0, 0); font-family: Calibri, sans-serif; font-size: 14.6667px;"><span dir="RTL" lang="AR-SA" style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 10pt; line-height: inherit; font-family: Arial, sans-serif; vertical-align: baseline; color: rgb(248, 170, 77); text-transform: uppercase;">الجودة</span></b><b style="color: rgb(0, 0, 0); font-family: Calibri, sans-serif; font-size: 14.6667px;"><span style="margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: inherit; font-stretch: inherit; font-size: 10pt; line-height: inherit; vertical-align: baseline; color: rgb(248, 170, 77); text-transform: uppercase;">:</span></b></p>
            
            <p align="right"><strong><span dir="RTL">جميع المنتجات اصليه و بضمان الوكيل .</span></strong><strong>.</strong></p>
            
            <p align="right"><strong><span dir="RTL">نعدكم بتقديم الخدمه بمفهوم عصري مختلف</span></strong></p>
            
            <p align="right">&nbsp;</p>
            
            <p align="right"><strong><span dir="RTL">فريق عمل اجهزتي</span></strong></p>',
            'type_id' => 1
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
