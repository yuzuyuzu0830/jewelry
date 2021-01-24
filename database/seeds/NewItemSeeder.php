<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('new_items')->insert([
            [
                'id' => 1,
                'title' => 'リップ',
                'user_id' => 1,
                'color' => 'コーラルピンク',
                'brand' => 'エテュセ',
                'price' => 2400,
                'main_category' => 'リップメイク',
            ],
            [
                'id' => 2,
                'title' => 'マスカラ',
                'user_id' => 3,
                'color' => 'ブラウン',
                'brand' => 'キャンメイク',
                'price' => 1800,
                'main_category' => 'アイメイク',
            ],
            [
                'id' => 3,
                'title' => 'ネイルポリッシュ',
                'user_id' => 2,
                'color' => '桜色',
                'brand' => 'エクセル',
                'price' => 390,
                'main_category' => 'ネイル',
            ],
            [
                'id' => 4,
                'title' => 'コンシーラー',
                'user_id' => 4,
                'color' => '01',
                'brand' => 'メイベリン',
                'price' => 2100,
                'main_category' => 'ベースメイク',
            ],
        ]);
    }
}
