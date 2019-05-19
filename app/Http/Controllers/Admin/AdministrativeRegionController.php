<?php

namespace App\Http\Controllers\Admin;

use App\Model\AdministrativeRegion;
use App\Table\Table;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdministrativeRegionController extends Controller
{
    /**
     * @var Table
     */
    private $table;
    /**
     * CategoriesController constructor.
     */
    public function __construct(Table $table)
    {
        $this->table = $table;
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
        ->addDeleteAction('admin.administrative-regions.destroy')
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
