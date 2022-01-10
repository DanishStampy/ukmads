<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
            'name' => 'Frunchie - Berry Combo',
            'type' => 'Food',
            'price' => '35',
            'seller_name' => 'Aisyah',
            'contact' => '0123456789',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'picture' => 'berrycombo.png',
            'status' => 'pending',
            'reads' => '0',
            'created_at' => Carbon::create(2021, 12, 24, 20, 18, 0)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::create(2021, 12, 24, 20, 18, 0)->format('Y-m-d H:i:s'),
        ]);

        DB::table('advertisements')->insert([
            'id_ads' => 'AD2',
            'creator_email' => 'staff@gmail.com',
            'name' => 'Nasi Lemak MB Combo',
            'type' => 'Food',
            'price' => '20',
            'seller_name' => 'Makiah',
            'contact' => '0123456789',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'picture' => 'marrybrown.jpg',
            'status' => 'verified',
            'reads' => '56',
            'created_at' => Carbon::create(2022, 01, 01, 16, 32, 0)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::create(2022, 01, 21, 17, 32, 0)->format('Y-m-d H:i:s'),
        ]);

        DB::table('advertisements')->insert([
            'id_ads' => 'AD3',
            'creator_email' => 'staff@gmail.com',
            'name' => 'Mellow Crunch',
            'type' => 'Food',
            'price' => '30',
            'seller_name' => 'Bok',
            'contact' => '0123456789',
            'description' => 'Get free limited edition mellow crunch paper bag.',
            'picture' => 'mellowcrunch.png',
            'reason' => 'not appropriate',
            'status' => 'rejected',
            'reads' => '0',
            'created_at' => Carbon::create(2022, 01, 03, 20, 45, 0)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::create(2022, 03, 05, 00, 45, 0)->format('Y-m-d H:i:s'),
        ]);

        DB::table('advertisements')->insert([
            'id_ads' => 'AD4',
            'creator_email' => 'staff@gmail.com',
            'name' => 'Mouthgasm Crunchy - Kokiss Combo 8',
            'type' => 'Food',
            'price' => '47',
            'seller_name' => 'Bok',
            'contact' => '0123456789',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'picture' => 'mouthgasmkokiss.png',
            'status' => 'verified',
            'reads' => '43',
            'created_at' => Carbon::create(2022, 01, 03, 20, 45, 0)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::create(2022, 01, 13, 15, 13, 0)->format('Y-m-d H:i:s'),
        ]);

        DB::table('advertisements')->insert([
            'id_ads' => 'AD5',
            'creator_email' => 'staff@gmail.com',
            'name' => 'Nasi Kandar MB',
            'type' => 'Food',
            'price' => '18',
            'seller_name' => 'Marry Brown',
            'contact' => '0123456789',
            'description' => 'Nasi kandar chicken with bendi and papadom.',
            'picture' => 'nasikandar.jpg',
            'status' => 'pending',
            'reads' => '0',
            'created_at' => Carbon::create(2022, 01, 03, 20, 45, 0)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::create(2022, 01, 03, 20, 45, 0)->format('Y-m-d H:i:s'),
        ]);

        DB::table('advertisements')->insert([
            'id_ads' => 'AD6',
            'creator_email' => 'staff@gmail.com',
            'name' => 'Rent House Area Bangi',
            'type' => 'Rental',
            'price' => '650',
            'seller_name' => 'Kaman',
            'contact' => '0123456789',
            'description' => '3 bilik tidur, 2 bilik air, berdekatan dengan sekolah, kedai-kedai etc.',
            'picture' => 'renthouse.jpg',
            'status' => 'verified',
            'reads' => '33',
            'created_at' => Carbon::create(2022, 01, 03, 20, 45, 0)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::create(2022, 02, 03, 11, 03, 0)->format('Y-m-d H:i:s'),
        ]);

        DB::table('advertisements')->insert([
            'id_ads' => 'AD7',
            'creator_email' => 'staff@gmail.com',
            'name' => 'Sticky Rice',
            'type' => 'Food',
            'price' => '8.20',
            'seller_name' => 'Niq',
            'contact' => '0123456789',
            'description' => 'Sticky rice with a delicious sweet kuah.',
            'picture' => 'stickyrice.jpg',
            'status' => 'draft',
            'reads' => '0',
            'created_at' => Carbon::create(2022, 01, 03, 20, 45, 0)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::create(2022, 01, 03, 20, 45, 0)->format('Y-m-d H:i:s'),
        ]);

        DB::table('advertisements')->insert([
            'id_ads' => 'AD8',
            'creator_email' => 'staff@gmail.com',
            'name' => "L'Oreal Paris Elvive Revive",
            'type' => 'Product',
            'price' => '67.90',
            'seller_name' => "L'Oreal Paris",
            'contact' => '0123456789',
            'description' => 'Shampoo set',
            'picture' => 'loreal.jpg',
            'status' => 'draft',
            'reads' => '0',
            'created_at' => Carbon::create(2022, 01, 03, 20, 45, 0)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::create(2022, 01, 03, 20, 45, 0)->format('Y-m-d H:i:s'),
        ]);
    }
}
