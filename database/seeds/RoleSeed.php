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
        DB::table('roles')->delete();

        \App\Role::create([
            'name'   => 'buyer'
        ]);

        \App\Role::create([
            'name'   => 'seller'
        ]);

        \App\Role::create([
            'name'   => 'vendor'
        ]);

        \App\Role::create([
            'name'   => 'administrator'
        ]);
    }
}
