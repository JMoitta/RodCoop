@extends('layouts.app')

@section('content')
    <h3>{{ __('New Administrative Region') }}</h3>
    @include('form._form_errors')
    {{ Form::open(['route' => 'admin.administrative-regions.store']) }}
        @include('admin.administrative-regions._form')
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    {{ Form::close() }}
@endsection