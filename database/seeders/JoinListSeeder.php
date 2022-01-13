<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class JoinListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach(range(1,10) as $index) {
            DB::table('join_lists')->insert([
                'id_event' => 'EV4',
                'guest_email' => $faker->freeEmail(),
                'guest_name' => $faker->name(),
                'guest_contact' => '60'.$faker->randomNumber(9),
                'created_at' => Carbon::now()->subHours($faker->numberBetween(1,128))
            ]);

            DB::table('join_lists')->insert([
                'id_event' => 'EV6',
                'guest_email' => $faker->freeEmail(),
                'guest_name' => $faker->name(),
                'guest_contact' => '60'.$faker->randomNumber(9),
                'created_at' => Carbon::now()->subHours($faker->numberBetween(1,128))
            ]);

        }
    }
}
