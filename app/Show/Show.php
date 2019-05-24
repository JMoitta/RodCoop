<?php
namespace App\Show;
use Illuminate\Database\Eloquent\Builder;

class Show
{
    private $attributes = [];
    private $actions = [];
    /**
     * @var Builder
     */
    private $model = null;
    private $modelOriginal = null;
    public function model($model = null)
    {
        if(!$model){
            return $this->model;
        }
        $this->model = !\is_object($model)? new $model: $model;
        $this->modelOriginal = clone $this->model;
        return $this;
    }
    public function actions()
    {
        return $this->actions;
    }
    public function attributes($attributes = null)
    {
        if(!$attributes){
            return $this->attributes;
        }
        $this->attributes = $attributes;
        return $this;
    }
    public function addAction($label, $route, $parameters, $template, $class = "btn-primary")
    {
        $this->actions[] = [
            'label' => $label,
            'route' => $route,
            'template' => $template,
            'class' => $class,
            'parameters' => $parameters,
        ];
        return $this;
    }
    public function addEditAction($route, $parameters, $template = null)
    {
        $this->addAction('Editar', $route, $parameters, $template ? $template : '_show.default_action');
        return $this;
    }
    public function addDeleteAction($route, $parameters, $template = null)
    {
        $this->addAction('Excluir', $route, $parameters, $template ? $template : '_show.delete_action', 'btn-danger');
        return $this;
    }
}