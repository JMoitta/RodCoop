@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            {{ __('Show cooperator') }}
        </div>
        <div class="card-body">
            <table class="table table-sm table-borderless">
                <tbody>
                    <tr>
                        <th  scope="row" style="width:12%;text-align: right;">ID</th>
                        <td>{{ $cooperator->id }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="text-align: right;">{{ __('Name') }}</th>
                        <td>{{ $cooperator->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="text-align: right;">{{ __('Houses of prayer') }}</th>
                        <td>{{ $cooperator->prayingHouse->locality }}</td>
                    </tr>
                    <tr>
                        <th scope="row" style="text-align: right;">{{ __('Administrative region') }}</th>
                        <td>{{ $cooperator->administrativeRegion->description }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="btn-group ml-2 aling-right float-right">
                <button type="button" class="btn btn-secondary" onclick="comeBack()">{{__('Come back')}}</button>
                <a href="{{ route('admin.cooperators.edit', [$cooperator->id]) }}" class="btn btn-primary">{{ __('Edit') }}</a>
                @include('_show.delete_action',[
                    'model' => $cooperator,
                    'action' => [
                        'class' => 'btn-danger',
                        'route' => 'admin.cooperators.destroy',
                        'parameters' => $cooperator->id,
                        'label' => __('Delete'),
                    ],
                    'attributes' => '',
                    'message' => __('Are you sure you want to delete the cooperator?'),
                    'index' => $cooperator->id,
                    ])
            </div>
        </div>
    </div>
    @section('formAction')
    @show
    @section('modal')
    @show
    <script type="text/javascript">
        function comeBack() {
            window.location = "{{ route('admin.cooperators.index') }}"
        }
    </script>
@endsection