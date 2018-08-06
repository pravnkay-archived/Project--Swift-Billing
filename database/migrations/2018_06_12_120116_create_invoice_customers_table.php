<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_customers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_id');
            $table->string('name', 100);
            $table->string('gstin', 15);
            $table->string('mobile', 14);
            $table->string('billingAddress', 250);
            $table->string('shippingAddress', 250);
            $table->enum('sameAsBilling', ['on', 'off'])->default('off');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice_customers');
    }
}
