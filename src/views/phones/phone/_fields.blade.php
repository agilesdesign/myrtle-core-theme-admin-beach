<div class="form-group{{ $errors->has('type_id') ? ' has-danger' : '' }}">
    {!! Form::label('type_id', 'Type') !!}
    {!! Form::select('type_id', $phonetypes, null, ['class' => 'form-control select2', 'placeholder' => 'Select phone type..']) !!}

    {!! $errors->first('type_id', '<div class="form-control-feedback">:message</div>') !!}
</div>

<div class="form-group">
    {!! Form::label('number', 'Number') !!}
    <div class="form-inline">
        {{--{!! Form::select('calling_code_id', $codes, $defaultCode, ['class' => 'form-control select2']) !!}--}}
        {!! Form::text('area_code', null, ['class' => 'editor form-control', 'size' => '4']) !!}
        {!! Form::text('subscriber_number', null, ['class' => 'editor form-control', 'size' => '8']) !!}
    </div>
</div>
