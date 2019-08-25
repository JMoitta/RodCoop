@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('List of Cooperators') }}
        </div>
        <div class="card-body">
            <a class="btn btn-outline-primary ml-2" href="{{ route('admin.cooperators.create') }}">{{ __('Create new') }}</a>
            @if(count($listCooperators))
                <div class="float-right">
                    {!! $listCooperators->appends(['search' => \Request::get('search'),'field_order' => \Request::get('field_order'),'order' =>\Request::get('order')])->links() !!}
                </div>

                <table class="table table-striped" id="table-search">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Houses of prayer') }}</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($listCooperators as $cooperator)
                        <tr>
                            <td>{{ $cooperator->id }}</td>
                            <td>{{ $cooperator->name }}</td>
                            @isset( $cooperator->prayingHouse )
                                <td>{{ $cooperator->prayingHouse->locality }}</td>
                            @else
                                <td> - </td>
                            @endisset
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
        </div>
    </div>
@endsection