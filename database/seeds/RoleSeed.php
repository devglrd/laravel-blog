<?php

use Illuminate\Database\Seeder;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate();

        $no_confirm = [
            'role' => 'En attente de confirmation'
        ];
        $membre = [
            'role' => 'membre',
        ];
        $admin = [
          'role' => 'Admin'
        ];

        DB::table('roles')->insert($no_confirm);
        DB::table('roles')->insert($membre);
        DB::table('roles')->insert($admin);
    }
}
