@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('Show cooperator') }}
        </div>
        <div class="card-body">
            <table class="table table-sm table-borderless">
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
            <div class="btn-group ml-2 aling-right float-right">
                <a href="{{ route('admin.praying-houses.edit', [$prayingHouse->id]) }}" class="btn btn-primary">Editar</a>
                @include('_show.delete_action',[
                    'model' => $prayingHouse,
                    'action' => [
                        'class' => 'btn-danger',
                        'route' => 'admin.praying-houses.destroy',
                        'parameters' => $prayingHouse->id,
                        'label' => __('Delete'),
                    ],
                    'message' => __('Are you sure you want to delete a prayer house?'),
                    'index' => $prayingHouse->id,
                    ])
            </div>
        </div>
    </div>
    @section('formAction')
    @show
    @section('modal')
    @show
@endsection