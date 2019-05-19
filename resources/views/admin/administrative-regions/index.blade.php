@extends('layouts.app')

@section('content')
    <div class="row col mb-2">
        <h3>Listagem de Regiões Administasz</h3>
        <a class="btn btn-outline-primary ml-2" href="{{ route('admin.administrative-regions.create') }}">Criar novo</a>
    </div>
    @include('table.table')
@endsection