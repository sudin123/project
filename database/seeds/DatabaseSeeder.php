<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call('RoleSeed');
        $this->call('CitySeed');
        $this->call('PageSeed');
        $this->call('UserSeed');
        $this->call('CategorySeed');
    }
}
