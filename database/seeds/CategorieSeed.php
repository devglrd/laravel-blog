<?php

use Faker\Factory;
use Illuminate\Database\Seeder;

class CategorieSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->truncate();

        $faker = Factory::create();

        for ($i=0;$i<100;$i++){
            $data[] =[
                'categorie'             =>  $faker->name(),
                'is_confirm'            => rand(0,1),
                'created_at'            =>  $faker->dateTime($max = 'now', $timezone = date_default_timezone_get()),
            ];
        }
        DB::table('categories')->insert($data);
    }
}
