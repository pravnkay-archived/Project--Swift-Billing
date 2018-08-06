<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Role comes before User seeder here.
        $this->call(RoleTableSeeder::class);
        // User seeder will use the roles above created.
        $this->call(UserTableSeeder::class);

        $this->call(ContactsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ProfileSettingsTableSeeder::class);
        $this->call(InvoiceSettingsTableSeeder::class);
    }
}
