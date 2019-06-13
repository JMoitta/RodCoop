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
            factory(Cooperator::class, 10)->make()->each(function(Cooperator $cooperator) use($administrativeRegion){
                $cooperator->administrative_region_id = $administrativeRegion->id;
                $cooperator->save();
            });
        }
        
    }
}
