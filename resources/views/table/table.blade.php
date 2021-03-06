<form action="{{url()->current()}}" method="GET" class="form-inline mb-2">
    <div class="form-group">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Buscar</span>
            </div>
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-search"></span>
            </div>
            <input type="text" class="form-control" name="search" placeholder="Pesquisar"
                    value="{{\Request::get('search')}}">
        </div>
    </div>
    <button type="submit" class="btn btn-primary ml-2">Pesquisar</button>
</form>
<div class="row">
    @if(count($table->rows()))
        <div class="col">
            <div class="float-right">
                {!! $table->rows()->appends(['search' => \Request::get('search'),'field_order' => \Request::get('field_order'),'order' =>\Request::get('order')])->links() !!}
            </div>
        </div>
    @endif
</div>
@if(count($table->rows()))
    <table class="table table-striped" id="table-search">
        <thead>
        <tr>
            @foreach($table->columns() as $column)
                <th data-name="{{$column['name']}}">
                    {{$column['label']}}
                    @if(isset($column['_order']))
                        @php
                            $icons = [
                                1 => 'glyphicon-sort',
                                 'asc' => 'glyphicon-sort-by-alphabet',
                                 'desc' => 'glyphicon-sort-by-alphabet-alt',
                            ];
                        @endphp
                        <a href="javascript:void(0)">
                            <span class="glyphicon {{$icons[$column['_order']]}}"></span>
                        </a>
                    @endif
                </th>
            @endforeach
            @if(count($table->actions()))
                <th>Ações</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($table->rows() as $row)
            <tr>
                @foreach($table->columns() as $column)
                    <td>{{ $row->{$column['name']} }}</td>
                @endforeach
                @if(count($table->actions()))
                    <td>
                        @foreach($table->actions() as $action)
                            @include($action['template'],[
                                'row' => $row,
                                'action' => $action,
                            ])
                            @if ($table->endActionIndex() != $action)
                                |
                            @endif
                        @endforeach
                    </td>
                @endif

            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="float-right">
        {!! $table->rows()->appends(['search' => \Request::get('search'),'field_order' => \Request::get('field_order'),'order' =>\Request::get('order')])->links() !!}
    </div>
@else
    <table class="table">
        <tr>
            <td>Nenhum registrado encontrado</td>
        </tr>
    </table>
@endif

@push('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $('#table-search>thead>tr>th[data-name]>a')
            .click(function(){
                var anchor = $(this);
                var field = anchor.closest('th').attr('data-name');
                var order =
                    anchor.find('span').hasClass('glyphicon-sort-by-alphabet-alt') || anchor.find('span').hasClass('glyphicon-sort')
                    ? 'asc':'desc';
                var url = "{{url()->current()}}?";
                @if(\Request::get('page'))
                    url += "page={{\Request::get('page')}}&";
                @endif
                @if(\Request::get('search'))
                    url += "search={{\Request::get('search')}}&";
                @endif
                url+='field_order='+field+'&order='+order;
                window.location = url;
            })
    });
</script>
@endpush