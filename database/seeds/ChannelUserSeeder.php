<?php

use Illuminate\Database\Seeder;

class ChannelUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('channel_users')->insert([
          'user_id' => 1,
          'channel_id' => 1,
        ]);

        DB::table('channel_users')->insert([
          'user_id' => 2,
          'channel_id' => 1,
        ]);

        DB::table('channel_users')->insert([
          'user_id' => 3,
          'channel_id' => 1,
        ]);

        DB::table('channel_users')->insert([
          'user_id' => 4,
          'channel_id' => 2,
        ]);
    }
}
