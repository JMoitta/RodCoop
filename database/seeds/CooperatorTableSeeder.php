<?php

use App\Models\Cooperator;
use App\Models\AdministrativeRegion;
use Illuminate\Database\Seeder;

class CooperatorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $administrativeRegions = AdministrativeRegion::all();

        foreach($administrativeRegions as $administrativeRegion) {
            \Tenant::setTenant($administrativeRegion);
            factory(Cooperator::class, 25)->create();
        }
        
    }
}
