<div class="form-group">
    {!! Form::label('type_id', 'Type') !!}
    {!! Form::select('type_id', $types, null, ['class' => 'form-control select2', 'placeholder' => 'Select address type..']) !!}
</div>

<div class="form-group">
    {!! Form::label('formatted', 'Formatted') !!}
    {!! Form::text('formatted', null, ['class' => 'editor form-control', 'data-geo' => 'formatted_address']) !!}
</div>

<div id="map" style="height: 400px; width: 100%;"></div>

@push('scripts')
    <script>
        $('[name="formatted"]').geocomplete({
            details: 'form',
            detailsAttribute: 'data-geo',
            map: '#map',
            location: $('[name="formatted"]').val()
        });
    </script>
@endpush