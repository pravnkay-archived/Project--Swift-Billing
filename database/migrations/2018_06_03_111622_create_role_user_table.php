<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoleUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->increments('id')->index();
            $table->integer('role_id')->unsigned();
            $table->integer('user_id')->unsigned();
		});
		
		Artisan::call('db:seed', array('--class' => 'RoleTableSeeder'));

		Artisan::call('db:seed', array('--class' => 'UserTableSeeder'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('role_user');
    }
}
