@extends('admin::index')

@section('page-title')
    Vendor
@endsection

@section('breadcrumbs')
    <a href="{{ route('admin.vendors.index') }}" class="breadcrumb-item">Vendors</a>
    <span class="breadcrumb-item active">Create</span>
@endsection


@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'create-vendor'] ) }}
    <a class="btn btn-outline-warning" href="{{ route('admin.vendors.index') }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('dock')
    {!! Form::open(['route' => 'admin.vendors.store', 'id' => 'create-vendor', 'class' => 'item']) !!}

    <div class="form-group{{ $errors->has('legal_name') ? ' has-danger' : '' }}">
        {!! Form::label('legal_name', 'Legal Name') !!}
        {!! Form::text('legal_name', null, ['class' => 'form-control']) !!}

        {!! $errors->first('legal_name', '<div class="form-control-feedback">:message</div>') !!}
    </div>

    <div class="form-group">
        {!! Form::label('previous_legal_names[]', 'Previous Legal Names') !!}
        {!! Form::select('previous_legal_names[]', [], [], ['class' => 'form-control select', 'multiple' => 'multiple']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('alternative_names[]', 'Alternative Names') !!}
        {!! Form::select('alternative_names[]', [], [], ['class' => 'form-control select', 'multiple' => 'multiple']) !!}
    </div>

    {!! Form::close() !!}
@endsection

@push('scripts')
<script>
    $(function(){
        $('.select').select2({
            tags: true
        });
    });
</script>
@endpush