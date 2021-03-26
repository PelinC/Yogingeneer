<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//gonna use database
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=['DataScience','Yoga','Food','Travel'];
        foreach ($categories as $category) {
            DB::table('categories')->insert([
                'name'=>$category,
                'slug'=>str_slug($category),
                'created_at'=>now(),
                'updated_at'=>now(),
            ]);
        }

    }
}
