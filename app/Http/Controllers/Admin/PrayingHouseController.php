<?php

namespace App\Http\Controllers\Admin;

use \App\Models\PrayingHouse;
use \App\Models\AdministrativeRegion;

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
        return view('admin.houses-of-prayer.create', compact('listAdministrativeRegion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PrayingHouse  $prayingHouse
     * @return \Illuminate\Http\Response
     */
    public function show(PrayingHouse $prayingHouse)
    {
        //
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
