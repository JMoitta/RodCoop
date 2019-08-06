<button type="button" class="btn {{ $action['class']}}" data-toggle="modal" data-target="#exampleModalCenter">
    {{$action['label']}}
</button>
@section('formAction')
    @parent
    <form id="formDelete{{ $index}}" action="{{ route($action['route'], $action['parameters']) }}" method="POST">
        @csrf
        @method('DELETE')
    </form>
@endsection
@section('modal')
    @component('modal.modal', ['title' => __('Warning'), 'formId' => 'formDelete' . $index])
        {{ $message }}
    @endcomponent
@endsection