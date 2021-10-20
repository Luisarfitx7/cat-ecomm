<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) {
            $faker = Faker\Factory::create();
            DB::table('products')->insert([
            'name' => Str::random(10),
            'description' => Str::random(10).'@gmail.com',
            'slug' => Str::random(10).'@gmail.com',
            'status' => Hash::make('password'),
        ]);//
        }
    }
}
