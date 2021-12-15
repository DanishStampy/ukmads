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
            'name' => 'KFC Deals',
            'location' => 'Dewan Dectar',
            'time' => Carbon::now(),
            'date' => Carbon::now()->format('Y-m-d'),
            'organizer' => 'ARVIS',
            'contact' => '0123456789',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'picture' => 'img/kfc.jpg',
            'status' => 'pending'
        ]);

        DB::table('events')->insert([
            'id_event' => 'EV2',
            'creator_email' => 'staff@gmail.com',
            'name' => 'KFC Deals2',
            'location' => 'Dewan Dectar',
            'time' => Carbon::now(),
            'date' => Carbon::now()->format('Y-m-d'),
            'organizer' => 'ARVIS',
            'contact' => '0123456789',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'picture' => 'img/kfc.jpg',
            'status' => 'verified'
        ]);

        DB::table('events')->insert([
            'id_event' => 'EV3',
            'creator_email' => 'staff@gmail.com',
            'name' => 'KFC Deals3',
            'location' => 'Dewan Dectar',
            'time' => Carbon::now(),
            'date' => Carbon::now()->format('Y-m-d'),
            'organizer' => 'ARVIS',
            'contact' => '0123456789',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'picture' => 'img/kfc.jpg',
            'status' => 'rejected'
        ]);

        DB::table('events')->insert([
            'id_event' => 'EV4',
            'creator_email' => 'staff@gmail.com',
            'name' => 'KFC Deals4',
            'location' => 'Dewan Dectar',
            'time' => Carbon::now(),
            'date' => Carbon::now()->format('Y-m-d'),
            'organizer' => 'ARVIS',
            'contact' => '0123456789',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'picture' => 'img/kfc.jpg',
            'status' => 'pending'
        ]);

        DB::table('events')->insert([
            'id_event' => 'EV5',
            'creator_email' => 'staff@gmail.com',
            'name' => 'KFC Deals5',
            'location' => 'Dewan Dectar',
            'time' => Carbon::now(),
            'date' => Carbon::now()->format('Y-m-d'),
            'organizer' => 'ARVIS',
            'contact' => '0123456789',
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
            'picture' => 'img/kfc.jpg',
            'status' => 'pending'
        ]);
    }
}
