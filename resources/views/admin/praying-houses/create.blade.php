@extends('layouts.app')

@section('content')
    <h3>{{ __('New House of Prayer') }}</h3>
    @include('form._form_errors')
    {{ Form::open(['route' => 'admin.praying-houses.store']) }}
        @include('admin.praying-houses._form')
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    {{ Form::close() }}
@endsection