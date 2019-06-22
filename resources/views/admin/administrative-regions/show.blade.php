@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>{{ __('Show administrative region') }}</h3>
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
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
            </li>
            <li class="list-group-item">
                <div class="btn-toolbar aling-right float-right">
                    <div class="btn-group ml-2">
                        <a href="#" class="btn btn-secondary">Lista de Rodízios</a>
                    </div>
                    <div class="btn-group ml-2">
                        <a href="{{ route('admin.administrative-regions.edit', [$administrativeRegion->id]) }}" class="btn btn-primary">Editar</a>
                    </div>
                    <div class="btn-group ml-2">
                        @include('_show.delete_action',[
                            'model' => $administrativeRegion,
                            'action' => [
                                'class' => 'btn-danger',
                                'route' => 'admin.administrative-regions.destroy',
                                'parameters' => $administrativeRegion->id,
                                'label' => __('Delete'),
                            ],
                            'index' => $administrativeRegion->id,
                        ])
                    </div>
                </div>
            </li>
        </ul>
    </div>
    
    
    @section('formAction')
    @show
    
@endsection