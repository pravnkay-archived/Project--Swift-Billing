<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'user')->first();
        $role_admin  = Role::where('name', 'admin')->first();

        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@pravnkay.com';
        $admin->password = bcrypt('Openme.16');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'User';
        $user->email = 'user@swiftbilling.com';
        $user->password = bcrypt('Openme.16');
        $user->save();
        $user->roles()->attach($role_user);

        // $users = factory(App\User::class, 28)->create();

        // Get all the roles
        $roles = App\Role::all();

        // Populate the pivot table
        App\User::whereNotIn('id', array(1, 2))->each(function ($user) use ($roles) { 
            $user->roles()->attach(rand(1, 2)); 
        });
    }
}
