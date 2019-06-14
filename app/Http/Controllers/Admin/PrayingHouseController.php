<?php

namespace App\Http\Controllers\Admin;

use \App\Models\AdministrativeRegion;
use \App\Models\Cooperator;
use \App\Models\PrayingHouse;

use \App\Http\Requests\PrayingHouse\StorePrayingHouse;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrayingHouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listPrayerOfHouses = PrayingHouse::paginate(5);
        return view('admin.houses-of-prayer.index', \compact('listPrayerOfHouses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listAdministrativeRegion = AdministrativeRegion::pluck('description', 'id');
        $listCooperator = Cooperator::pluck('name', 'id');
        return view('admin.houses-of-prayer.create', compact('listAdministrativeRegion', 'listCooperator'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PrayingHouse\StorePrayingHouse  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrayingHouse $request)
    {
        PrayingHouse::create($request->all());
        return redirect()->route('admin.cooperators.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PrayingHouse  $prayingHouse
     * @return \Illuminate\Http\Response
     */
    public function show(PrayingHouse $prayingHouse)
    {
        return view('admin.houses-of-prayer.show', compact('prayingHouse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PrayingHouse  $prayingHouse
     * @return \Illuminate\Http\Response
     */
    public function edit(PrayingHouse $prayingHouse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PrayingHouse  $prayingHouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PrayingHouse $prayingHouse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PrayingHouse  $prayingHouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrayingHouse $prayingHouse)
    {
        //
    }
}
