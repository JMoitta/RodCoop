<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreAdministrativeRegion;
use App\Http\Requests\UpdateAdministrativeRegion;
use App\Models\AdministrativeRegion;
use App\Table\Table;
use App\Show\Show;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdministrativeRegionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listAdministrativeRegions = AdministrativeRegion::paginate(5);
        return view('admin.administrative-regions.index', \compact('listAdministrativeRegions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.administrative-regions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdministrativeRegion  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdministrativeRegion $request)
    {
        AdministrativeRegion::create($request->all());
        return redirect()->route('admin.administrative-regions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdministrativeRegion  $administrativeRegion
     * @return \Illuminate\Http\Response
     */
    public function show(AdministrativeRegion $administrativeRegion)
    {
        $this->show
            ->model($administrativeRegion)
            ->attributes([
                [
                    'label' => 'Identificador',
                    'name' => 'id',
                ],
                [
                    'label' => 'Descrição',
                    'name' => 'description',
                ]
            ])
            ->addEditAction('admin.administrative-regions.edit', ['administrative_region' => $administrativeRegion->id])
            ->addDeleteAction('admin.administrative-regions.destroy', ['administrative_region' => $administrativeRegion->id]);
        return view('admin.administrative-regions.show', [
            'show' => $this->show,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdministrativeRegion $administrativeRegion
     * @return \Illuminate\Http\Response
     */
    public function edit(AdministrativeRegion $administrativeRegion)
    {
        return view('admin.administrative-regions.edit', compact('administrativeRegion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdministrativeRegion  $request
     * @param  \App\Models\AdministrativeRegion $administrativeRegion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdministrativeRegion  $request, AdministrativeRegion $administrativeRegion)
    {
        $administrativeRegion->fill($request->all());
        $administrativeRegion->save();
        return redirect()->route('admin.administrative-regions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdministrativeRegion $administrativeRegion
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdministrativeRegion $administrativeRegion)
    {
        $administrativeRegion->delete();
        return redirect()->route('admin.administrative-regions.index');
    }
}
