<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('done_tasks')->insert([
            [
                'id' => 2,
                'title' => 'ブラシ洗浄',
                'user_id' => 11,
                'start' => time(),
                'textColor' => '#000000',
            ],
            [
                'id' => 3,
                'title' => 'パフ洗浄',
                'user_id' => 1,
                'start' => time(),
                'textColor' => '#000000',
            ],
            [
                'id' => 4,
                'title' => 'ピーリング',
                'user_id' => 11,
                'start' => time(),
                'textColor' => '#000000',
            ],
            [
                'id' => 5,
                'title' => '顔のパック',
                'user_id' => 2,
                'start' => time(),
                'textColor' => '#000000',
            ],
        ]);
    }
}
