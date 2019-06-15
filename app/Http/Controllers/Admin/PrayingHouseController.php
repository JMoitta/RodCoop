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
        return view('admin.praying-houses.index', \compact('listPrayerOfHouses'));
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
        return view('admin.praying-houses.create', compact('listAdministrativeRegion', 'listCooperator'));
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
        return redirect()->route('admin.praying-houses.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PrayingHouse  $prayingHouse
     * @return \Illuminate\Http\Response
     */
    public function show(PrayingHouse $prayingHouse)
    {
        return view('admin.praying-houses.show', compact('prayingHouse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PrayingHouse  $prayingHouse
     * @return \Illuminate\Http\Response
     */
    public function edit(PrayingHouse $prayingHouse)
    {
        $listAdministrativeRegion = AdministrativeRegion::pluck('description', 'id');
        $listCooperator = Cooperator::pluck('name', 'id');
        return view('admin.praying-houses.edit', compact('prayingHouse', 'listAdministrativeRegion', 'listCooperator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PrayingHouse\StorePrayingHouse  $request
     * @param  \App\PrayingHouse  $prayingHouse
     * @return \Illuminate\Http\Response
     */
    public function update(StorePrayingHouse $request, PrayingHouse $prayingHouse)
    {
        $prayingHouse->fill($request->all());
        $prayingHouse->save();
        return redirect()->route('admin.praying-houses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PrayingHouse  $prayingHouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrayingHouse $prayingHouse)
    {
        $prayingHouse->delete();
        return redirect()->route('admin.praying-houses.index');
    }
}
