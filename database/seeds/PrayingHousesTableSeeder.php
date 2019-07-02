<?php

use App\Models\Cooperator;
use App\Models\PrayingHouse;

use Illuminate\Database\Seeder;

class PrayingHousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Tenant::setTenant(null);
        $cooperators = Cooperator::all();

        foreach($cooperators as $cooperator) {
            $prayingHouse = factory(PrayingHouse::class, 1)->create([
                'cooperator_craft_id' => $cooperator->id,
                'administrative_region_id' => $cooperator->administrative_region_id,
            ]);
        }
    }
}
