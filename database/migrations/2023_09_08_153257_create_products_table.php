<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('product_name');
            $table->text('product_short_description');
            $table->text('product_long_description');
            $table->integer('product_price');
            $table->string('product_category_name');
            $table->string('product_subcategory_name');
            $table->integer('product_subcategory_id');
            $table->integer('product_category_id');
            $table->string('product_image');
            $table->integer('product_qty');
            $table->string('slug');
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
};