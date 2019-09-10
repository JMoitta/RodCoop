<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;

use App\Models\ListCaster;
use App\Models\PrayingHouse;
use App\Models\CasterListItem;
use App\Models\Cooperator;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Http\Controllers\Admin\Util\CooperatorUtil;
use App\Http\Controllers\Admin\Util\PrayingHouseUtil;
 
class ListCasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allListCasters = ListCaster::paginate(5);
        $administrativeRegion = \Tenant::getTenant();
        return view('admin.list-casters.index', \compact('allListCasters', 'administrativeRegion'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $listCaster = new listCaster();
        $listCaster->administrative_region_id = \Auth::user()->administrative_region_id;
        $listCaster->castor_user_id = \Auth::user()->id;
        $listCaster->save();
        
        $listPrayingHouse = PrayingHouse::all();

        $matriz = array();
        $index = 0;
        $size = $listPrayingHouse->count();
        foreach ($listPrayingHouse as $prayingHouse) {
            $vector = array();

            foreach ($listPrayingHouse as $prayingHouse) {
                array_push($vector, $prayingHouse);
            }

            for($i = 0; $i < $index; $i++){
                $prayingHouse = array_shift($vector);
                array_push($vector, $prayingHouse);
            }
            $index++;

            array_push($matriz, $vector);
        }

        $index = 0;
        while($index < $size) {
            $rand = array_rand($matriz, 1);
            $aux = $matriz[$rand];
            $matriz[$rand] = $matriz[$index];
            $matriz[$index] = $aux;
            $index++;
        }

        $index = 0;
        while($index < $size) {
            $rand = mt_rand(0, $size - 1);
            for($j = 0; $j < $size; $j++){
                $vector = $matriz[$j];
                $aux = $vector[$rand];
                $vector[$rand] = $vector[$index];
                $vector[$index] = $aux;
                $matriz[$j] = $vector;
            }
            $index++;
        }

        $monthTotal = $size - 1;
        $matrizSaturdayMonth = array();
        for($i = 0; $i < $monthTotal; $i++) {
            $vectorSaturdayMonth = array();
            array_push($matrizSaturdayMonth, $vectorSaturdayMonth);
        }
        $matrizCasterList = array();
		foreach($matriz as $vector) {
            $vectorCasterList = array();
            $vectorPrayingHouse = array_shift($vector);
            $nextMonth = Carbon::now();
            $nextMonth->addMonth();
            $i = 0;
            foreach( $vector as $prayingHouse ) {
                $firstSunday = $this->dayWeekMonth($nextMonth, Carbon::SUNDAY);
                $firstSaturday = $this->dayWeekMonth($nextMonth, Carbon::SATURDAY);
                $vectorSaturdayMonth = $matrizSaturdayMonth[$i];
                $nextMonth->addMonth();
                $casterListItem = new CasterListItem();
                $casterListItem->list_caster_id = $listCaster->id;
                $casterListItem->praying_house_id = $vectorPrayingHouse->id;
                $casterListItem->cooperator_id = $prayingHouse->cooperator_craft_id;
                if($vectorPrayingHouse->sunday == PrayingHouse::SUNDAY) {
                    $casterListItem->date_caster = $firstSunday;
                } else {
                    $casterListItem->date_caster = $firstSaturday;
                    array_push($vectorSaturdayMonth, $casterListItem);
                }
                array_push($vectorCasterList, $casterListItem);
                $matrizSaturdayMonth[$i] = $vectorSaturdayMonth;
                $i++;
            }
            array_push($matrizCasterList, $vectorCasterList);
        }
        
        $void = 0;
        for($j = 0; $j < $monthTotal; $j++) {
            $vectorSaturdayMonth = $matrizSaturdayMonth[$j];
            while(count($vectorSaturdayMonth) > $void ) {
                $casterListItem = array_shift($vectorSaturdayMonth);
                $casterListItem->date_caster = $this->dayWeekMonth($casterListItem->date_caster, Carbon::SATURDAY);
                $arrayPrayingHouse = array_filter($listPrayingHouse->toArray(), function($prayingHouse) use($casterListItem) {
                    return $prayingHouse['cooperator_craft_id'] == $casterListItem->cooperator_id;
                });
                $prayingHouse = array_shift($arrayPrayingHouse);
                for($i = 0; $i < $size; $i++) {
                    $nextCasterListItem = $matrizCasterList[$i][$j];
                    if($prayingHouse['id'] == $nextCasterListItem->praying_house_id && $prayingHouse['saturday'] == PrayingHouse::SATURDAY) {
                        array_push($vectorSaturdayMonth, $nextCasterListItem);
                    }
                }
            }
            $matrizSaturdayMonth[$j] = $vectorSaturdayMonth;
        }

        foreach($matrizCasterList as $vectorCasterList){
            foreach($vectorCasterList as $casterListItem){
                $casterListItem->save();
            }
        }
        return redirect()->route('admin.list-casters.index');
    }

    /**
     * Get the first day of the week of the month.
     *
     * @param  \Carbon\Carbon  $nextMonth
     * @param  \Carbon\Carbon  $carbonWeek
     * @return \Carbon\Carbon
     */
    private function dayWeekMonth($nextMonth, $carbonWeek) {
        $dayWeek = Carbon::create($nextMonth->year, $nextMonth->month, 1)->startOfWeek($carbonWeek);
        $dayWeek->hour = 19;
        $dayWeek->minute = 30;
        if($dayWeek->month < $nextMonth->month) {
            $dayWeek->addWeek();
        }
        return $dayWeek;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ListCaster  $listCaster
     * @return \Illuminate\Http\Response
     */
    public function show(ListCaster $listCaster)
    {
        $casterListItems = \DB::table('list_casters')
            ->join('caster_list_items', 'list_casters.id', '=', 'caster_list_items.list_caster_id')
            ->join('praying_houses', 'praying_houses.id', '=', 'caster_list_items.praying_house_id')
            ->join('cooperators', 'cooperators.id', '=', 'caster_list_items.cooperator_id')
            ->select('caster_list_items.date_caster','cooperators.id as cooperator_id', 'praying_houses.locality as praying_house',
                'cooperators.name as cooperator', 'praying_houses.id as praying_houses_id')
            ->where('list_casters.id', '=', $listCaster->id)
            ->orderBy('caster_list_items.date_caster', 'asc')
            ->get();
        
        $casterListItemsGroup = collect($casterListItems)->groupBy('praying_house');
        // dd($casterListItems);
        $listNameCooperator = CooperatorUtil::listNameCooperatorInListCaster($casterListItems);
        $listLocalityPrayingHouse = PrayingHouseUtil::listLocalityPrayingHouseInListCaster($casterListItems);
        // dd($listNameCooperator);
        return view('admin.list-casters.show', compact('listCaster', 'casterListItemsGroup', 'listNameCooperator', 'listLocalityPrayingHouse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ListCaster  $listCaster
     * @return \Illuminate\Http\Response
     */
    public function edit(ListCaster $listCaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ListCaster  $listCaster
     * @return \Illuminate\Http\Response
     */
    public function enable(ListCaster $listCaster)
    {
        $administrativeRegion = \Tenant::getTenant();
        $administrativeRegion->active_caster_list_id = $listCaster->id;
        $administrativeRegion->save();
        return redirect()->route('admin.list-casters.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ListCaster  $listCaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ListCaster $listCaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ListCaster  $listCaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(ListCaster $listCaster)
    {
        $listCaster->delete();
        return redirect()->route('admin.list-casters.index');
    }

    public function cooperator(ListCaster $listCaster, Request $request)
    {
        $cooperator = Cooperator::find($request->input('cooperator_id'));
        $casterListItems = CasterListItem::where('list_caster_id', '=', $listCaster->id)
            ->where('cooperator_id', '=', $cooperator->id)
            ->orderBy('date_caster', 'asc')->get();
        $carbon = new Carbon();
        $currentCaster = $casterListItems->filter(function ($casterListItem, $key) use($carbon) {
            return $carbon->year <= $casterListItem->date_caster->year
                && ( $carbon->month < $casterListItem->date_caster->month
                || ($carbon->month == $casterListItem->date_caster->month
                && $carbon->day <= $casterListItem->date_caster->day ));
        })->first();
        return view('admin.list-casters.cooperator', compact('listCaster', 'cooperator', 'currentCaster', 'casterListItems'));
    }

    public function prayingHouse(ListCaster $listCaster, Request $request) 
    {
        $prayingHouse = PrayingHouse::find($request->input('praying_house_id'));
        $casterListItems = CasterListItem::where('list_caster_id', '=', $listCaster->id)
            ->where('praying_house_id', '=', $prayingHouse->id)
            ->orderBy('date_caster', 'asc')->get();
        $carbon = new Carbon();
        $currentCaster = $casterListItems->filter(function ($casterListItem, $key) use($carbon) {
            return $carbon->year <= $casterListItem->date_caster->year
                && ( $carbon->month < $casterListItem->date_caster->month
                || ($carbon->month == $casterListItem->date_caster->month
                && $carbon->day <= $casterListItem->date_caster->day ));
        })->first();
        return view('admin.list-casters.praying-house', compact('listCaster', 'prayingHouse', 'currentCaster', 'casterListItems'));
    }
}
