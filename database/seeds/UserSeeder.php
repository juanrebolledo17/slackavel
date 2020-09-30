<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          'firstname' => 'admin',
          'lastname' => 'istrator',
          'username' => 'admin',
          'email' => 'admin@admin.com',
          'online' => false,
          'password' => Hash::make('4682726'),
        ]);

        DB::table('users')->insert([
          'firstname' => 'juan',
          'lastname' => 'rebolledo',
          'username' => 'juanr',
          'email' => 'juanjoserebolledo17@outlook.com',
          'online' => false,
          'password' => Hash::make('4682726'),
        ]);

        DB::table('users')->insert([
          'firstname' => 'declan',
          'lastname' => 'harp',
          'username' => 'declanH',
          'email' => 'declanharp@gmail.com',
          'online' => false,
          'password' => Hash::make('4682726'),
        ]);

        DB::table('users')->insert([
          'firstname' => 'bruce',
          'lastname' => 'wayne',
          'username' => 'BruceW',
          'email' => 'batman@gmail.com',
          'online' => false,
          'password' => Hash::make('4682726'),
        ]);
    }
}
