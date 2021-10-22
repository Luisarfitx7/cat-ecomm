<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use DB;

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
            'name' => 'example'.Str::random(10),
            'email' => 'example'.Str::random(4).'@gmail.com',
            'password' => Hash::make('password'),
        ]);//
    }
}
