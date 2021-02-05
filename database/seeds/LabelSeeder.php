<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('labels')->insert([
            [
                'id' => 1,
                'name' => 'ファンデーション',
            ],
            [
                'id' => 2,
                'name' => 'アイライナー',
            ],
            [
                'id' => 3,
                'name' => 'ベストバイ',
            ],
        ]);
    }
}
