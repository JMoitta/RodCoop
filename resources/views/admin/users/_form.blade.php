@component('form._form_group',['field' => 'name', 'classes' => 'row'])
    {{ Form::label('name',__('Name'),['class' => 'col-sm-2']) }}
    <div class="col-sm-10">
        {{ Form::text('name',null,['class' => 'form-control-plaintext mr-sm-2'.($errors->has('name')?' is-invalid':''), 'readonly']) }}
    </div>
@endcomponent
@component('form._form_group',['field' => 'administrative_region_id', 'classes' => 'row'])
    {{ Form::label('name',__('Administrative region'),['class' => 'col-sm-2']) }}
    <div class="col-sm-10">
        {{ Form::select('administrative_region_id', $listAdministrativeRegion , null, ['class' => 'custom-select'.($errors->has('administrative_region_id')?' is-invalid':'')]) }}
    </div>
@endcomponent