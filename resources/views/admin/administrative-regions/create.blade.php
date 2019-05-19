@extends('layouts.app')

@section('content')
    <h3>Nova Região Administrativa</h3>
    @include('form._form_errors')
    {{ Form::open(['route' => 'app.categories.store']) }}
        @include('admin.admin._form')
        <button type="submit" class="btn btn-primary">Criar</button>
    {{ Form::close() }}
@endsection