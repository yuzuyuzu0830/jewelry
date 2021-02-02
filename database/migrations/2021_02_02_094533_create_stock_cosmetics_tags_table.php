<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockCosmeticsTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_cosmetics_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('stock_tag_id')->unsigned();
            $table->bigInteger('stock_cosmetic_id')->unsigned();
            $table->timestamps();

            $table->foreign('stock_tag_id')->references('id')->on('stock_tags')->onDelete('cascade');
            $table->foreign('stock_cosmetic_id')->references('id')->on('stock_cosmetics')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_cosmetics_tags');
    }
}
