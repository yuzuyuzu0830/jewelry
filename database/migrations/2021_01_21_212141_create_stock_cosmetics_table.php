<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockCosmeticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_cosmetics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumText('image')->nullable();
            $table->string('product', 100);
            $table->unsignedBigInteger('user_id');
            $table->string('color', 100)->nullable();
            $table->string('brand', 100)->nullable();
            $table->integer('price')->nullable();
            $table->date('purchaseDate')->nullable();
            $table->string('main_category');
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
        Schema::dropIfExists('stock_cosmetics');
    }
}
