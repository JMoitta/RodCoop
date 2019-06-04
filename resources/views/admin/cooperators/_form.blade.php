@component('form._form_group',['field' => 'name'])
    {{ Form::label('name',__('Name'),['class' => 'mr-sm-2']) }}
    {{ Form::text('name',null,['class' => 'form-control mr-sm-2'.($errors->has('name')?' is-invalid':'')]) }}
@endcomponent
@component('form._form_group',['field' => 'administrative_region_id'])
    {{ Form::label('administrative_region_id',__('Administrative region'), ['class' => 'mr-sm-2']) }}
    {{ Form::select('administrative_region_id', $listAdministrativeRegion, null, ['class' => 'form-control mr-sm-2'.($errors->has('administrative_region_id')?' is-invalid':'')]) }}
@endcomponent