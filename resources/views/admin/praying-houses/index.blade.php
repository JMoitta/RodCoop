@extends('layouts.app')

@section('content')
    <div class="row col mb-2">
        <h3>{{ __('List of Prayer Houses') }}</h3>
        <a class="btn btn-outline-primary ml-2" href="{{ route('admin.praying-houses.create') }}">{{ __('Create new') }}</a>
    </div>
    <form action="{{url()->current()}}" method="GET" class="form-inline mb-2">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Buscar</span>
                </div>
                <div class="input-group-addon">
                    <span class="glyphicon glyphicon-search"></span>
                </div>
                <input type="text" class="form-control" name="search" placeholder="Pesquisar"
                        value="{{\Request::get('search')}}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary ml-2">Pesquisar</button>
    </form>
    <div class="row">
        @if(count($listPrayerOfHouses))
            <div class="col">
                <div class="float-right">
                    {!! $listPrayerOfHouses->appends(['search' => \Request::get('search'),'field_order' => \Request::get('field_order'),'order' =>\Request::get('order')])->links() !!}
                </div>
            </div>
        @endif
    </div>
    @if(count($listPrayerOfHouses))
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
@endsection