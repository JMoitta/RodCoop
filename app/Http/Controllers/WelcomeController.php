<?php

namespace App\Http\Controllers;

use App\Models\AdministrativeRegion;
use App\Models\Cooperator;
use App\Models\PrayingHouse;
use App\Models\CasterListItem;

use Carbon\Carbon;

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
    public function administrativeRegion(Request $request)
    {
        $administrativeRegion = AdministrativeRegion::find($request->input('administrative_region_id'));
        $allCooperator = \DB::table('cooperators')->select('cooperators.id', 'cooperators.name')
            ->join('caster_list_items', 'cooperators.id', '=', 'caster_list_items.cooperator_id')
            ->where('list_caster_id', '=', $administrativeRegion->active_caster_list_id)
            ->get();
        $listCooperator = array();
        foreach ($allCooperator as $cooperator) {
            $listCooperator[$cooperator->id] = $cooperator->name;
        }
        $allPrayingHouse = \DB::table('praying_houses')->select('praying_houses.id', 'praying_houses.locality')
            ->join('caster_list_items', 'praying_houses.id', '=', 'caster_list_items.praying_house_id')
            ->where('list_caster_id', '=', $administrativeRegion->active_caster_list_id)
            ->where('administrative_region_id', '=', $request->input('administrative_region_id'))->get();
        $listPrayingHouse = array();
        foreach ($allPrayingHouse as $prayingHouse) {
            $listPrayingHouse[$prayingHouse->id] = $prayingHouse->locality;
        }
        return view('administrative-region', compact('listCooperator', 'listPrayingHouse', 'administrativeRegion'));
    }

    public function cooperator(Request $request) 
    {
        $cooperator = Cooperator::find($request->input('cooperator_id'));
        $administrativeRegion = $cooperator->administrativeRegion;
        $casterListItems = CasterListItem::where('list_caster_id', '=', $administrativeRegion->active_caster_list_id)
            ->where('cooperator_id', '=', $cooperator->id)
            ->orderBy('date_caster', 'asc')->get();
        $carbon = new Carbon();
        $currentCaster = $casterListItems->filter(function ($casterListItem, $key) use($carbon) {
            return $carbon->year <= $casterListItem->date_caster->year
                && ( $carbon->month < $casterListItem->date_caster->month
                || ($carbon->month == $casterListItem->date_caster->month
                && $carbon->day <= $casterListItem->date_caster->day ));
        })->first();
        return view('cooperator', compact('cooperator', 'currentCaster', 'casterListItems'));
    }

    public function prayingHouse(Request $request) 
    {
        $prayingHouse = PrayingHouse::find($request->input('praying_house_id'));
        $administrativeRegion = $prayingHouse->administrativeRegion;
        $casterListItems = CasterListItem::where('list_caster_id', '=', $administrativeRegion->active_caster_list_id)
            ->where('praying_house_id', '=', $prayingHouse->id)
            ->orderBy('date_caster', 'asc')->get();
        $carbon = new Carbon();
        $currentCaster = $casterListItems->filter(function ($casterListItem, $key) use($carbon) {
            return $carbon->year <= $casterListItem->date_caster->year
                && ( $carbon->month < $casterListItem->date_caster->month
                || ($carbon->month == $casterListItem->date_caster->month
                && $carbon->day <= $casterListItem->date_caster->day ));
        })->first();
        return view('praying-house', compact('prayingHouse', 'currentCaster', 'casterListItems'));
    }
}
