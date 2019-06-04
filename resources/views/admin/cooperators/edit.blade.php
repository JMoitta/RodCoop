@extends('layouts.app')

@section('content')
    <h3>{{ __('Edit Cooperator') }}</h3>
    @include('form._form_errors')
    {{ Form::model($cooperator, ['route' => ['admin.cooperators.update',$cooperator->id], 'method' => 'PUT']) }}
        @include('admin.cooperators._form')
        <button type="submit" class="btn btn-primary">{{ __('To Save') }}</button>
    {{ Form::close() }}
@endsection