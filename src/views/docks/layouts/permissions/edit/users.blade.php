<div class="form-group{{ $errors->has($ability->name . '-users') ? ' has-danger' : '' }}">
    {!! Form::label($ability->name . '-users', 'Users') !!}
    {!! Form::select($ability->name . '[users][]', $users, $ability->users->pluck('id')->toArray(), ['class' => 'form-control select2', 'multiple' => true, 'placeholder' => 'Select Users..']) !!}

    {!! $errors->first($ability->name . '[users]', '<div class="form-control-feedback">:message</div>') !!}
</div>