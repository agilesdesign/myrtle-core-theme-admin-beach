@extends('admin::index')

@section('page-title')
    {{$vendor->legal_name}}
    <small class="h5">
        <i class="fa fa-fw fa-tag"></i>
        @foreach($vendor->commodities as $commodity)
            <span class="tag tag-primary"> {{ $commodity->name }} </span>
        @endforeach
        @can('commoditiesEdit', $vendor)
            <a href="{{ route('admin.vendors.commodities.edit', $vendor->id) }}">
                <i class="fa fa-fw fa-pencil"></i>
            </a>
        @endcan
    </small>
@endsection

@section('page-description')
    <i class="fa fa-fw fa-globe"></i>
    {{--@if($vendor->website->address)--}}
        {{--<a href="{{ $vendor->website->address }}">{{ $vendor->website->address }}</a>--}}
    {{--@endif--}}
    @can('websiteEdit', $vendor)
        <a href="{{ route('admin.vendors.website.edit', $vendor->id) }}">
            <i class="fa fa-fw fa-pencil"></i>
        </a>
    @endcan
@endsection

@section('breadcrumbs')
    <a class="breadcrumb-item" href="{{ route('admin.vendors.index') }}">Vendors</a>
    <span class="breadcrumb-item active">{{ $vendor->legal_name }}</span>
@endsection

@section('toolbar')
    @can('edit', $vendor)
        <a class="btn btn-secondary" href="{{ route('admin.vendors.edit', $vendor->id) }}">
            <i class="fa fa-fw fa-pencil"></i>
            Edit
        </a>
    @endcan
    @can('admin', $vendor)
        <a class="btn btn-secondary" href="{{ route('admin.vendors.settings.edit', $vendor->id) }}">
            <i class="fa fa-fw fa-gears"></i>
            Settings
        </a>
    @endcan
    @can('edit', $vendor)
        <a class="btn btn-secondary" href="{{ route('admin.vendors.permissions.edit', $vendor->id) }}">
            <i class="fa fa-fw fa-lock"></i>
            Permissions
        </a>
    @endcan
    @can('delete', $vendor)
        {{ Form::button('<i class="fa fa-fw fa-trash"></i> Delete', ['class' => 'btn btn-outline-danger', 'type' => 'submit', 'form' => 'delete-vendor'] ) }}
    @endcan
    {!! Form::model($vendor, ['route' => ['admin.vendors.destroy', $vendor->id], 'method' => 'DELETE', 'id' => 'delete-vendor']) !!}
    {!! Form::close() !!}
@endsection

@section('dock')
    <div class="basic-information mt-2 mb-2">
        <h3>
            Information
        </h3>
        <div class="row vendor-name">
            <div class="col-xs-6">
                <h4>
                    Names
                </h4>
                <div class="card bg-faded">
                    <div class="card-block">
                        <h5>Legal: <small> {{ $vendor->legal_name }}</small></h5>
                        <h5>Previous:
                        @foreach($vendor->previous_legal_names as $name)
                            <small>{{ $name }}</small>
                        @endforeach
                        </h5>
                        <h5>Alternative:
                        @foreach($vendor->alternative_names as $name)
                            <small>{{ $name }}</small>
                        @endforeach
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-xs-6">
                @can('biographView', $vendor)
                    <h4>
                        Government
                    </h4>
                    <div class="card bg-faded">
                        <div class="card-block">
                            @if($vendor->duns || $vendor->ein || $vendor->tin || $vendor->maritalstatus || $vendor->religion)
                                @if($vendor->duns)
                                    <h5>DUNS: <small>{{ $vendor->duns }}</small></h5>
                                @endif
                                @if($vendor->ein)
                                    <h5>EIN: <small>{{ $vendor->ein }}</small></h5>
                                @endif
                                @if($vendor->tin)
                                    <h5>TIN: <small>{{ $vendor->tin }}</small></h5>
                                @endif
                            @else
                                <h5>No government information for this vendor</h5>
                            @endif
                        </div>
                    </div>
                @endcan
            </div>
        </div>
    </div>
    @if(Gate::allows('locationsView', $vendor))
        <div class="contact-information mb-2">
            <h5>
                Locations
                @can('locationsCreate', $vendor)
                    <small>
                        <a href="{{ route('admin.vendors.locations.create', [$vendor->id]) }}">
                            <i class="fa fa-fw fa-plus"></i>
                        </a>
                    </small>
                @endcan
            </h5>
            @can('locationsView', $vendor)
                <div class="row vendor-locations">
                    @if(!$vendor->locations->isEmpty())
                        @foreach($vendor->locations as $location)
                            <div class="vendor-address col-xs-4">
                                <div class="card bg-faded">
                                    <div class="card-block">
                                        @can('addressesEdit', $vendor)
                                            <div class="pull-right hidden-sm-up item-actions">
                                                <a href="{{ route('admin.vendors.locations.edit', [$vendor->id, $location->id]) }}">
                                                    <i class="fa fa-fw fa-pencil"></i>
                                                </a>
                                            </div>
                                        @endcan
                                        {{ $location->name }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-xs-12">
                            <div class="card bg-faded">
                                <div class="card-block">
                                    <p>No locations added to vendor</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endcan
        </div>
    @endif
@endsection

@push('scripts')
    <script>
        $(function() {
            $('.card').hover(
                    function(){
                        $(this).find('.actions').toggleClass('hidden-sm-up');
                        console.log($(this));
                    },
                    function(){
                        $(this).find('.actions').toggleClass('hidden-sm-up');
                    }
            );
        });
    </script>

@endpush