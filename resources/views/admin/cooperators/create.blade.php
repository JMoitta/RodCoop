@extends('layouts.app')

@section('content')
    <h3>{{ __('New Cooperator') }}</h3>
    @include('form._form_errors')
    {{ Form::open(['route' => 'admin.cooperators.store']) }}
        @include('admin.cooperators._form')
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    {{ Form::close() }}
@endsection