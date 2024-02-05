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
        Schema::create('like_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('like_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedTinyInteger('quantity');
            $table->foreign('like_id')
                ->references('id')
                ->on('likes')
                ->cascadeOnDelete();
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('like_product');
    }
};