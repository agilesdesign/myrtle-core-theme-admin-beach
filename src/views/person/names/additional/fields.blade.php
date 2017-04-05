<div class="form-group{{ $errors->has('preferred') ? ' has-danger' : '' }}">
    <label for="preferred">Preferred</label>
    <input class="form-control" name="preferred" id="preferred" type="text" placeholder="Preferred" value="{{ $user->name->preferred }}">

    {!! $errors->first('preferred', '<div class="form-control-feedback">:message</div>') !!}
</div>

<div class="form-group">
    <label for="nickname">Nickname</label>
    <input class="form-control" name="nickname" id="nickname" type="text" placeholder="Nickname" value="{{ $user->name->nickname }}">

    {!! $errors->first('nickname', '<div class="form-control-feedback">:message</div>') !!}
</div>