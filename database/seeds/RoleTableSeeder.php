<?php

use Illuminate\Database\Seeder;

use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role              = new \App\Role();
        $role->name        = 'admin';
        $role->description = 'Admin';
        $role->save();


        $role             = new \App\Role();
        $role->name        = 'user';
        $role->description = 'User';
        $role->save();
    }
}
