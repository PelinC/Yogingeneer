<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        $faker->addProvider(new \Mmo\Faker\PicsumProvider($faker));
        for($i=0;$i<4;$i++){
            $title=$faker->sentence(3);
            DB::table('posts')->insert([
                'category_id'=>rand(1,4),
                'title'=>$title,
                'image'=>$faker->picsumStaticRandomUrl(800, 400),
                'content'=>$faker->paragraph(6),
                'slug'=>str_slug($title),
                'created_at'=>$faker->dateTime('now'),
                'updated_at'=>now(),


            ]);
        }
    }
}
