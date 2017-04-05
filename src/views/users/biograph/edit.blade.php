@extends('admin::index')

@section('page-title')
    Biograph
@endsection

@section('page-description')
    {{ $user->name->firstLast }}
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'edit-user-biograph'] ) }}
    <a class="btn btn-outline-warning" href="{{ url()->previous() }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('dock')
    {{ Form::model($user->biograph, ['route' => ['admin.users.biograph.update', $user->id], 'method' => 'PUT', 'id' => 'edit-user-biograph']) }}

    <div class="form-group">
        {!! Form::label('birth_date', 'Birthdate') !!}
        {!! Form::date('birth_date', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('gender_id', 'Gender') !!}
        {!! Form::select('gender_id', $genders, null, ['class' => 'form-control', 'placeholder' => 'Select gender..']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('ethnicity_id', 'Ethnicity') !!}
        {!! Form::select('ethnicity_id', $ethnicities, null, ['class' => 'form-control', 'placeholder' => 'Select ethnicity..']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('marital_status_id', 'Marital Status') !!}
        {!! Form::select('marital_status_id', $maritalstatuses, null, ['class' => 'form-control', 'placeholder' => 'Select marital status..']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('religion_id', 'Religion') !!}
        {!! Form::select('religion_id', $religions, null, ['class' => 'form-control', 'placeholder' => 'Select religion..']) !!}
    </div>

    {{ Form::close() }}
@endsection