<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockCosmesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_cosmes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product', 100);
            $table->string('color', 100)->nullable();
            $table->string('brand', 100)->nullable();
            $table->integer('price')->length(6)->nullable();
            $table->date('purchaseDate')->nullable();
            $table->string('category');
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
        Schema::dropIfExists('stock_cosmes');
    }
}
