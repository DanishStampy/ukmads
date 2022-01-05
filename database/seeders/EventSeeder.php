<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('events')->insert([
            'id_event' => 'EV1',
            'creator_email' => 'staff@gmail.com',
            'name' => 'Beach Summer Party',
            'location' => 'Port Dickson, Negeri Sembilan',
            'time' => "19:00:00",
            'date' => '2022-06-23',
            'organizer' => 'UTM',
            'contact' => '0123456789',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'picture' => 'beach.png',
            'join' => '0',
            'status' => 'pending',
            'created_at' => Carbon::create(2021, 12, 24, 20, 18, 0)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::create(2021, 12, 24, 20, 18, 0)->format('Y-m-d H:i:s'),
        ]);

        DB::table('events')->insert([
            'id_event' => 'EV2',
            'creator_email' => 'deezz@gmail.com',
            'name' => 'Coffee Morning Fundraising',
            'location' => 'Toronto, Canada',
            'time' => '11:00:00',
            'date' => '2022-06-23',
            'organizer' => 'UKM',
            'contact' => '0123456789',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'picture' => 'coffee.jpg',
            'join' => '68',
            'status' => 'verified',
            'created_at' => Carbon::create(2022, 01, 01, 16, 32, 0)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::create(2022, 01, 21, 17, 32, 0)->format('Y-m-d H:i:s'),
        ]);

        DB::table('events')->insert([
            'id_event' => 'EV3',
            'creator_email' => 'deezz@gmail.com',
            'name' => 'Elegant Event',
            'location' => 'Dewan Dectar',
            'time' => '20:00:00',
            'date' => '2022-07-31',
            'organizer' => 'UKM',
            'contact' => '0123456789',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'picture' => 'elegant.jpg',
            'reason' => 'not appropriate',
            'join' => '0',
            'status' => 'rejected',
            'created_at' => Carbon::create(2022, 01, 03, 20, 45, 0)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::create(2022, 03, 05, 00, 45, 0)->format('Y-m-d H:i:s'),
        ]);

        DB::table('events')->insert([
            'id_event' => 'EV4',
            'creator_email' => 'staff@gmail.com',
            'name' => 'Open Mic Night',
            'location' => 'Dewan Dectar',
            'time' => '20:30:00',
            'date' => '2022-08-31',
            'organizer' => 'Strings Bar',
            'contact' => '0123456789',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'picture' => 'openmic.jpg',
            'join' => '128',
            'status' => 'verified',
            'created_at' => Carbon::create(2022, 01, 03, 20, 45, 0)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::create(2022, 01, 13, 15, 13, 0)->format('Y-m-d H:i:s'),
        ]);

        DB::table('events')->insert([
            'id_event' => 'EV5',
            'creator_email' => 'staff@gmail.com',
            'name' => 'Running Event',
            'location' => 'Stadium Bukit Jalil, Shah Alam',
            'time' => '07:40:00',
            'date' => '2022-04-18',
            'organizer' => 'UKM',
            'contact' => '0123456789',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'picture' => 'running.jpg',
            'join' => '0',
            'status' => 'pending',
            'created_at' => Carbon::create(2022, 01, 03, 20, 45, 0)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::create(2022, 01, 03, 20, 45, 0)->format('Y-m-d H:i:s'),
        ]);

        DB::table('events')->insert([
            'id_event' => 'EV6',
            'creator_email' => 'staff@gmail.com',
            'name' => 'Music Festival - Electro Music Party',
            'location' => 'Dewan Dectar',
            'time' => Carbon::now(),
            'date' => Carbon::now()->format('Y-m-d'),
            'organizer' => 'reallygreatsite.com',
            'contact' => '0123456789',
            'description' => 'Normal music party smh.',
            'picture' => 'musicfest.jpg',
            'join' => '32',
            'status' => 'verified',
            'created_at' => Carbon::create(2022, 01, 03, 20, 45, 0)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::create(2022, 02, 03, 11, 03, 0)->format('Y-m-d H:i:s'),
        ]);

        DB::table('events')->insert([
            'id_event' => 'EV7',
            'creator_email' => 'staff@gmail.com',
            'name' => 'Summer Mix',
            'location' => 'Pulau Langkawi, Kedah',
            'time' => '19:00:00',
            'date' => '2022-06-15',
            'organizer' => 'victorystudents.com',
            'contact' => '0123456789',
            'description' => 'LETSS PARTYY',
            'picture' => 'summer.jpg',
            'join' => '0',
            'status' => 'rejected',
            'created_at' => Carbon::create(2022, 01, 03, 20, 45, 0)->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::create(2022, 01, 03, 20, 45, 0)->format('Y-m-d H:i:s'),
        ]);
    }
}
