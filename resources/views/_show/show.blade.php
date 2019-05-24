<div class="btn-toolbar mb-3">
    @foreach($show->actions() as $action)
        <div class="btn-group mr-2">
            @include($action['template'],[
                'model' => $show->model(),
                'action' => $action,
                'index' => $loop->index
            ])
        </div>
    @endforeach
</div>
@section('formAction')
@show
<table class="table table-bordered">
    <tbody>
    @foreach ($show->attributes() as $attribute)
        <tr>
            <th scope="row">{{ $attribute['label']}}</th>
            <td>{{$show->model()[$attribute['name']]}}</td>
        </tr>
    @endforeach
    </tbody>
</table>