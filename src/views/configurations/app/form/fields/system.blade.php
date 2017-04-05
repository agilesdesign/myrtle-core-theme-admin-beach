<div class="form-group{{ $errors->has('env') ? ' has-danger' : '' }}">
    <label for="env">Environment</label>

    <select name="env" id="env" class="form-control select2">
        <option value="" hidden selected disabled>Select session env</option>
        @foreach(config('app.environments') as $env)
            <option value="{{ $env }}"{{ $env == config('app.env') ? ' selected' : '' }}>{{ $env }}</option>
        @endforeach
    </select>

    {!! $errors->first('env', '<div class="form-control-feedback">:message</div>') !!}
</div>

<div class="form-group{{ $errors->has('debug') ? ' has-danger' : '' }}">
    {{ Form::label('debug', 'Debug', ['class' => 'control-label']) }}
    {{ Form::select('debug', [0 => 'Off', 1 => 'On'], $configuration['debug'], ['class' => 'select2 form-control']) }}

    {!! $errors->first('debug', '<div class="form-control-feedback">:message</div>') !!}
</div>

<div class="form-group{{ $errors->has('ssl') ? ' has-danger' : '' }}">
    {{ Form::label('ssl', 'Secure (SSL)', ['class' => 'control-label']) }}
    {{ Form::select('ssl', [0 => 'Off', 1 => 'On'], $configuration['ssl'] ?? null, ['class' => 'select2 form-control']) }}

    {!! $errors->first('ssl', '<div class="form-control-feedback">:message</div>') !!}
</div>