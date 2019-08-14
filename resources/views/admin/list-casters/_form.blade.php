@component('form._form_group',['field' => 'description'])
    {{ Form::label('description',__('Description')) }}
    {{ Form::text('description',null,['class' => 'form-control'.($errors->has('description')?' is-invalid':'')]) }}
@endcomponent