@extends('layouts.app')

@section('content')
    <h3>{{ __('Edit Administrative Region') }}</h3>
    @include('form._form_errors')
    {{ Form::model($prayingHouse, ['route' => ['admin.praying-houses.update',$prayingHouse->id], 'method' => 'PUT']) }}
        @include('admin.houses-of-prayer._form')
        <button type="submit" class="btn btn-primary">{{ __('To Save') }}</button>
    {{ Form::close() }}
@endsection