<?php

use Illuminate\Database\Seeder;
use App\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['general', 'fun', 'sport','films','politics','automobiles'];

        foreach($categories as $category){
            $inputCategory = new Category();
            $inputCategory->topic=$category;
            $inputCategory->save();
        }



    }
}
