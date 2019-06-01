<?php

use Illuminate\Database\Seeder;

class AdministrativeRegionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id = 1;
        $listAdministrativeRegion = factory(App\Models\AdministrativeRegion::class, 7)->make();
        foreach( $listAdministrativeRegion as $administrativeRegion){
            $administrativeRegion->description = $administrativeRegion->description . $id;
            $id = $id + 1;
            $administrativeRegion->save();
        }
    }
}
