@extends('admin::index')

@section('page-title')
    {{ $user->name->firstLast }} <small>(#{{ $user->id }})</small>
@endsection

@section('page-description')
    @foreach($user->roles as $role)
        <span class="tag tag-primary"> {{ $role->name }} </span>
    @endforeach
@endsection

@section('breadcrumbs')
    <a href="{{ route('admin.users.index') }}" class="breadcrumb-item">Users</a>
    <span class="breadcrumb-item">{{ $user->name->firstLast }}</span>
@endsection

@section('toolbar')
    @can('roles.admin', \Myrtle\Roles\Policies\RolesPolicy::class)
        <a class="btn btn-secondary" href="{{ route('admin.users.roles.edit', $user) }}">
            <i class="fa fa-fw fa-users"></i>
            Roles
        </a>
    @endcan
    @can('users.admin')
        <a class="btn btn-secondary" href="{{ route('admin.users.permissions.edit', $user->id) }}">
            <i class="fa fa-fw fa-shield"></i>
            Permissions
        </a>
    @endcan
    @can('update', $user)
        <a class="btn btn-secondary" href="{{ route('admin.users.password.edit', $user->id) }}">
            <i class="fa fa-fw fa-lock"></i>
            Password
        </a>
    @endcan
    @can('delete', $user)
        {{ Form::button('<i class="fa fa-fw fa-trash"></i> Delete', ['class' => 'btn btn-outline-danger', 'type' => 'submit', 'form' => 'delete-user'] ) }}
    @endcan
    {!! Form::model($user, ['route' => ['admin.users.destroy', $user->id], 'method' => 'DELETE', 'id' => 'delete-user', 'data-confirm' => 'delete-one']) !!}
    {!! Form::close() !!}
@endsection

@section('dock')
    <div class="basic-information mt-2 mb-2">
        <h4>
            Basic Information
        </h4>
        <div class="row user-name">
            <div class="col-xs-12">
                <h5>
                    Name
                    @can('nameEdit', $user)
                        <small>
                            <a href="{{ route('admin.users.name.edit', [$user->id]) }}">
                                <i class="fa fa-fw fa-pencil"></i>
                            </a>
                        </small>
                    @endcan
                </h5>
                <div class="card bg-faded">
                    <div class="card-block">
                        <h6>Full: <small> {{ $user->name->full }}</small></h6>
                        @if($user->name->preferred)
                            <h6>Preferred: <small>{{ $user->name->preferred }}</small></h6>
                        @endif
                        @if($user->name->nickname)
                            <h6>Nickname: <small>{{ $user->name->nickname }}</small></h6>
                        @endif
                    </div>
                </div>
                @can('biographView', $user)
                    <h5>
                        Biograph
                        @can('biographEdit', $user)
                            <small>
                                <a href="{{ route('admin.users.biograph.edit', [$user->id]) }}">
                                    <i class="fa fa-fw fa-pencil"></i>
                                </a>
                            </small>
                        @endcan
                    </h5>
                    <div class="card bg-faded">
                        <div class="card-block">
                            @if($user->biograph->birth_date || $user->biograph->gender || $user->biograph->ethnicity || $user->biograph->maritalstatus || $user->biograph->religion)
                                @if($user->biograph->birth_date)
                                    <h6>Birth date: <small>{{ $user->biograph->birth_date->toFormattedDateString() }}</small></h6>
                                @endif
                                @if($user->biograph->gender)
                                    <h6>Gender: <small>{{ $user->biograph->gender->name }}</small></h6>
                                @endif
                                @if($user->biograph->ethnicity)
                                    <h6>Ethnicity: <small>{{ $user->biograph->ethnicity->name }}</small></h6>
                                @endif
                                @if($user->biograph->maritalstatus)
                                    <h6>Marital Status: <small>{{ $user->biograph->maritalstatus->name }}</small></h6>
                                @endif
                                @if($user->biograph->religion)
                                    <h6>Religion: <small>{{ $user->biograph->religion->name }}</small></h6>
                                @endif
                            @else
                                <p>No biograph information for this user</p>
                            @endif
                        </div>
                    </div>
                @endcan
            </div>
        </div>
    </div>

    @if(Gate::allows('addressesView', $user) || Gate::allows('emailsView', $user) || Gate::allows('phonesView', $user))
        <div class="contact-information mb-2">
            <h4>Contact Information</h4>
            @can('addressesView', $user)
                <div class="row user-addresses">
                    <div class="col-xs-12">
                        <h5>
                            Address
                            @can('addressesCreate', $user)
                                <small>
                                    <a href="{{ route('admin.users.addresses.create', [$user->id]) }}">
                                        <i class="fa fa-fw fa-plus"></i>
                                    </a>
                                </small>
                            @endcan
                        </h5>
                    </div>
                    @if(!$user->addresses->isEmpty())
                        @foreach($user->addresses as $address)
                            <div class="user-address col-xs-4">
                                <div class="card bg-faded">
                                    <div class="card-block">
                                        @can('addressesEdit', $user)
                                            <div class="pull-right hidden-sm-up item-actions">
                                                <a href="{{ route('admin.users.addresses.edit', [$user->id, $address->id]) }}">
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
                                    <p>No addresses added to user</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endcan
            @can('emailsView', $user)
                <div class="row user-emails">
                    <div class="col-xs-12">
                        <h5>
                            Email
                            @can('emailsCreate', $user)
                                <small>
                                    <a href="{{ route('admin.users.emails.create', [$user->id]) }}">
                                        <i class="fa fa-fw fa-plus"></i>
                                    </a>
                                </small>
                            @endcan
                        </h5>
                    </div>
                    @if(!$user->emails->isEmpty())
                        @foreach($user->emails as $email)
                            <div class="user-email col-xs-3">
                                <div class="card bg-faded">
                                    <div class="card-block">
                                        <div class="card-title">
                                            <h6>
                                                <a href="mailto:{{ $email->address }}">{{ $email->address }}</a>
                                                @can('emailsEdit', $user)
                                                    <small class="pull-right hidden-sm-up item-actions">
                                                        <a href="{{ route('admin.users.emails.edit', [$user->id, $email->id]) }}">
                                                            <i class="fa fa-fw fa-pencil"></i>
                                                        </a>
                                                    </small>
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
                                    <p>No emails added to user</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            @endcan

            @can('phonesView', $user)
                <div class="row user-phones">
                    <div class="col-xs-12">
                        <h5>
                            Phone
                            @can('phonesCreate', $user)
                                <small>
                                    <a href="{{ route('admin.users.phones.create', [$user->id]) }}">
                                        <i class="fa fa-fw fa-plus"></i>
                                    </a>
                                </small>
                            @endcan
                        </h5>
                    </div>

                    @if(!$user->phones->isEmpty())
                        @foreach($user->phones as $phone)
                            <div class="user-email col-xs-3">
                                <div class="card bg-faded">
                                    <div class="card-block">
                                        <div class="card-title">
                                            <h6>
                                                {{ $phone->type->name }}
                                                <small>
                                                    {{--{{ \libphonenumber\PhoneNumberUtil::getInstance()->format(\libphonenumber\PhoneNumberUtil::getInstance()->parse($phone->number, $phone->callingCode->country->alpha_2_code), \libphonenumber\PhoneNumberFormat::NATIONAL) }}--}}
                                                </small>
                                                @can('phonesEdit', $user)
                                                    <small class="pull-right hidden-sm-up item-actions">
                                                        <a href="{{ route('admin.users.phones.edit', [$user->id, $phone->id]) }}">
                                                            <i class="fa fa-fw fa-pencil"></i>
                                                        </a>
                                                    </small>
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
                                    <p>No phones added to user</p>
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
            $('.user-address, .user-email').hover(
                    function(){
                        $(this).find('.item-actions').toggleClass('hidden-sm-up');
                    },
                    function(){
                        $(this).find('.item-actions').toggleClass('hidden-sm-up');
                    }
            );
        });
    </script>
@endpush