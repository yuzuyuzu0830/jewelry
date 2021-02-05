<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(StockCosmeticSeeder::class);
        $this->call(NewItemSeeder::class);
        $this->call(TagSeeder::class);
        $this->call(StockTagSeeder::class);
        $this->call(LabelSeeder::class);
        $this->call(NewLabelSeeder::class);
    }
}
