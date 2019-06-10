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
        $this->call(AdministrativeRegionsTableSeeder::class);
        $this->call(CooperatorTableSeeder::class);
        $this->call(PrayingHousesTableSeeder::class);
    }
}
