@extends('admin::index')

@section('page-title')
    Add Note
    <small class="pull-right">
        <a href="{{ route('admin.vendors.show', $vendor) }}">{{ $vendor->name->legal }}
        </a>
    </small>
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-success', 'type' => 'submit', 'form' => 'create-note'] ) }}
    <a class="btn btn-danger" href="{{ route('admin.vendors.index') }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('content')
    {!! Form::model($note, ['route' => ['admin.vendors.notes.store', $vendor->id], 'id' => 'create-note']) !!}

    <div class="form-group">
        {!! Form::label('note', 'Note') !!}
        {!! Form::textarea('note', null, ['class' => 'editor form-control']) !!}
    </div>

    {!! Form::close() !!}
@endsection