@extends('layouts.app')

@section('content')
    <h3>{{ __('Show cooperator') }}</h3>
    <div class="btn-toolbar mb-3">
        <div class="btn-group mr-2">
            <a href="{{ route('admin.praying-houses.edit', [$prayingHouse->id]) }}" class="btn btn-primary">Editar</a>
        </div>
        <div class="btn-group mr-2">
            @include('_show.delete_action',[
                'model' => $prayingHouse,
                'action' => [
                    'class' => 'btn-danger',
                    'route' => 'admin.praying-houses.destroy',
                    'parameters' => $prayingHouse->id,
                    'label' => __('Delete'),
                ],
                'index' => $prayingHouse->id,
            ])
        </div>
    </div>
    @section('formAction')
    @show
    <table class="table table-bordered">
        <tbody>
            <tr>
                <th scope="row">ID</th>
                <td>{{ $prayingHouse->id }}</td>
            </tr>
            <tr>
                <th scope="row">Localidade</th>
                <td>{{ $prayingHouse->locality }}</td>
            </tr>
            <tr>
                <th scope="row">Região Administrativa</th>
                <td>{{ $prayingHouse->administrativeRegion->description }}</td>
            </tr>
            <tr>
                <th scope="row">Cooperador</th>
                <td>{{ $prayingHouse->cooperatorCraft->name }}</td>
            </tr>
            <tr>
                <th scope="row">Endereço</th>
                <td>{{ $prayingHouse->address }}</td>
            </tr>
        </tbody>
    </table>
@endsection