<div class="form-group{{ $errors->has($ability->name . '-roles') ? ' has-danger' : '' }}">
    {!! Form::label($ability->name . '-roles', 'Roles') !!}
    {!! Form::select($ability->name . '[roles][]', $roles, $ability->roles->pluck('id')->toArray(), ['class' => 'form-control select2', 'multiple' => true]) !!}

    {!! $errors->first($ability->name . '[roles]', '<div class="form-control-feedback">:message</div>') !!}
</div>