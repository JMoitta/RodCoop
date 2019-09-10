@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('Administrative region') }}
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    {{ Form::open(['route' => 'welcome.administrative-region']) }}
                        <div class="form-group">
                            <label for="administrative_region_id">{{ __('Administrative region')}}</label>
                            {{ Form::select('administrative_region_id', $listCooperator , null, ['class' => 'custom-select']) }}
                        </div>
                        <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        </div>
                    {{ Form::close() }}
                </div>
                <div class="col">
                    {{ Form::open(['route' => 'welcome.administrative-region']) }}
                        <div class="form-group">
                            <label for="administrative_region_id">{{ __('Administrative region')}}</label>
                            {{ Form::select('administrative_region_id', $listPrayingHouse , null, ['class' => 'custom-select']) }}
                        </div>
                        <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
@endsection