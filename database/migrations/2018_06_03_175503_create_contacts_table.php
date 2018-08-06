<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('gstin', 15);
            $table->string('country', 10);
            $table->string('state', 50);
            $table->string('person', 100);
            $table->string('mobile', 14);
            $table->string('pan', 10);
            $table->string('address', 200);
            $table->string('pincode', 6);
            $table->string('city', 50);
            $table->string('email', 50);
            $table->timestamps();
		});
		
		// Artisan::call('db:seed', array('--class' => 'ContactsTableSeeder'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
