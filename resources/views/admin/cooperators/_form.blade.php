@component('form._form_group',['field' => 'name'])
    {{ Form::label('name',__('Name'),['class' => 'mr-sm-2']) }}
    {{ Form::text('name',null,['class' => 'form-control mr-sm-2'.($errors->has('name')?' is-invalid':'')]) }}
@endcomponent