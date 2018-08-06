<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serialPrefix');
            $table->string('serialNumber');
            $table->date('issueDate');
            $table->date('dueDate');
            $table->string('placeOfSupply');
            $table->enum('invoiceStatus', ['quote', 'unpaid', 'partial', 'paid']);
            $table->string('discountType');
            $table->decimal('totalTaxableValue', 10, 2);
            $table->decimal('totalIgstValue', 10, 2);
            $table->decimal('totalCgstValue', 10, 2);
            $table->decimal('totalSgstValue', 10, 2);
            $table->decimal('totalCessValue', 10, 2);
            $table->decimal('netValue', 10, 2);
            $table->enum('roundOffState', ['on', 'off'])->default('off');
            $table->decimal('roundOffValue', 4, 2);
            $table->decimal('grandValue', 12, 2);
            $table->decimal('amountRecieved', 12, 2);
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
        Schema::dropIfExists('invoices');
    }
}
