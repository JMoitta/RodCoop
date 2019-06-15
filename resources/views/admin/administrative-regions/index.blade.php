@extends('layouts.app')

@section('content')
    <div class="row col mb-2">
        <h3>{{ __('List of Regions Administration') }}</h3>
        <a class="btn btn-outline-primary ml-2" href="{{ route('admin.administrative-regions.create') }}">{{ __('Create new') }}</a>
    </div>
    @if(count($listAdministrativeRegions))
        <table class="table table-striped" id="table-search">
            <thead>
            <tr>
                <th>ID</th>
                <th>{{ __('Description') }}</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($listAdministrativeRegions as $administrativeRegion)
                <tr>
                    <td>{{ $administrativeRegion->id }}</td>
                    <td>{{ $administrativeRegion->description }}</td>
                    <td>
                        <a href="{{ route('admin.administrative-regions.edit', $administrativeRegion->id)}}">{{ __('Edit') }}</a> |
                        <a href="{{ route('admin.administrative-regions.show', $administrativeRegion->id)}}">{{ __('Show') }}</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="float-right">
            {!! $listAdministrativeRegions->appends(['search' => \Request::get('search'),'field_order' => \Request::get('field_order'),'order' =>\Request::get('order')])->links() !!}
        </div>
    @else
    <table class="table">
        <tr>
            <td>Nenhum registrado encontrado</td>
        </tr>
    </table>
@endif
@endsection