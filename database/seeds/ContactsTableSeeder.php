<?php

use Illuminate\Database\Seeder;

use App\Contact;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contacts = factory(App\Contact::class, 30)->create();
    }
}
