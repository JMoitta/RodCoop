@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row col">
                {{ __('All caster lists') }}
            </div>
        </div>
        <div class="card-body">
            {{ Form::open(['route' => 'admin.list-casters.store']) }}
            <div class="btn-group mb-3" role="group">
                <button type="submit" class="btn btn-primary">{{ __('New caster list') }}</button>
            </div>
            {{ Form::close() }}
            @if(count($allListCasters))
            <div class="float-right">
                {!! $allListCasters->appends(['search' => \Request::get('search'),'field_order' => \Request::get('field_order'),'order' =>\Request::get('order')])->links() !!}
            </div>
            <table class="table table-striped" id="table-search">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{ __('Creator user') }}</th>
                        <th>{{ __('Creation date') }}</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($allListCasters as $listCasters)
                        <tr {!! $listCasters->id == $administrativeRegion->active_caster_list_id ? 'class="table-success"': '' !!}>
                            <td>{{ $listCasters->id }}</td>
                            <td>{{ $listCasters->castorUser->name }}</td>
                            <td>{{ $listCasters->created_at }}</td>
                            <td>
                                <button type="button" onclick="linkAction('{{ route('admin.list-casters.enable', $listCasters->id)}}')"
                                    class="btn btn-success btn-sm" {{ $listCasters->id == $administrativeRegion->active_caster_list_id ? 'disabled' : '' }}>
                                    {{ __('Enable') }}
                                </button>
                                <button type="button" class="btn btn-primary btn-sm"
                                    onclick="linkAction('{{ route('admin.list-casters.show', $listCasters->id)}}')">
                                    {{ __('Show') }}
                                </button>
                                @include('_show.delete_action',[
                                    'model' => $listCasters,
                                    'action' => [
                                        'class' => 'btn-danger btn-sm',
                                        'route' => 'admin.list-casters.destroy',
                                        'parameters' => $listCasters->id,
                                        'label' => __('Delete'),
                                    ],
                                    'attributes' => $listCasters->id == $administrativeRegion->active_caster_list_id ? 'disabled' : '',
                                    'message' => __('Are you sure you want to delete the caster list?'),
                                    'index' => $listCasters->id,
                                ])
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="float-right">
                    {!! $allListCasters->appends(['search' => \Request::get('search'),'field_order' => \Request::get('field_order'),'order' =>\Request::get('order')])->links() !!}
                </div>
            @else
            <table class="table">
                <tr>
                    <td>Nenhum registrado encontrado</td>
                </tr>
            </table>
            @endif
        </div>
    </div>
    <script type="text/javascript">
    function linkAction(link) {
        window.location = link;
    }
    </script>
    @section('formAction')
    @show
    @section('modal')
    @show
@endsection