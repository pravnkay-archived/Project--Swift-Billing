<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->text('description');
            $table->enum('type',['goods', 'service']);
            $table->char('hsn', 15);
            $table->char('sku', 15);
            $table->char('unit', 30);
            $table->decimal('saleValue', 10, 2);
            $table->decimal('discountRate', 4, 2);
            $table->decimal('taxRate', 4, 2);
            $table->decimal('cessValue', 10, 2);
            $table->timestamps();
        });

        // Artisan::call('db:seed', array('--class' => 'ProductsTableSeeder'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
