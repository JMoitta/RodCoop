@extends('layouts.app')

@section('content')
    <h3>{{ __('Edit Administrative Region') }}</h3>
    @include('form._form_errors')
    {{ Form::model($administrativeRegion, ['route' => ['admin.administrative-regions.update',$administrativeRegion->id], 'method' => 'PUT']) }}
        @include('admin.administrative-regions._form')
        <button type="submit" class="btn btn-primary">{{ __('To Save') }}</button>
    {{ Form::close() }}
@endsection