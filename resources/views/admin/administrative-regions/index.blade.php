@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row col">
                {{ __('List of Regions Administration') }}
            </div>
        </div>
        <div class="card-body">
            <a class="btn btn-outline-primary ml-2" href="{{ route('admin.administrative-regions.create') }}">{{ __('Create new') }}</a>
            @if(count($listAdministrativeRegions))
            <div class="float-right">
                {!! $listAdministrativeRegions->appends(['search' => \Request::get('search'),'field_order' => \Request::get('field_order'),'order' =>\Request::get('order')])->links() !!}
            </div>
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
        </div>
    </div>
@endif
@endsection