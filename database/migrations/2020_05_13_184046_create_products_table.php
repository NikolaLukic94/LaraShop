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
            $table->text('name');
            $table->text('author')->nullable();
            $table->text('publisher')->nullable();
            $table->text('description')->nullable();
            $table->text('genre')->nullable();
            $table->integer('price')->nullable();
//            $table->string('color')->nullable();
//            $table->string('size')->nullable();
            $table->integer('quantity');
            $table->text('other_product_details')->nullable();

            $table->unsignedBigInteger('product_type_id');
            $table->foreign('product_type_id')->references('id')->on('product_types');

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
