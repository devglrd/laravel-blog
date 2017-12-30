<?php

use Faker\Factory;
use Illuminate\Database\Seeder;

class PostSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->truncate();

        $faker = Factory::create();

        for ($i=0;$i<100;$i++){
            $title = $faker->sentence();
            $data[] =[
                'title'             =>  $title,
                'slug'              =>  str_slug($title),
                'content'           =>  $faker->text(),
                'url_img'           =>  '750x500',
                'is_confirm'        => rand(0,1),
                'fk_user'           =>  rand(1, 101),
                'fk_categorie'      =>  rand(1, 10),
                'created_at'        =>  $faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
            ];
        }
        DB::table('posts')->insert($data);

    }
}
