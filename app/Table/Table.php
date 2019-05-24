<?php
namespace App\Table;
use Illuminate\Database\Eloquent\Builder;
class Table
{
    private $rows = [];
    private $columns = [];
    private $actions = [];
    private $filters = [];
    /**
     * @var Builder
     */
    private $model = null;
    private $modelOriginal = null;
    private $perPage = 15;
    public function paginate($perPage)
    {
        $this->perPage = $perPage;
        return $this;
    }
    public function rows()
    {
        return $this->rows;
    }
    public function model($model = null)
    {
        if(!$model){
            return $this->model;
        }
        $this->model = !\is_object($model)? new $model: $model;
        $this->modelOriginal = clone $this->model;
        return $this;
    }
    public function filters($filters)
    {
        $this->filters = $filters;
        return $this;
    }
    public function columns($columns = null)
    {
        if(!$columns){
            return $this->columns;
        }
        $this->columns = $columns;
        return $this;
    }
    public function actions()
    {
        return $this->actions;
    }
    public function addAction($label, $route, $template)
    {
        $this->actions[] = [
            'label' => $label,
            'route' => $route,
            'template' => $template,
        ];
        return $this;
    }
    public function addEditAction($route, $template = null)
    {
        $this->addAction('Editar', $route, $template ? $template : 'table.default_action');
        return $this;
    }
    public function addShowAction($route, $template = null)
    {
        $this->addAction('Ver', $route, $template ? $template : 'table.default_action');
        return $this;
    }
    public function addDeleteAction($route, $template = null)
    {
        $this->addAction('Excluir', $route, $template ? $template : 'table.delete_action');
        return $this;
    }
    public function search()
    {
        $keyName = $this->modelOriginal->getKeyName();
        $columns = collect($this->columns())->pluck('name')->toArray();
        array_unshift($columns, $keyName);
        $this->applyFilters();
        $this->applyOrders();
        $this->rows = $this->model->paginate($this->perPage, $columns);
        return $this;
    }
    public function applyFilters()
    {
        foreach ($this->filters as $filter){
            $field = $filter['name'];
            $operator = $filter['operator'];
            $search = \Request::get('search');
            $search = strtolower($operator) === 'like'? "%$search%":$search;
            if(!strpos($filter['name'], '.')) {
                $this->model = $this->model->orWhere($field, $operator, $search);
            } else {
                list($relation, $field) = explode('.', $filter['name']);
                $this->model = $this->model->orWhereHas($relation, function($query) use($field,$operator, $search){
                    $query->where($field,$operator, $search);
                });
            }
        }
    }
    public function endActionIndex()
    {
        return end($this->actions);
    }
    protected function applyOrders()
    {
        $fieldOrderParam = \Request::get('field_order');
        $orderParam = \Request::get('order');
        foreach ($this->columns() as $key => $column) {
            if($column['name'] === $fieldOrderParam && isset($column['order'])) {
                $order = $orderParam == 'desc'?'desc':'asc';
                $this->columns[$key]['_order'] = $order;
                $this->model->orderBy("{$column['name']}", $order);
            } else if(isset($column['order'])) {
                $this->columns[$key]['_order'] = $column['order'];
                if($column['order'] === 'desc' || $column['order'] === 'asc') {
                    $this->model->orderBy("{$column['name']}", $column['order']);
                }
            }
        }
    }
}