<div class="form-group{{ $errors->has('first') || $errors->has('name.first') ? ' has-danger' : '' }}">
    {!! Form::label($namefirstfield ?? 'first', 'First') !!}
    {!! Form::text($namefirstfield ?? 'first', null, ['class' => 'form-control', 'placeholder' => 'First']) !!}

    {!! $errors->first('first', '<div class="form-control-feedback">:message</div>') !!}
    {!! $errors->first('name.first', '<div class="form-control-feedback">:message</div>') !!}
</div>

<div class="form-group{{ $errors->has('middle') || $errors->has('name.middle') ? ' has-danger' : '' }}">
    {!! Form::label($namemiddlefield ?? 'middle', 'Middle') !!}
    {!! Form::text($namemiddlefield ?? 'middle', null, ['class' => 'form-control', 'placeholder' => 'Middle']) !!}

    {!! $errors->first('middle', '<div class="form-control-feedback">:message</div>') !!}
    {!! $errors->first('name.middle', '<div class="form-control-feedback">:message</div>') !!}
</div>

<div class="form-group{{ $errors->has('last') || $errors->has('name.last') ? ' has-danger' : '' }}">
    {!! Form::label($namelastfield ?? 'last', 'Last') !!}
    {!! Form::text($namelastfield ?? 'last', null, ['class' => 'form-control', 'placeholder' => 'Last']) !!}

    {!! $errors->first('last', '<div class="form-control-feedback">:message</div>') !!}
    {!! $errors->first('name.last', '<div class="form-control-feedback">:message</div>') !!}
</div>