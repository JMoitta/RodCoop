@extends('layouts.app')

@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{ __('Cooperator') }}
        </div>
        <div class="card-body">
            <dl class="row">
                <dt class="col-sm-2">ID</dt>
                <dd class="col-sm-10">{{ $cooperator->id }}</dd>
              
                <dt class="col-sm-2">{{ __('Name')}}</dt>
                <dd class="col-sm-10">{{ $cooperator->name }}</dd>
              
                <dt class="col-sm-2">{{ __('Praying house') }}</dt>
                <dd class="col-sm-10">{{ $cooperator->prayingHouse->locality }}</dd>
            </dl>
        </div>
    </div>
    <div class="row">
        @isset($currentCaster)
            <div class="col-sm-6 col-xl-4">
                <div class="card text-white bg-primary mb-3" >
                    <div class="card-header">{{ date('m/Y', strtotime($currentCaster->date_caster)) }}</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $currentCaster->prayingHouse->locality }}</h5>
                        <dl class="row">
                            <dt class="col-12">
                                {{ __('Date')}}
                            </dt>
                            <dd class="col-12">
                            @php
                                $dayOfWeek = date('l', strtotime($currentCaster->date_caster));
                                if($dayOfWeek == 'Sunday') {
                                    $dayOfWeek = 'Domingo';
                                }
                                if($dayOfWeek == 'Saturday') {
                                    $dayOfWeek = 'Sabádo';
                                }
                                echo $dayOfWeek . date(' - d/m/Y - G:i ', strtotime($currentCaster->date_caster));
                            @endphp
                            </dd>
                            <dt class="col-12">
                                {{ __('Cooperator of office')}}
                            </dt>
                            <dd class="col-12">
                                {{ $currentCaster->prayingHouse->cooperatorCraft->name}}
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        @endisset
        @foreach ($casterListItems as $casterListItem)
            <div class="col-sm-6 col-xl-4">
                <div class="card mb-3" >
                    <div class="card-header">{{ date('m/Y', strtotime($casterListItem->date_caster)) }}</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $casterListItem->prayingHouse->locality }}</h5>
                        <dl class="row">
                            <dt class="col-12">
                                {{ __('Date')}}
                            </dt>
                            <dd class="col-12">
                            @php
                                $dayOfWeek = date('l', strtotime($casterListItem->date_caster));
                                if($dayOfWeek == 'Sunday') {
                                    $dayOfWeek = 'Domingo';
                                }
                                if($dayOfWeek == 'Saturday') {
                                    $dayOfWeek = 'Sabádo';
                                }
                                echo $dayOfWeek . date(' - d/m/Y - G:i ', strtotime($casterListItem->date_caster));
                            @endphp
                            </dd>
                            <dt class="col-12">
                                {{ __('Cooperator of office')}}
                            </dt>
                            <dd class="col-12">
                                {{ $casterListItem->prayingHouse->cooperatorCraft->name}}
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    @section('formAction')
    @show
    @section('modal')
    @show
@endsection