<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('advertisements')->insert([
            'id_ads' => 'AD1',
            'creator_email' => 'staff@gmail.com',
            'name' => 'KFC Deals',
            'type' => 'Food',
            'price' => '30',
            'seller_name' => 'Aisyah',
            'contact' => '0123456789',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'picture' => 'kfc.jpg',
            'status' => 'pending'
        ]);

        DB::table('advertisements')->insert([
            'id_ads' => 'AD2',
            'creator_email' => 'staff@gmail.com',
            'name' => 'KFC Deals2',
            'type' => 'Food',
            'price' => '30',
            'seller_name' => 'Aisyah',
            'contact' => '0123456789',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'picture' => 'kfc.jpg',
            'status' => 'verified'
        ]);

        DB::table('advertisements')->insert([
            'id_ads' => 'AD3',
            'creator_email' => 'staff@gmail.com',
            'name' => 'KFC Deals3',
            'type' => 'Food',
            'price' => '30',
            'seller_name' => 'Aisyah',
            'contact' => '0123456789',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'picture' => 'kfc.jpg',
            'reason' => 'not appropriate',
            'status' => 'rejected'
        ]);

        DB::table('advertisements')->insert([
            'id_ads' => 'AD4',
            'creator_email' => 'staff@gmail.com',
            'name' => 'KFC Deals4',
            'type' => 'Food',
            'price' => '30',
            'seller_name' => 'Aisyah',
            'contact' => '0123456789',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'picture' => 'kfc.jpg',
            'status' => 'pending'
        ]);

        DB::table('advertisements')->insert([
            'id_ads' => 'AD5',
            'creator_email' => 'staff@gmail.com',
            'name' => 'KFC Deals5',
            'type' => 'Food',
            'price' => '30',
            'seller_name' => 'Aisyah',
            'contact' => '0123456789',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'picture' => 'kfc.jpg',
            'status' => 'pending'
        ]);

        DB::table('advertisements')->insert([
            'id_ads' => 'AD6',
            'creator_email' => 'staff@gmail.com',
            'name' => 'Mouthgasm Crunchy',
            'type' => 'Food',
            'price' => '47',
            'seller_name' => 'Aisyah',
            'contact' => '0123456789',
            'description' => 'Kokiss combo S.',
            'picture' => 'mouthgasmkokiss.png',
            'status' => 'draft'
        ]);

        DB::table('advertisements')->insert([
            'id_ads' => 'AD7',
            'creator_email' => 'staff@gmail.com',
            'name' => 'Berry Combo',
            'type' => 'Food',
            'price' => '35',
            'seller_name' => 'Aisyah',
            'contact' => '0123456789',
            'description' => 'Got berry cookies and berry crunch with a freegift.',
            'picture' => 'berrycombo.png',
            'status' => 'draft'
        ]);
    }
}
