<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('nama', 100);
            $table->mediumText('deskripsi');
            $table->bigInteger('harga');
            $table->string('stok', 100)->nullable();
            $table->string('foto', 100)->nullable();
            $table->unsignedBigInteger('product_categories_id')->nullable();
            $table->foreign('product_categories_id')->references('id')->on('product_categories');
            $table->unsignedBigInteger('business_id')->nullable();
            $table->foreign('business_id')->references('id')->on('business');
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
        Schema::dropIfExists('products');
    }
}
