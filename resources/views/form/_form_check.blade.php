<div class="form-group{{ $class }}">
    <div class="form-check">
        {{ $slot }}
        @include('form._help_block',['field' => $field])
    </div>
</div>