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
        for ($i=0;$i<100;$i++){
            $data = [
                'name'       => "Membre" . $i,
                'password'   => bcrypt('password'),
                'email'      => $i . 'membre@gmail.com',
                'created_at' => now(),
                'fk_role'    => rand(1,2),
            ];
            DB::table('users')->insert($data);
        }
        DB::table('users')->insert($admin);

    }
}
