<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->require();
            $table->string('product_description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('gallery')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable(); 
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('color')->nullable();
            $table->string('size')->nullable();
            $table->string('classify')->nullable();
            $table->decimal('price',12,4);
            $table->unsignedInteger('quantity')->default(1);
            $table->unsignedInteger('purchases')->default(0);
            $table->tinyInteger('is_active')->default(1);
            $table->timestamps();

            $table->foreign('brand_id')->references('id')->on('brand');
            $table->foreign('category_id')->references('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
}
