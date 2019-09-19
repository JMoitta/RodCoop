@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header"><span class="font-weight-bold">{{__('Administrative region')}}:</span> {{Auth::user()->administrativeRegion->description ?? ''}}</div>
    <div class="card-body">
      <div class="btn-group" role="group">
        <button type="submit" class="btn btn-primary">{{ __('New caster list') }}</button>
      </div>
    </div>
  </div>
  @can('root', Auth::user())
    <div class="card mt-3">
      <div class="card-header">
        {{ __('Users') }}
      </div>
      <div class="card-body">
        @if(count($listUser))
        <div class="float-right">
          {!! $listUser->appends(['search' => \Request::get('search'),'field_order' => \Request::get('field_order'),'order' =>\Request::get('order')])->links() !!}
        </div>
        <table class="table table-striped" id="table-search">
          <thead>
          <tr>
            <th>ID</th>
            <th>{{ __('Name') }}</th>
            <th>{{ __('Administrative region')}}</th>
            <th>{{ __('E-mail') }}</th>
            <th>Ações</th>
          </tr>
          </thead>
          <tbody>
          @foreach($listUser as $user)
            <tr>
              <td>{{ $user->id }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->administrativeRegion->description ?? '-' }}</td>
              <td>{{ $user->email }}</td>
              <td>
                <button type="button" onclick="linkAction('{{ route('admin.users.edit', $user->id)}}')"
                  class="btn btn-primary btn-sm">
                  {{ __('Edit') }}
                </button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <div class="float-right">
          {!! $listUser->appends(['search' => \Request::get('search'),'field_order' => \Request::get('field_order'),'order' =>\Request::get('order')])->links() !!}
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
  @endcan
</div>
<script type="text/javascript">
function linkAction(link) {
  window.location = link;
}
</script>
@endsection