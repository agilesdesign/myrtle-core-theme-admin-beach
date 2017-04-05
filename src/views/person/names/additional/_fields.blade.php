<div class="form-group">
    {{ Form::label($namepreferredfield ?? 'preferred', 'Preferred name', ['class' => 'control-label']) }}
    {{ Form::text($nameprefferredfield ?? 'preferred', null, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label($namenicknamefield ?? 'nickname', 'Nickname', ['class' => 'control-label']) }}
    {{ Form::text($namenicknamefield ?? 'nickname', null, ['class' => 'form-control']) }}
</div>