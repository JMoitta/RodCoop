<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreAdministrativeRegion;
use App\Model\AdministrativeRegion;
use App\Table\Table;
use App\Show\Show;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdministrativeRegionController extends Controller
{
    /**
     * @var Table
     */
    private $table;
    /**
     * @var Show
     */
    private $show;
    /**
     * CategoriesController constructor.
     */
    public function __construct(Table $table, Show $show)
    {
        $this->table = $table;
        $this->show = $show;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->table
        ->model(AdministrativeRegion::class)
        ->columns([
            [
                'label' => 'ID',
                'name' => 'id',
                'order' => true //true, asc ou desc
            ],
            [
                'label' => 'Descrição',
                'name' => 'description',
                'order' => true //true, asc ou desc
            ]
        ])
        ->filters([
            [
                'name' => 'description',
                'operator' => 'LIKE'
            ]
        ])
        ->addEditAction('admin.administrative-regions.edit')
        ->addShowAction('admin.administrative-regions.show')
        //->addDeleteAction('admin.administrative-regions.destroy')
        ->paginate(5)
        ->search();
    return view('admin.administrative-regions.index',[
        'table' => $this->table
    ]);
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
     * @param  \App\Model\AdministrativeRegion  $administrativeRegion
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\AdministrativeRegion $administrativeRegion
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdministrativeRegion $administrativeRegion)
    {
        $administrativeRegion->delete();
        return redirect()->route('admin.administrative-regions.index');
        
    }
}
