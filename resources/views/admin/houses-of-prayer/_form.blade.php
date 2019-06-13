@component('form._form_group',['field' => 'locality'])
    {{ Form::label('locality',__('Locality')) }}
    {{ Form::text('locality',null,['class' => 'form-control'.($errors->has('locality')?' is-invalid':'')]) }}
@endcomponent
@component('form._form_group',['field' => 'administrative_region_id'])
    {{ Form::label('administrative_region_id',__('Administrative region')) }}
    {{ Form::select('administrative_region_id', $listAdministrativeRegion, null, ['class' => 'form-control'.($errors->has('administrative_region_id')?' is-invalid':'')]) }}
@endcomponent
@component('form._form_group',['field' => 'cooperator_craft_id'])
    {{ Form::label('cooperator_craft_id',__('Cooperator of office')) }}
    {{ Form::select('cooperator_craft_id', $listCooperator , null, ['class' => 'form-control'.($errors->has('cooperator_craft_id')?' is-invalid':'')]) }}
@endcomponent
<fieldset class="form-group row">
    <legend class="col-form-legend col">{{ __('Weekend cults')}}</legend>
    <div class="col">
        @component('form._form_check',['field' => 'saturday', 'class' => ''])
            {{ Form::checkbox('saturday', "1", false, ['class' => 'form-check-input'.($errors->has('saturday')?' is-invalid':'')]) }}
            {{ Form::label('saturday',__('Saturday at 7:30 p.m.'), ['class' => 'form-check-label']) }}
        @endcomponent
        @component('form._form_check',['field' => 'sunday', 'class' => ''])
            {{ Form::checkbox('sunday', "1", false, ['class' => 'form-check-input'.($errors->has('sunday')?' is-invalid':'')]) }}
            {{ Form::label('sunday',__('Sunday at 7:30 p.m.'), ['class' => 'form-check-label']) }}
        @endcomponent
    </div>
</fieldset>
@component('form._form_group',['field' => 'address'])
    {{ Form::label('address',__('Address')) }}
    {{ Form::text('address',null,['class' => 'form-control'.($errors->has('address')?' is-invalid':'')]) }}
@endcomponent