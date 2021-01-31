<?php

use Illuminate\Database\Seeder;

class NewItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\NewItem::class, 20)->create();
    }
}
