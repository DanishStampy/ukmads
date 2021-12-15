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
            'id_ads' => 'Ad1',
            'creator_email' => 'staff@gmail.com',
            'name' => 'KFC Deals',
            'type' => 'Food',
            'price' => '30',
            'seller_name' => 'Aisyah',
            'contact' => '0123456789',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'picture' => 'img/kfc.jpg',
            'status' => 'pending'
        ]);
    }
}
