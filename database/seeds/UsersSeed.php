<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();

        $data = [];

        $admin = [
            'name'       => "Admin",
            'password'   => bcrypt('admin'),
            'email'      => 'admin@gmail.com',
            'created_at' => now(),
            'fk_role'    => 3
        ];
        $data = [
            'name'       => "Membre",
            'password'   => bcrypt('password'),
            'email'      => 'membre@gmail.com',
            'created_at' => now(),
            'fk_role'    => 1
        ];

        DB::table('users')->insert($admin);
        DB::table('users')->insert($data);

    }
}
