@extends('layouts.app')

@section('content')
    <div class="row col mb-2">
        <h3>{{ __('List of Cooperators') }}</h3>
        <a class="btn btn-outline-primary ml-2" href="{{ route('admin.cooperators.create') }}">{{ __('Create new') }}</a>
    </div>
    <div class="row">
        @if(count($listCooperators))
            <div class="col">
                <div class="float-right">
                    {!! $listCooperators->appends(['search' => \Request::get('search'),'field_order' => \Request::get('field_order'),'order' =>\Request::get('order')])->links() !!}
                </div>
            </div>
        @endif
    </div>
    @if(count($listCooperators))
        <table class="table table-striped" id="table-search">
            <thead>
            <tr>
                <th>ID</th>
                <th>{{ __('Name') }}</th>
                <th>{{ __('Administrative region') }}</th>
                <th>{{ __('Cooperator of office') }}</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($listCooperators as $cooperator)
                <tr>
                    <td>{{ $cooperator->id }}</td>
                    <td>{{ $cooperator->name }}</td>
                    <td>{{ $cooperator->administrativeRegion->description }}</td>
                    <td>{{ $cooperator->prayingHouse->locality }}</td>
                    <td>
                        <a href="{{ route('admin.cooperators.edit', $cooperator->id)}}">{{ __('Edit') }}</a> |
                        <a href="{{ route('admin.cooperators.show', $cooperator->id)}}">{{ __('Show') }}</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="float-right">
            {!! $listCooperators->appends(['search' => \Request::get('search'),'field_order' => \Request::get('field_order'),'order' =>\Request::get('order')])->links() !!}
        </div>
    @else
        <table class="table">
            <tr>
                <td>Nenhum registrado encontrado</td>
            </tr>
        </table>
    @endif
@endsection