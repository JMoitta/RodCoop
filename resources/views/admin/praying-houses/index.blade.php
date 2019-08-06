@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('List of Prayer Houses') }}
        </div>
        <div class="card-body">
            <a class="btn btn-outline-primary ml-2" href="{{ route('admin.praying-houses.create') }}">{{ __('Create new') }}</a>
            @if(count($listPrayerOfHouses))
                <div class="float-right">
                    {!! $listPrayerOfHouses->appends(['search' => \Request::get('search'),'field_order' => \Request::get('field_order'),'order' =>\Request::get('order')])->links() !!}
                </div>
                <table class="table table-striped" id="table-search">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>{{ __('Locality') }}</th>
                        <th>{{ __('Administrative region') }}</th>
                        <th>{{ __('Weekend cults') }}</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($listPrayerOfHouses as $prayingHouse)
                        <tr>
                            <td>{{ $prayingHouse->id }}</td>
                            <td>{{ $prayingHouse->locality }}</td>
                            <td>{{ $prayingHouse->administrativeRegion->description }}</td>
                            <td>
                                @php
                                  $weekendCults = [];
                                  if($prayingHouse->saturday){
                                    array_push($weekendCults, __('Saturday'));
                                  }
                                  if($prayingHouse->sunday){
                                    array_push($weekendCults, __('Sunday'));
                                  }
                                  print(implode(", ", $weekendCults));
                                @endphp
                            </td>
                            <td>
                                <a href="{{ route('admin.praying-houses.edit', $prayingHouse->id)}}">{{ __('Edit') }}</a> |
                                <a href="{{ route('admin.praying-houses.show', $prayingHouse->id)}}">{{ __('Show') }}</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="float-right">
                    {!! $listPrayerOfHouses->appends(['search' => \Request::get('search'),'field_order' => \Request::get('field_order'),'order' =>\Request::get('order')])->links() !!}
                </div>
            @else
                <table class="table">
                    <tr>
                        <td>Nenhum registrado encontrado</td>
                    </tr>
                </table>
            @endif
        </div>
    </div>
@endsection