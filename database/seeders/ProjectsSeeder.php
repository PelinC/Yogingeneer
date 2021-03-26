<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fakerProject=Faker::create();
        $fakerProject->addProvider(new \Mmo\Faker\PicsumProvider($fakerProject));
        for($i=0;$i<6;$i++){
            $title=$fakerProject->sentence(3);
            DB::table('projects')->insert([
                'title'=>$title,
                'image'=>$fakerProject->picsumStaticRandomUrl(800, 400),
                'content'=>$fakerProject->paragraph(6),
                'git'=>'https://github.com/fzaninotto/Faker#fakerprovidermiscellaneous',
                'slug'=>str_slug($title),
                'created_at'=>$fakerProject->dateTime('now'),
                'updated_at'=>now(),


            ]);
        }
    }
}
