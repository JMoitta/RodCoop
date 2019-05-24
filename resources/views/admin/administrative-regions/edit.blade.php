@extends('layouts.app')

@section('content')
    <h3>{{ __('Edit Administrative Region') }}</h3>
    @include('form._form_errors')
    {{ Form::model($administrativeRegion, ['route' => 'admin.administrative-regions.store']) }}
        @include('admin.administrative-regions._form')
        <button type="submit" class="btn btn-primary">{{ __('To Save') }}</button>
    {{ Form::close() }}
@endsection