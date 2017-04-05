<div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
    {{ Form::label('name', 'Name', ['class' => 'control-label']) }}
    {{ Form::text('name', $configuration['name'], ['class' => 'form-control']) }}

    {!! $errors->first('name', '<div class="form-control-feedback">:message</div>') !!}
</div>

<div class="form-group{{ $errors->has('url') ? ' has-danger' : '' }}">
    {{ Form::label('url', 'Base URL', ['class' => 'control-label']) }}
    {{ Form::text('url', $configuration['url'], ['class' => 'form-control']) }}

    {!! $errors->first('url', '<div class="form-control-feedback">:message</div>') !!}
</div>

<div class="form-group{{ $errors->has('timezone') ? ' has-danger' : '' }}">
    {{ Form::label('timezone', 'Timezone', ['class' => 'control-label']) }}
    {{ Form::select('timezone', $timezones->toArray(), $configuration['timezone'], ['class' => 'form-control select2']) }}

    {!! $errors->first('timezone', '<div class="form-control-feedback">:message</div>') !!}
</div>

<div class="form-group{{ $errors->has('paginate') ? ' has-danger' : '' }}">
    {{ Form::label('paginate', 'Default Items Per Page', ['class' => 'control-label']) }}
    {{ Form::select('paginate', $paginate, $configuration['paginate'] ?? 15, ['class' => 'select2 form-control']) }}

    {!! $errors->first('paginate', '<div class="form-control-feedback">:message</div>') !!}
</div>