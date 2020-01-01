<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('clients')->delete();

        \DB::table('clients')->insert(array (
            0 =>
            array (
                'id' => 1,
                'name' => 'Bertha Stehr IV',
                'email' => 'kunze.aniya@example.net',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'image' => '/uploads/clients/2019-09-11/e46b57dd660c17cdf321c0143f4214a8.jpg',
                'phone' => 'lIqezN6ME6',
                'home_telphone' => 'tt22O3YMKC',
                'remember_token' => 'J8bHaL7BR5',
                'created_at' => '2019-09-11 08:32:36',
                'updated_at' => '2019-09-11 08:32:36',
            ),
            1 =>
            array (
                'id' => 2,
                'name' => 'Dr. Darby Nader DDS',
                'email' => 'gail.connelly@example.org',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'image' => '/uploads/clients/2019-09-11/dc0b6affba205a9b0351ceb3fcb3e692.jpg',
                'phone' => 'KO8J8BpcaZ',
                'home_telphone' => 'hB18jZBsoA',
                'remember_token' => 'JBCbisoldA',
                'created_at' => '2019-09-11 08:32:36',
                'updated_at' => '2019-09-11 08:32:36',
            ),
            2 =>
            array (
                'id' => 3,
                'name' => 'Yvonne Bednar',
                'email' => 'ramiro.collier@example.com',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'image' => '/uploads/clients/2019-09-11/d3305f4955635664927cc1b48295b7ec.jpg',
                'phone' => 'Imv73M6AuG',
                'home_telphone' => 'abkP8UAA1l',
                'remember_token' => 'S9rORwqKGD',
                'created_at' => '2019-09-11 08:32:36',
                'updated_at' => '2019-09-11 08:32:36',
            ),
            3 =>
            array (
                'id' => 4,
                'name' => 'Dr. Kirk Sawayn III',
                'email' => 'geovanny85@example.net',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'image' => '/uploads/clients/2019-09-11/ca042d4798365395c040a53741bc33a0.jpg',
                'phone' => '13PxM6sKFa',
                'home_telphone' => 'zbxAsfelE1',
                'remember_token' => 'ewmxS8XwCm',
                'created_at' => '2019-09-11 08:32:36',
                'updated_at' => '2019-09-11 08:32:36',
            ),
            4 =>
            array (
                'id' => 5,
                'name' => 'Barbara Cartwright',
                'email' => 'orval.kulas@example.net',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'image' => '/uploads/clients/2019-09-11/a4d45a61b080b6c2384b8752f9e83ed1.jpg',
                'phone' => 'UCNlOBhilU',
                'home_telphone' => '3RwpL4lxmU',
                'remember_token' => 'IH8StZ0PLX',
                'created_at' => '2019-09-11 08:32:36',
                'updated_at' => '2019-09-11 08:32:36',
            ),
            5 =>
            array (
                'id' => 6,
                'name' => 'Frieda Littel',
                'email' => 'gdickens@example.org',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'image' => '/uploads/clients/2019-09-11/1fe8c60826b5fb232113fb27293bb14c.jpg',
                'phone' => 'zfMZfEONUB',
                'home_telphone' => 'E9tOgRvOWe',
                'remember_token' => 'zu0kTpIk8N',
                'created_at' => '2019-09-11 08:32:36',
                'updated_at' => '2019-09-11 08:32:36',
            ),
            6 =>
            array (
                'id' => 7,
                'name' => 'Jazmyn Weimann',
                'email' => 'sschowalter@example.com',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'image' => '/uploads/clients/2019-09-11/e7e2541334d868d86d7caa7f0e6a0cc4.jpg',
                'phone' => 'FHzYSn7jOy',
                'home_telphone' => 'ARYBM2dvc3',
                'remember_token' => 'DyFMjnloYW',
                'created_at' => '2019-09-11 08:32:36',
                'updated_at' => '2019-09-11 08:32:36',
            ),
            7 =>
            array (
                'id' => 8,
                'name' => 'Orville Hudson DDS',
                'email' => 'fabiola.blanda@example.net',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'image' => '/uploads/clients/2019-09-11/3ee345bcf7b6c9b6db5b09c703bf9dd6.jpg',
                'phone' => 'xXpTX0uoEl',
                'home_telphone' => 'ZK7cvv0eos',
                'remember_token' => 'BuuPI3lYYn',
                'created_at' => '2019-09-11 08:32:36',
                'updated_at' => '2019-09-11 08:32:36',
            ),
            8 =>
            array (
                'id' => 9,
                'name' => 'Dallin Wilderman',
                'email' => 'demetrius11@example.com',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'image' => '/uploads/clients/2019-09-11/8c7faadc32bf34de03cb6683fb8f0bab.jpg',
                'phone' => '1n5nucyVWR',
                'home_telphone' => 'W7eOsIMZ8W',
                'remember_token' => 'd32K2n5uEM',
                'created_at' => '2019-09-11 08:32:36',
                'updated_at' => '2019-09-11 08:32:36',
            ),
            9 =>
            array (
                'id' => 10,
                'name' => 'Dr. Joey Quigley III',
                'email' => 'royal87@example.net',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'image' => '/uploads/clients/2019-09-11/6859e9317a807f794bd1a449573a8b96.jpg',
                'phone' => 'uow6wyVEDG',
                'home_telphone' => 'jOrrV0bKqr',
                'remember_token' => 'BKlh0PeWbH',
                'created_at' => '2019-09-11 08:32:37',
                'updated_at' => '2019-09-11 08:32:37',
            ),
            10 =>
            array (
                'id' => 11,
                'name' => 'mohamed mafddfh',
                'email' => 'ali@ivasfdf.com',
                'password' => '$2y$10$lHdWMEc5B/MNiePAxVsqTuzvWwBmF8u0B9sSCCTE6CSvkkUzin6ye',
                'image' => '/uploads/clients/2019-09-11/1568198321902.png',
                'phone' => '01128df0235',
                'home_telphone' => '12465',
                'remember_token' => 'cweE0kaTdZ3dCgJqZcaJzBsp1AtSi6xWpzRjoU7YRt4bIu4t0OurZrU91kXi',
                'created_at' => '2019-09-11 08:34:38',
                'updated_at' => '2019-09-11 10:46:54',
            ),
            11 =>
            array (
                'id' => 12,
                'name' => 'nedde client',
                'email' => 'mahmoud@yahoo.com',
                'password' => '$2y$10$QIWxX8ygsIoW7QQayRGxK.7jWv8bEcu.CD7MG/b78hkKIchBdIyOO',
                'image' => '/uploads/clients/2019-09-11/1568217010502.png',
                'phone' => '123456',
                'home_telphone' => '1323466',
                'remember_token' => 'CQJWfbzNe4JwuoCNylVnYE4TwOcTKluQBOKEkvMDgFmsCNMoF9ilZWoB3NBB',
                'created_at' => '2019-09-11 12:54:54',
                'updated_at' => '2019-09-11 15:51:59',
            ),
            12 =>
            array (
                'id' => 15,
                'name' => 'mohamed',
                'email' => 'mh124404@gmail.com',
                'password' => '$2y$10$gGlFSGhRm.Bex8En4mYce.gsO9WZn/Kxb2uKveRRPHVDMbQ1VemfO',
                'image' => '/uploads/clients/2019-09-26/156950988763.png',
                'phone' => '01128023501',
                'home_telphone' => '24682412',
                'remember_token' => 't8rG8xPWuunyBOsnpucQOX0dTRZFaR5HF9ErZPFkmQLM4foXivCYw8Zp7f2b',
                'created_at' => '2019-09-25 17:41:32',
                'updated_at' => '2019-09-26 09:41:02',
            ),
        ));


    }
}
