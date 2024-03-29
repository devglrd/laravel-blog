<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeed::class);
        $this->call(RoleSeed::class);
        $this->call(CategorieSeed::class);
        $this->call(PostSeed::class);
    }
}
