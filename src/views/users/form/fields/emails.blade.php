<div class="form-group{{ $errors->has('emails.0.address') ? ' has-danger' : '' }}">
    <label for="emails[0][address]">Email</label>
    <input class="form-control" name="emails[0][address]" id="emails[0][address]" type="text" placeholder="example@myrtle.wms">

    {!! $errors->first('emails.0.address', '<div class="form-control-feedback">:message</div>') !!}
</div>