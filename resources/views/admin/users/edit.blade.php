@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('Edit User') }}
        </div>
        <div class="card-body">
            @include('form._form_errors')
            {{ Form::model($user, ['route' => ['admin.users.update',$user->id], 'method' => 'PUT']) }}
                @include('admin.users._form')
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