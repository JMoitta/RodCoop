<?php

namespace App\Http\Controllers;

use App\Models\AdministrativeRegion;
use App\Models\Cooperator;
use App\Models\PrayingHouse;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allAdministrativeRegions = AdministrativeRegion::all();
        $listAdministrativeRegion = array();
        foreach ($allAdministrativeRegions as $administrativeRegion) {
            $listAdministrativeRegion[$administrativeRegion->id] = $administrativeRegion->description;
        }
        return view('welcome', compact('listAdministrativeRegion'));
    }

    /**
     * 
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function administrativeRegion(Request $request){
        $administrativeRegion = AdministrativeRegion::find($request->input('administrative_region_id'));
        $allCooperator = \DB::table('cooperators')->select('cooperators.id', 'cooperators.name')
            ->join('caster_list_items', 'cooperators.id', '=', 'caster_list_items.cooperator_id')
            ->where('list_caster_id', '=', $administrativeRegion->active_caster_list_id)
            ->get();
        $listCooperator = array();
        foreach ($allCooperator as $cooperator) {
            $listCooperator[$cooperator->id] = $cooperator->name;
        }
        $allPrayingHouse = PrayingHouse::where('administrative_region_id', '=', $request->input('administrative_region_id'))->get();
        $listPrayingHouse = array();
        foreach ($allPrayingHouse as $prayingHouse) {
            $listPrayingHouse[$prayingHouse->id] = $prayingHouse->locality;
        }
        return view('administrative-region', compact('listCooperator', 'listPrayingHouse'));
    }
}
