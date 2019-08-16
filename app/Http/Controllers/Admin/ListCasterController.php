<?php

namespace App\Http\Controllers\Admin;

use App\Models\ListCaster;
use App\Models\PrayingHouse;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

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

        dd($matriz);
        $listCaster->save();
        return redirect()->route('admin.list-casters.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ListCaster  $listCaster
     * @return \Illuminate\Http\Response
     */
    public function show(ListCaster $listCaster)
    {
        //
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
}
