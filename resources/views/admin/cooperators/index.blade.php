@extends('layouts.app')

@section('content')
    <div class="row col mb-2">
        <h3>{{ __('List of Cooperators') }}</h3>
        <a class="btn btn-outline-primary ml-2" href="{{ route('admin.cooperators.create') }}">{{ __('Create new') }}</a>
    </div>
    @include('table.table')
@endsection