<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->mediumText('image')->nullable();
            $table->string('title', 100);
            $table->unsignedBigInteger('user_id');
            $table->string('color', 100)->nullable();
            $table->string('brand', 100)->nullable();
            $table->integer('price')->nullable();
            $table->date('start')->nullable();
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
        Schema::dropIfExists('new_items');
    }
}