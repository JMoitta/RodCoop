@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('Show administrative region') }}
        </div>
        <div class="card-body">
            <table class="table table-sm table-borderless">
                <tbody>
                    <tr>
                        <th  scope="row" style="width:12%;text-align: right;">ID</th>
                        <td>{{ $administrativeRegion->id }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="text-align: right;">{{ __('Description') }}</th>
                        <td>{{ $administrativeRegion->description }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="btn-group ml-2 aling-right float-right">
                <a href="{{ route('admin.list-casters.index')}}" class="btn btn-secondary">Lista de Rodízios</a>
                <a href="{{ route('admin.administrative-regions.edit', [$administrativeRegion->id]) }}" class="btn btn-primary">Editar</a>
                @include('_show.delete_action',[
                    'model' => $administrativeRegion,
                    'action' => [
                        'class' => 'btn-danger',
                        'route' => 'admin.administrative-regions.destroy',
                        'parameters' => $administrativeRegion->id,
                        'label' => __('Delete'),
                    ],
                    'attributes' => '',
                    'message' => __('Are you sure you want to delete an administrative region?'),
                    'index' => $administrativeRegion->id,
                    ])
            </div>
        </div>
    </div>
    @section('formAction')
    @show
    @section('modal')
    @show
@endsection