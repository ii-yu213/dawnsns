<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
     /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
         //
     DB::table('users')->insert([
        [
           'username' => 'Yuki',
           'mail' => 'aaa@aaaa.com',
           'password' => Hash::make('aiueo'),
           'bio' => 'Hello',
           'images' => 'noimage',
           'created_at' => '2023-4-24 21:35:00',
           'updated_at' => '2023-4-24 21:35:00',
        ],
        ]);

    }
}
