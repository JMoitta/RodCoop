<?php

namespace App\Http\Controllers;


use App\Table\Table;
use App\Show\Show;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    /**
     * @var Table
     */
    protected $table;
    /**
     * @var Show
     */
    protected $show;
    /**
     * CategoriesController constructor.
     */
    public function __construct(Table $table, Show $show)
    {
        $this->table = $table;
        $this->show = $show;
    }
}

