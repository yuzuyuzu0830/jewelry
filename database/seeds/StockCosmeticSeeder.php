<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockCosmeticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\StockCosmetic::class, 50)->create();
    }
}
