@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('Edit Cooperator') }}
        </div>
        <div class="card-body">
            @include('form._form_errors')
            {{ Form::model($cooperator, ['route' => ['admin.cooperators.update',$cooperator->id], 'method' => 'PUT']) }}
                @include('admin.cooperators._form')
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-secondary" onclick="comeBack()">{{__('Come back')}}</button>
                    <button type="submit" class="btn btn-primary">{{ __('To Save') }}</button>
                </div>
            {{ Form::close() }}
        </div>
    </div>
    <script type="text/javascript">
        function comeBack() {
            window.location = "{{ route('admin.cooperators.index') }}"
        }
    </script>
@endsection