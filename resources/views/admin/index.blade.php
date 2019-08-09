@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header"><span class="font-weight-bold">{{__('Administrative region')}}:</span> {{Auth::user()->administrativeRegion->description}}</div>
        <div class="card-body">
            <div class="btn-group" role="group">
                <button type="submit" class="btn btn-primary">{{ __('New caster list') }}</button>
            </div>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header">
            {{ __('New caster list') }}
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Primeiro</th>
                    <th scope="col">Último</th>
                    <th scope="col">Nickname</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection