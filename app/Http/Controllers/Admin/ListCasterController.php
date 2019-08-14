<?php

namespace App\Http\Controllers\Admin;

use App\Models\ListCaster;
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
        return view('admin.list-casters.index', \compact('allListCasters'));
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
        //
    }
}
