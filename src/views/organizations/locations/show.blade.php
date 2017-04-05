@extends('admin::index')

@section('page-title')
    {{ $location->name }}
    <small class="text-muted">
        Location
    </small>
    <small class="pull-right">
        <a href="{{ route('admin.organizations.show', $organization->id) }}">
            {{ $organization->name }}
        </a>
    </small>
@endsection

@section('toolbar')
    <a class="btn btn-secondary" href="{{ route('admin.organizations.locations.edit', [$organization->id, $location->id]) }}"><i class="fa fa-fw fa-pencil"></i> Edit</a>
@endsection

@section('content')
    <div class="contact-information mb-2">
        <h4>Contact Information</h4>
        <div class="row location-addresses">
            <div class="col-xs-12">
                <h5>
                    Address
                    <small>
                        <a href="{{ route('admin.organizations.locations.addresses.create', [$organization->id, $location->id]) }}">
                            <i class="fa fa-fw fa-plus"></i>
                        </a>
                    </small>
                </h5>
            </div>
            @if(!$location->addresses->isEmpty())
                @foreach($location->addresses as $address)
                    <div class="location-address col-xs-6">
                        <div class="card bg-faded">
                            <div class="card-block">
                                <div class="card-title">
                                    <h6>
                                        <strong>{{ $address->type->name }}</strong>
                                        <small class="pull-right hidden-sm-up item-actions">
                                            <a href="{{ route('admin.organizations.locations.addresses.edit', [$organization->id, $location->id, $address->id]) }}">
                                                <i class="fa fa-fw fa-pencil"></i>
                                            </a>
                                        </small>
                                    </h6>
                                </div>
                                <address>
                                    {{ $address->street }}<br>
                                    {{ $address->city }}, {{ $address->state }} {{ $address->zip }}<br>
                                </address>
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
                    <small>
                        <a href="{{ route('admin.organizations.locations.phones.create', [$organization->id, $location->id]) }}">
                            <i class="fa fa-fw fa-plus"></i>
                        </a>
                    </small>
                </h5>
            </div>
            @if(!$location->phones->isEmpty())
                @foreach($location->phones as $phone)
                    <div class="location-phone col-xs-3">
                        <div class="card bg-faded">
                            <div class="card-block">
                                <div class="card-title">
                                    <h6>
                                        {{ $phone->type->name }} <small>{{ $phone->number }}</small>
                                        <small class="pull-right hidden-sm-up item-actions">
                                            <a href="{{ route('admin.organizations.locations.phones.edit', [$organization->id, $location->id, $phone->id]) }}">
                                                <i class="fa fa-fw fa-pencil"></i>
                                            </a>
                                        </small>
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