<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewLabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('label_new_item')->insert([
            [
                'id' => 1,
                'new_item_id' => '1',
                'label_id' => '1',
            ],
            [
                'id' => 2,
                'new_item_id' => '2',
                'label_id' => '2',
            ],
            [
                'id' => 3,
                'new_item_id' => '2',
                'label_id' => '3',
            ],
            [
                'id' => 4,
                'new_item_id' => '3',
                'label_id' => '4',
            ],
        ]);
    }
}
