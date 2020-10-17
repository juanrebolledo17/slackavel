<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChannelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('channels')->insert([
          'channel_name' => 'general',
          'channel_description' => 'The general discussion channel.',
          'creator_id' => 1,
        ]);

        DB::table('channels')->insert([
          'channel_name' => 'FAQ',
          'channel_description' => 'Frequently asked questions channel.',
          'creator_id' => 2,
        ]);

        DB::table('channels')->insert([
          'channel_name' => 'Vuejs',
          'channel_description' => 'Vuejs discussion channel.',
          'creator_id' => 2,
        ]);

        DB::table('channels')->insert([
          'channel_name' => 'Laravel',
          'channel_description' => 'Laravel Discussion channel.',
          'creator_id' => 2,
        ]);
    }
}
