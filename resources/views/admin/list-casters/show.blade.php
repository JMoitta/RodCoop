@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('Show administrative region') }}
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    {{ Form::open(['route' => ['admin.list-casters.cooperator', $listCaster->id]]) }}
                        <div class="form-row">
                            <div class="col">
                                {{ Form::select('cooperator_id', $listNameCooperator, null, ['class' => 'custom-select']) }}
                            </div>
                            <div class="col">
                                <button class="btn btn-primary" type="submit">Rodízio do Cooperador</button>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
                <div class="col">
                    {{ Form::open(['route' => ['admin.list-casters.praying-house', $listCaster->id]]) }}
                        <div class="form-row">
                            <div class="col">
                                {{ Form::select('praying_house_id', $listLocalityPrayingHouse, null, ['class' => 'custom-select']) }}
                            </div>
                            <div class="col">
                                <button class="btn btn-primary" type="submit">Rodízio da Casa de oração</a>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header">
            {{ __('Show administrative region') }}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped " id="table-search">
                    <thead>
                        <tr>
                            <th>{{ __('Houses of prayer') }}</th>
                            @foreach($casterListItemsGroup as $prayingHouse => $casterListItems)
                                @foreach ($casterListItems as $casterListItem)
                                    <th class="border-left">{{ __('Caster Cooperator') }}</th>
                                    <th>{{ date('m/Y', strtotime($casterListItem->date_caster)) }}</th>
                                @endforeach
                                @break
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($casterListItemsGroup as $prayingHouse => $casterListItems)
                        <tr>
                            <td class="font-weight-bold">{{ $casterListItems[0]->praying_house }}</td>
                            @foreach ($casterListItems as $casterListItem)
                                <td class="border-left">{{ $casterListItem->cooperator}}</td>
                                <td>
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
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @section('formAction')
    @show
    @section('modal')
    @show
@endsection