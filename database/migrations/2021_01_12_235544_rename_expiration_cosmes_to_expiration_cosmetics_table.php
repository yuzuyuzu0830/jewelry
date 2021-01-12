<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameExpirationCosmesToExpirationCosmeticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('expiration_cosmetics', function (Blueprint $table) {
            //
            Schema::rename('expiration_cosmes', 'expiration_cosmetics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('expiration_cosmetics', function (Blueprint $table) {
            //
            Schema::rename('expiration_cosmes', 'expiration_cosmetics');
        });
    }
}
