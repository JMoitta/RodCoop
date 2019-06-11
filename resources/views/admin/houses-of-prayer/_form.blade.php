@component('form._form_group',['field' => 'locality'])
    {{ Form::label('locality',__('Locality'),['class' => 'mr-sm-2']) }}
    {{ Form::text('locality',null,['class' => 'form-control mr-sm-2'.($errors->has('locality')?' is-invalid':'')]) }}
@endcomponent
@component('form._form_group',['field' => 'administrative_region_id'])
    {{ Form::label('administrative_region_id',__('Administrative region'), ['class' => 'mr-sm-2']) }}
    {{ Form::select('administrative_region_id', $listAdministrativeRegion, null, ['class' => 'form-control mr-sm-2'.($errors->has('administrative_region_id')?' is-invalid':'')]) }}
@endcomponent