@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('New House of Prayer') }}
        </div>
        <div class="card-body">
            @include('form._form_errors')
            {{ Form::open(['route' => 'admin.praying-houses.store']) }}
                @include('admin.praying-houses._form')
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-secondary" onclick="comeBack()">{{__('Come back')}}</button>
                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                </div>
            {{ Form::close() }}
        </div>
    </div>
    <script type="text/javascript">
        function comeBack() {
            window.location = "{{ route('admin.praying-houses.index') }}"
        }
    </script>
@endsection