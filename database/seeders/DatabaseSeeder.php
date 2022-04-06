<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\News;
use Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $category1 = Category::create(['title' => $faker->word]);
        $category2 = Category::create(['title' => $faker->word]);

        $news1 = News::create([

            'title' => $faker->word,
            'category_id' => $category1->id,
            'description'=>$faker->word,

        ]);
        $news2= News::create([

            'title' => $faker->word,
            'category_id' => $category1->id,
            'description'=>$faker->word,

        ]);

        $news3 =News::create([

            'title' => $faker->word,
            'category_id' => $category2->id,
            'description'=>$faker->word,

        ]);
        $news4 =News::create([

            'title' => $faker->word,
            'category_id' => $category2->id,
            'description'=>$faker->word,

        ]);


    }
}
