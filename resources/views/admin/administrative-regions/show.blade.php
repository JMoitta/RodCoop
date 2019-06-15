@extends('layouts.app')

@section('content')
    <h3>{{ __('Show administrative region') }}</h3>
    <div class="btn-toolbar mb-3">
        <div class="btn-group mr-2">
            <a href="{{ route('admin.administrative-regions.edit', [$administrativeRegion->id]) }}" class="btn btn-primary">Editar</a>
        </div>
        <div class="btn-group mr-2">
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
    @section('formAction')
    @show
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th scope="row">ID</th>
                <td>{{ $administrativeRegion->id }}</td>
            </tr>
            <tr>
                <th scope="row">{{ __('Descrition') }}</th>
                <td>{{ $administrativeRegion->description }}</td>
            </tr>
        </tbody>
    </table>
@endsection