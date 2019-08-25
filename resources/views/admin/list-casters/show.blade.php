@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('Show administrative region') }}
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <form>
                        <div class="form-row">
                            <div class="col">
                                {{ Form::select('cooperator_id', $listNameCooperator, null, ['class' => 'custom-select']) }}
                            </div>
                            <div class="col">
                                <a class="btn btn-primary" href="{{ route('admin.list-casters.index')}}">Rodízio do Cooperador</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col">
                    <form>
                        <div class="form-row">
                            <div class="col">
                                {{ Form::select('cooperator_id', $listLocalityPrayingHouse, null, ['class' => 'custom-select']) }}
                            </div>
                            <div class="col">
                                <a class="btn btn-primary" href="{{ 'sdf' }}">Rodízio da Casa de oração</a>
                            </div>
                        </div>
                    </form>
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
                            <td class="font-weight-bold">{{ $prayingHouse }}</td>
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