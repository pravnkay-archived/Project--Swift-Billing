<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfileSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile_settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('businessName');
            $table->string('address');
            $table->string('gstin', 15);
            $table->string('panNumber', 10);
            $table->string('placeOfOrigin', 50);
            $table->string('bankName', 50);
            $table->string('bankAccount', 50);
            $table->string('bankIfsc', 50);
            $table->string('bankBranch', 50);
            $table->text('logoPath');
            $table->timestamps();
		});
		
		Artisan::call('db:seed', array('--class' => 'ProfileSettingsTableSeeder'));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_settings');
    }
}
