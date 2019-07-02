<?php

use App\User;

use App\Models\AdministrativeRegion;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
            factory(User::class, 1)->create();
        }
    }
}
