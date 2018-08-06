<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoiceProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_id');
            $table->integer('invoiceSerial');
            $table->text('description');
            $table->enum('type',['goods', 'service'])->default('goods');
            $table->char('hsn', 15);
            $table->decimal('quantity', 8, 2);
            $table->char('unit', 30);
            $table->decimal('saleValue', 10, 2);
            $table->decimal('discountRate', 4, 2);
            $table->decimal('discountValue', 10, 2);
            $table->decimal('taxableValue', 10, 2);
            $table->decimal('taxRate', 4, 2);
            $table->decimal('igstRate', 4, 2);
            $table->decimal('igstValue', 10, 2);
            $table->decimal('cgstRate', 4, 2);
            $table->decimal('cgstValue', 10, 2);
            $table->decimal('sgstRate', 4, 2);
            $table->decimal('sgstValue', 10, 2);
            $table->decimal('cessRate', 4, 2);
            $table->decimal('cessValue', 10, 2);
            $table->decimal('grossValue', 10, 2);
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
        Schema::dropIfExists('invoice_products');
    }
}
