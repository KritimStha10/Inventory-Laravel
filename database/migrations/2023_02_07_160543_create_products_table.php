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
            $table->text('product_name');
            $table->unsignedBigInteger('cat_id');
            $table->unsignedBigInteger('com_id');
            $table->unsignedBigInteger('suppliers_id');
            $table->integer('quantity');
            $table->enum('status',['0','1','2'])->default('1');

            $table->foreign('cat_id')->references('id')->on('categories');
            $table->foreign('com_id')->references('id')->on('companies');
            $table->foreign('suppliers_id')->references('id')->on('suppliers');
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
