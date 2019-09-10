@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('Administrative region') }}
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    {{ Form::open(['route' => 'welcome.cooperator']) }}
                        <div class="form-group">
                            <label for="cooperator_id">{{ __('Cooperator')}}</label>
                            {{ Form::select('cooperator_id', $listCooperator , null, ['class' => 'custom-select']) }}
                        </div>
                        <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                        </div>
                    {{ Form::close() }}
                </div>
                <div class="col">
                    {{ Form::open(['route' => 'welcome.praying-house']) }}
                        <div class="form-group">
                            <label for="praying_house_id">{{ __('Praying house')}}</label>
                            {{ Form::select('praying_house_id', $listPrayingHouse , null, ['class' => 'custom-select']) }}
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