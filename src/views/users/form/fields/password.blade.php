<div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
    <label for="password">Password</label>
    <input class="form-control" name="password" id="password" type="password">

    {!! $errors->first('password', '<div class="form-control-feedback">:message</div>') !!}
</div>

<div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
    <label for="password_confirmation">Password Confirmation</label>
    <input class="form-control" name="password_confirmation" id="password" type="password">

    {!! $errors->first('password', '<div class="form-control-feedback">:message</div>') !!}
</div>