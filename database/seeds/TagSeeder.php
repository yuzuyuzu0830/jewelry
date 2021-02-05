<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert([
            [
                'id' => 1,
                'name' => 'かわいい',
            ],
            [
                'id' => 2,
                'name' => 'マスカラ',
            ],
            [
                'id' => 3,
                'name' => 'お気に入り',
            ],
        ]);
    }
}
