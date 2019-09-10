@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('List casters') }}
        </div>
        <div class="card-body">
            {{ Form::open(['route' => 'welcome.administrative-region']) }}
                <div class="form-group">
                    <label for="administrative_region_id">{{ __('Administrative region') }}</label>
                    {{ Form::select('administrative_region_id', $listAdministrativeRegion , null, ['class' => 'custom-select']) }}
                </div>          
                <div class="btn-group" role="group">
                    <button type="submit" class="btn btn-primary">{{ __('Select') }}</button>
                </div>
            {{ Form::close() }}
        </div>
    </div>
@endsection