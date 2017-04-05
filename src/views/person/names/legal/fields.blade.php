<div class="form-group{{ $errors->has('first') || $errors->has('name.first') ? ' has-danger' : '' }}">
    <label for="{{ $namefirstfield ?? 'first' }}">First</label>
    <input class="form-control" name="{{ $namefirstfield ?? 'first' }}" id="{{ $namefirstfield ?? 'first' }}" type="text" placeholder="First" value="{{ $user->name->first ?? null}}">

    {!! $errors->first('first', '<div class="form-control-feedback">:message</div>') !!}
    {!! $errors->first('name.first', '<div class="form-control-feedback">:message</div>') !!}
</div>

<div class="form-group{{ $errors->has('middle') || $errors->has('name.middle') ? ' has-danger' : '' }}">
    <label for="{{ $namemiddlename ?? 'middle' }}">Middle</label>
    <input class="form-control" name="{{ $namemiddlename ?? 'middle' }}" id="{{ $namemiddlename ?? 'middle' }}" type="text" placeholder="Middle" value="{{ $user->name->middle ?? null}}">

    {!! $errors->first('middle', '<div class="form-control-feedback">:message</div>') !!}
    {!! $errors->first('name.middle', '<div class="form-control-feedback">:message</div>') !!}
</div>

<div class="form-group{{ $errors->has('last') || $errors->has('name.last') ? ' has-danger' : '' }}">
    <label for="{{ $namelastfield ?? 'last' }}">Last</label>
    <input class="form-control" name="{{ $namelastfield ?? 'last' }}" id="{{ $namelastfield ?? 'last' }}" type="text" placeholder="Last" value="{{ $user->name->last ?? null}}">

    {!! $errors->first('last', '<div class="form-control-feedback">:message</div>') !!}
    {!! $errors->first('name.last', '<div class="form-control-feedback">:message</div>') !!}
</div>