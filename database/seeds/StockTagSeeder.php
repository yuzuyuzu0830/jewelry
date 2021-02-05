<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StockTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stock_cosmetic_tag')->insert([
            [
                'id' => 1,
                'stock_cosmetic_id' => '1',
                'tag_id' => '1',
            ],
            [
                'id' => 2,
                'stock_cosmetic_id' => '2',
                'tag_id' => '2',
            ],
            [
                'id' => 3,
                'stock_cosmetic_id' => '2',
                'tag_id' => '3',
            ],
            [
                'id' => 4,
                'stock_cosmetic_id' => '3',
                'tag_id' => '4',
            ],
        ]);
    }
}
