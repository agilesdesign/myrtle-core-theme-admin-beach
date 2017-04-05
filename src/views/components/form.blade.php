<form
        role="form"
        method="POST"
        action="{{ $action }}"
        {!! isset($id) ?  ' id="' . $id . '" ' : '' !!}
        {!! isset($class) ?  ' class="' . $class . '" ' : '' !!}
        {!! isset($files) && $files ? ' enctype="multipart/form-data"' : '' !!}
>
    {{ $fields }}
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="{{ $method }}">
</form>