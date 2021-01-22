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
        DB::table('stock_cosmetics')->insert([
            [
                'id' => 1,
                'product' => 'マスカラ',
                'user_id' => 1,
                'color' => 'ピンク',
                'price' => 1200,
                'main_category' => 3,
            ],
            [
                'id' => 2,
                'product' => 'リップ',
                'user_id' => 3,
                'color' => 'レッド',
                'price' => 1200,
                'main_category' => 4,
            ],
            [
                'id' => 3,
                'product' => 'アイライナー',
                'user_id' => 2,
                'color' => 'ブラウン',
                'price' => 1800,
                'main_category' => 2,
            ],
            [
                'id' => 4,
                'product' => 'マニュキア',
                'user_id' => 2,
                'color' => 'ブルー',
                'price' => 390,
                'main_category' => 5,
            ]
        ]);
    }
}
