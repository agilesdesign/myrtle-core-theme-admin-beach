@extends('admin::index')

@section('page-title')
    {{ $location->name }}
    <small class="text-muted">
        Location
    </small>
    <small class="pull-right">
        <a href="{{ route('admin.vendors.show', $vendor->id) }}">
            {{ $vendor->legal_name }}
        </a>
    </small>
@endsection

@section('toolbar')
    @can('locationsEdit', $vendor)
        <a class="btn btn-secondary" href="{{ route('admin.vendors.locations.edit', [$vendor->id, $location->id]) }}"><i class="fa fa-fw fa-pencil"></i> Edit</a>
    @endcan
@endsection

@section('dock')
    <div class="contact-information mb-2">
        <h4>Contact Information</h4>
        <div class="row location-addresses">
            <div class="col-xs-12">
                <h5>
                    Address
                    @can('locationsEdit', $vendor)
                        <small>
                            <a href="{{ route('admin.vendors.locations.addresses.create', [$vendor->id, $location->id]) }}">
                                <i class="fa fa-fw fa-plus"></i>
                            </a>
                        </small>
                    @endcan
                </h5>
            </div>
            @if(!$location->addresses->isEmpty())
                @foreach($location->addresses as $address)
                    <div class="location-address col-xs-6">
                        <div class="card bg-faded">
                            <div class="card-block">
                                @can('locationsEdit', $vendor)
                                    <div class="pull-right hidden-sm-up item-actions">
                                        <a href="{{ route('admin.vendors.locations.addresses.edit', [$vendor->id, $location->id, $address->id]) }}">
                                            <i class="fa fa-fw fa-pencil"></i>
                                        </a>
                                    </div>
                                @endcan

                                @include('admin::addresses.address.address')

                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-xs-12">
                    <div class="card bg-faded">
                        <div class="card-block">
                            <p>No addresses added to location</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <div class="row location-phones">
            <div class="col-xs-12">
                <h5>
                    Phone
                    @can('locationsEdit', $vendor)
                        <small>
                            <a href="{{ route('admin.vendors.locations.phones.create', [$vendor->id, $location->id]) }}">
                                <i class="fa fa-fw fa-plus"></i>
                            </a>
                        </small>
                    @endcan
                </h5>
            </div>
            @if(!$location->phones->isEmpty())
                @foreach($location->phones as $phone)
                    <div class="location-phone col-xs-3">
                        <div class="card bg-faded">
                            <div class="card-block">
                                <div class="card-title">
                                    <h6>
                                        {{ $phone->type->name }}
                                        <small>
                                            {{ \libphonenumber\PhoneNumberUtil::getInstance()->format(\libphonenumber\PhoneNumberUtil::getInstance()->parse($phone->number, $phone->callingCode->country->alpha_2_code), \libphonenumber\PhoneNumberFormat::NATIONAL) }}
                                        </small>
                                        @can('locationsEdit', $vendor)
                                            <smal class="pull-right hidden-sm-up item-actions">
                                                <a href="{{ route('admin.vendors.locations.phones.edit', [$vendor->id, $location->id, $phone->id]) }}">
                                                    <i class="fa fa-fw fa-pencil"></i>
                                                </a>
                                            </smal>
                                        @endcan
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-xs-12">
                    <div class="card bg-faded">
                        <div class="card-block">
                            <p>No phones added to location</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            $('.location-address, .location-phone').hover(
                    function(){
                        $(this).find('.item-actions').toggleClass('hidden-sm-up');
                    },
                    function(){
                        $(this).find('.item-actions').toggleClass('hidden-sm-up');
                    }
            );
        });
    </script>
@endsection