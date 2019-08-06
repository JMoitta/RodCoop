@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('Edit Administrative Region') }}
        </div>
        <div class="card-body">
            @include('form._form_errors')
            {{ Form::model($administrativeRegion, ['route' => ['admin.administrative-regions.update',$administrativeRegion->id], 'method' => 'PUT']) }}
                @include('admin.administrative-regions._form')
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-secondary" onclick="comeBack()">{{__('Come back')}}</button>
                    <button type="submit" class="btn btn-primary">{{ __('To Save') }}</button>
                </div>
            {{ Form::close() }}
        </div>
    </div>
    <script type="text/javascript">
        function comeBack() {
            window.location = "{{ route('admin.administrative-regions.index') }}"
        }
    </script>
@endsection