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
        $this->call(OptionalSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(CarSeeder::class);
    }
}
