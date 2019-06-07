<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cooperator;
use App\Models\AdministrativeRegion;
use App\Http\Requests\Cooperator\StoreCooperator;
use App\Http\Requests\Cooperator\UpdateCooperator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CooperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->table
            ->model(Cooperator::class)
            ->columns([
                [
                    'label' => 'ID',
                    'name' => 'id',
                    'order' => true //true, asc ou desc
                ],
                [
                    'label' => 'Nome',
                    'name' => 'name',
                    'order' => true //true, asc ou desc
                ],
            ])
            ->filters([
                [
                    'name' => 'name',
                    'operator' => 'LIKE'
                ]
            ])
            ->addEditAction('admin.cooperators.edit')
            ->addShowAction('admin.cooperators.show')
            //->addDeleteAction('admin.administrative-regions.destroy')
            ->paginate(5)
            ->search();
        return view('admin.cooperators.index',[
            'table' => $this->table,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listAdministrativeRegion = AdministrativeRegion::pluck('description', 'id');
        return view('admin.cooperators.create', \compact('listAdministrativeRegion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Cooperator\StoreCooperator $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCooperator $request)
    {
        Cooperator::create($request->all());
        return redirect()->route('admin.cooperators.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cooperator  $cooperator
     * @return \Illuminate\Http\Response
     */
    public function show(Cooperator $cooperator)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cooperator  $cooperator
     * @return \Illuminate\Http\Response
     */
    public function edit(Cooperator $cooperator)
    {
        $listAdministrativeRegion = AdministrativeRegion::pluck('description', 'id');
        return view('admin.cooperators.edit', compact('cooperator', 'listAdministrativeRegion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Cooperator\UpdateCooperator  $request
     * @param  \App\Models\Cooperator  $cooperator
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCooperator $request, Cooperator $cooperator)
    {
        $cooperator->fill($request->all());
        $cooperator->save();
        return redirect()->route('admin.cooperators.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cooperator  $cooperator
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cooperator $cooperator)
    {
        //
    }
}
