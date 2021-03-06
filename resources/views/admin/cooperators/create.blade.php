@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('New Cooperator') }}
        </div>
        <div class="card-body">
            @include('form._form_errors')
            {{ Form::open(['route' => 'admin.cooperators.store']) }}
                @include('admin.cooperators._form')
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-secondary" onclick="comeBack()">{{__('Come back')}}</button>
                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
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