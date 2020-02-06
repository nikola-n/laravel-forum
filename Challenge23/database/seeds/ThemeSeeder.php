<?php

use Illuminate\Database\Seeder;
use App\Theme;
use Faker\Factory as Faker;
class ThemeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for($i = 0; $i < 6; $i++){
            DB::table("themes")->insert([
                "title" => $faker->sentence,
                "image"=> "https://clipartart.com/images/manchester-united-logo-clipart-512x512-2.jpg",
                "description"=> $faker->text,
                "users_id"=>rand(1,6),
                "categories_id"=>rand(1,6),
                "status"=>"Unapproved",
            ]);
        }
    }
}
