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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('products_id');
            $table->text('batch_no');
            $table->unsignedBigInteger('suppliers_id');
            $table->integer('quantity');
            $table->float('price_per_unit');
            $table->float('total_price');
            $table->date('date')->nullable()->default(null);
            $table->enum('status',['0','1','2'])->default('1');

            $table->foreign('products_id')->references('id')->on('products');
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
        Schema::dropIfExists('purchases');
    }
};
