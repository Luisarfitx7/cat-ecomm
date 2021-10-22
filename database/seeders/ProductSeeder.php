<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str as Str;
use DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
            $name = $faker->sentence;
            $description = $faker->text(3000);
            $slug = Str::slug($name);
            DB::table('products')->insert([
                'name' => $name,
                'description' => $description,
                'slug' => $slug,
                'status' => 1,
                'price' => 89.0,
            ]);//
    }
}
