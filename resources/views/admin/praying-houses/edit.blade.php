@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('Edit Administrative Region') }}
        </div>
        <div class="card-body">
            @include('form._form_errors')
            {{ Form::model($prayingHouse, ['route' => ['admin.praying-houses.update',$prayingHouse->id], 'method' => 'PUT']) }}
                @include('admin.praying-houses._form')
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-secondary" onclick="comeBack()">{{__('Come back')}}</button>
                    <button type="submit" class="btn btn-primary">{{ __('To Save') }}</button>
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