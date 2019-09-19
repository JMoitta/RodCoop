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
            if(rand(1, 2) == 1){
                $saturday = 'on';
            } else {
                $saturday = 'off';
            }
            if(rand(1, 2) == 1){
                $sunday = 'on';
            } else {
                $sunday = 'off';
            }
            if($sunday == 'off' && $saturday == 'off'){
                if(rand(1, 2) == 1){
                    $sunday = 'on';
                } else {
                    $saturday = 'on';
                }
            }
            $prayingHouse = factory(PrayingHouse::class, 1)->create([
                'cooperator_craft_id' => $cooperator->id,
                'administrative_region_id' => $cooperator->administrative_region_id,
                'saturday' => $saturday,
                'sunday' => $sunday
            ]);
        }
    }
}
