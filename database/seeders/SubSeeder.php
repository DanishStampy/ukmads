<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscriptions')->insert([
            'user_id' => 'S1',
            'quota' => 15,
            'subs_status' => 'YES',
        ]);

        DB::table('subscriptions')->insert([
            'user_id' => 'S2',
            'quota' => 15,
            'subs_status' => 'YES',
        ]);
    }
}
