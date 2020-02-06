
<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[];
        $faker = Faker::create();
        for($i=0; $i < 6; $i++) {
            $data= [
                "name" =>$faker->name ,
                "email" => $faker->email,
                "email_verified_at" => date('Y-m-d H:i:s'),
                "password" => \Hash::make("admin"),
                "created_at" => date('Y-m-d H:i:s'),
                "updated_at" => date('Y-m-d H:i:s'),
                "role" => "guest",
            ];
            \DB::table('users')->insert($data);
        }
    }
}
