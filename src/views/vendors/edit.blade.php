@extends('admin::index')

@section('page-title')
    Edit Vendor
@endsection

@section('toolbar')
    {{ Form::button('<i class="fa fa-fw fa-check"></i> Save', ['class' => 'btn btn-outline-success', 'type' => 'submit', 'form' => 'edit-vendor'] ) }}
    <a class="btn btn-outline-warning" href="{{ route('admin.vendors.show', $vendor) }}"><i class="fa fa-fw fa-times"></i> Cancel</a>
@endsection

@section('dock')

    {!! Form::model($vendor, ['route' => ['admin.vendors.update', $vendor->id], 'method' => 'PUT', 'id' => 'edit-vendor']) !!}

    <div class="names-information mt-3 mb-3">
        <h4>
            <strong>
                Names
            </strong>
        </h4>
        <div class="form-group">
            {!! Form::label('legal_name', 'Legal') !!}
            {!! Form::text('legal_name', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="biographic-information mt-3 mb-3">
        <h4>
            <strong>
                Biographic
            </strong>
        </h4>
        <div class="form-group">
            {!! Form::label('commodities', 'Commodities') !!}
            {!! Form::select('commodities[]', $commodities, $vendor->commodities->pluck('id')->toArray(), ['class' => 'form-control select2', 'multiple' => 'multiple']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('established_at', 'Established') !!}
            {!! Form::datetime('established_at', null, ['class' => 'form-control datetimepicker']) !!}
        </div>
    </div>

    <div class="names-information mt-3 mb-3">
        <h4>
            <strong>
                Government
            </strong>
        </h4>

        <div class="form-group">
            {!! Form::label('ein', 'Employer Identification Number (EIN)') !!}
            {!! Form::text('ein', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('tin', 'U.S. Tax Identification Number (TIN)') !!}
            {!! Form::text('tin', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('duns', 'D&B D-U-N-S Number') !!}
            {!! Form::text('duns', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    <div class="names-information mt-3 mb-3">
        <h4>
            <strong>
                Demographic
            </strong>
        </h4>

        <div class="form-group">
            {!! Form::label('fulltime_employees', '# of Fulltime Employees') !!}
            {!! Form::text('fulltime_employees', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('customers_in_state', '# of in State customers') !!}
            {!! Form::text('customers_in_state', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('customers_domestic', '# of Domestic customers (excluding in State)') !!}
            {!! Form::text('customers_domestic', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('customers_international', '# of International customers') !!}
            {!! Form::text('customers_international', null, ['class' => 'form-control']) !!}
        </div>
    </div>

    {!! Form::close() !!}
@endsection