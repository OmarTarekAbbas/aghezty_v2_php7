<?php

use Illuminate\Database\Seeder;

class NotificationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('notifications')->delete();
        
        \DB::table('notifications')->insert(array (
            0 => 
            array (
                'id' => 1,
                'notifier_id' => 15,
                'notified_id' => 1,
                'subject' => 'Make New Order You Can Check It Now',
                'link' => 'http://localhost:8080/aghezty_php7/order/1',
                'seen' => 1,
                'created_at' => '2019-09-25 17:46:19',
                'updated_at' => '2019-09-26 12:52:11',
            ),
            1 => 
            array (
                'id' => 2,
                'notifier_id' => 15,
                'notified_id' => 1,
                'subject' => 'Make New Order You Can Check It Now',
                'link' => 'http://localhost:8080/aghezty_php7/order/2',
                'seen' => 1,
                'created_at' => '2019-09-25 18:02:29',
                'updated_at' => '2019-09-26 12:52:11',
            ),
            2 => 
            array (
                'id' => 3,
                'notifier_id' => 15,
                'notified_id' => 1,
                'subject' => 'Make New Order You Can Check It Now',
                'link' => 'http://localhost:8080/aghezty_php7/order/3',
                'seen' => 1,
                'created_at' => '2019-09-25 17:48:23',
                'updated_at' => '2019-09-26 12:52:11',
            ),
            3 => 
            array (
                'id' => 4,
                'notifier_id' => 15,
                'notified_id' => 1,
                'subject' => 'Make New Order You Can Check It Now',
                'link' => 'http://localhost:8080/aghezty_php7/order/4',
                'seen' => 1,
                'created_at' => '2019-09-25 17:48:46',
                'updated_at' => '2019-09-26 12:52:11',
            ),
            4 => 
            array (
                'id' => 5,
                'notifier_id' => 15,
                'notified_id' => 1,
                'subject' => 'Make New Order You Can Check It Now',
                'link' => 'http://localhost:8080/aghezty_php7/order/5',
                'seen' => 1,
                'created_at' => '2019-09-25 18:19:43',
                'updated_at' => '2019-09-26 12:52:11',
            ),
            5 => 
            array (
                'id' => 6,
                'notifier_id' => 15,
                'notified_id' => 1,
                'subject' => 'Make New Order You Can Check It Now',
                'link' => 'http://localhost:8080/aghezty_php7/order/6',
                'seen' => 1,
                'created_at' => '2019-09-25 18:36:46',
                'updated_at' => '2019-09-26 12:52:11',
            ),
            6 => 
            array (
                'id' => 7,
                'notifier_id' => 15,
                'notified_id' => 1,
                'subject' => 'Make New Order You Can Check It Now',
                'link' => 'http://localhost:8080/aghezty_php7/order/7',
                'seen' => 1,
                'created_at' => '2019-09-25 18:57:25',
                'updated_at' => '2019-09-26 12:52:11',
            ),
            7 => 
            array (
                'id' => 8,
                'notifier_id' => 15,
                'notified_id' => 1,
                'subject' => 'Make New Order You Can Check It Now',
                'link' => 'http://localhost:8080/aghezty_php7/order/8',
                'seen' => 1,
                'created_at' => '2019-09-25 18:59:04',
                'updated_at' => '2019-09-26 12:52:11',
            ),
            8 => 
            array (
                'id' => 9,
                'notifier_id' => 15,
                'notified_id' => 1,
                'subject' => 'Make New Order You Can Check It Now',
                'link' => 'http://localhost:8080/aghezty_php7/order/9',
                'seen' => 1,
                'created_at' => '2019-09-25 18:59:34',
                'updated_at' => '2019-09-26 12:52:11',
            ),
            9 => 
            array (
                'id' => 10,
                'notifier_id' => 15,
                'notified_id' => 1,
                'subject' => 'Make New Order You Can Check It Now',
                'link' => 'http://10.2.10.156:8080/aghezty_php7/order/10',
                'seen' => 1,
                'created_at' => '2019-09-25 19:52:47',
                'updated_at' => '2019-09-26 12:52:11',
            ),
            10 => 
            array (
                'id' => 11,
                'notifier_id' => 15,
                'notified_id' => 1,
                'subject' => 'New order  #11 ',
                'link' => 'http://localhost:8080/aghezty_php7/order/11',
                'seen' => 1,
                'created_at' => '2019-09-25 20:04:04',
                'updated_at' => '2019-09-26 12:52:11',
            ),
            11 => 
            array (
                'id' => 12,
                'notifier_id' => 15,
                'notified_id' => 1,
                'subject' => ' make New order  #12 ',
                'link' => 'http://localhost:8080/aghezty_php7/order/12',
                'seen' => 1,
                'created_at' => '2019-09-26 08:13:53',
                'updated_at' => '2019-09-26 12:52:11',
            ),
            12 => 
            array (
                'id' => 13,
                'notifier_id' => 15,
                'notified_id' => 1,
                'subject' => ' make New order  #13 ',
                'link' => 'http://localhost:8080/aghezty_php7/order/13',
                'seen' => 1,
                'created_at' => '2019-09-26 08:30:51',
                'updated_at' => '2019-09-26 12:52:11',
            ),
            13 => 
            array (
                'id' => 14,
                'notifier_id' => 15,
                'notified_id' => 1,
                'subject' => ' Make New order  #14 ',
                'link' => 'http://localhost:8080/aghezty_php7/order/14',
                'seen' => 1,
                'created_at' => '2019-09-26 08:39:45',
                'updated_at' => '2019-09-26 12:52:11',
            ),
            14 => 
            array (
                'id' => 15,
                'notifier_id' => 15,
                'notified_id' => 1,
                'subject' => ' Make New order  #15 ',
                'link' => 'http://localhost:8080/aghezty_php7/order/15',
                'seen' => 1,
                'created_at' => '2019-09-26 08:49:28',
                'updated_at' => '2019-09-26 12:52:11',
            ),
            15 => 
            array (
                'id' => 16,
                'notifier_id' => 15,
                'notified_id' => 1,
                'subject' => ' Make New order  #16 ',
                'link' => 'http://localhost:8080/aghezty_php7/order/16',
                'seen' => 1,
                'created_at' => '2019-09-26 10:32:21',
                'updated_at' => '2019-09-26 12:52:11',
            ),
            16 => 
            array (
                'id' => 17,
                'notifier_id' => 15,
                'notified_id' => 1,
                'subject' => ' Make New order  #17 ',
                'link' => 'http://localhost:8080/aghezty_php7/order/17',
                'seen' => 1,
                'created_at' => '2019-09-26 12:15:57',
                'updated_at' => '2019-09-26 12:52:11',
            ),
            17 => 
            array (
                'id' => 18,
                'notifier_id' => 15,
                'notified_id' => 1,
                'subject' => ' Make New order  #18 ',
                'link' => 'http://localhost:8080/aghezty_php7/order/18',
                'seen' => 1,
                'created_at' => '2019-09-26 12:35:41',
                'updated_at' => '2019-09-26 12:52:11',
            ),
        ));
        
        
    }
}