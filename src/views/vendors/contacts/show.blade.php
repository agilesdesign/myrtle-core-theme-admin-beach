@extends('admin::index')

@section('page-title')
    {{ $contact->name->firstLast }}
    <small>
        <a href="{{ route('admin.vendors.contacts.name.edit', [$vendor, $contact]) }}">
            <i class="fa fa-fw fa-pencil"></i>
        </a>
    </small>
@endsection

@section('page-description')
    Contact Title
@endsection

@section('breadcrumbs')
    <a href="{{ route('admin.vendors.index') }}" class="breadcrumb-item">Vendors</a>
    <a href="{{ route('admin.vendors.show', $vendor) }}" class="breadcrumb-item">Jenzabar</a>
    <span class="breadcrumb-item Active">{{ $contact->name->firstLast }}</span>
@endsection

@section('dock')
    <div class="information mb-1">
        <h4>Information</h4>
        <h5>
            Emails
            <small>
                <a href="{{ route('admin.vendors.contacts.emails.create', [$vendor, $contact]) }}">
                    <i class="fa fa-fw fa-plus"></i>
                </a>
            </small>
        </h5>
        <div class="row">
            @forelse($contact->emails as $email)
                <div class="contact-email col-xs-3">
                    <div class="card bg-faded">
                        <div class="card-block">
                            <div class="card-title">
                                <h6>
                                    <a href="mailto:{{ $email->address }}">{{ $email->address }}</a>
                                    @can('contactsEdit', $vendor)
                                        <small class="pull-right hidden-sm-up item-actions">
                                            <a href="{{ route('admin.vendors.contacts.emails.edit', [$vendor, $contact, $email]) }}">
                                                <i class="fa fa-fw fa-pencil"></i>
                                            </a>
                                        </small>
                                    @endcan
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="contact-email col-xs-12">
                    <div class="card">
                        <div class="card-block">
                            <p>No emails for this contact</p>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>

        {{-- Phones --}}
        <h5>
            Phones
            <small>
                <a href="{{ route('admin.vendors.contacts.phones.create', [$vendor, $contact]) }}">
                    <i class="fa fa-fw fa-plus"></i>
                </a>
            </small>
        </h5>
        <div class="row">
            @forelse($contact->phones as $phone)
                <div class="contact-phone col-xs-3">
                    <div class="card bg-faded">
                        <div class="card-block">
                            <div class="card-title">
                                <h6>
                                    {{ $phone->type->name }}
                                    <small>
                                        {{ \libphonenumber\PhoneNumberUtil::getInstance()->format(\libphonenumber\PhoneNumberUtil::getInstance()->parse($phone->number, $phone->callingCode->country->alpha_2_code), \libphonenumber\PhoneNumberFormat::NATIONAL) }}
                                    </small>
                                    @can('contactsEdit', $vendor)
                                        <small class="pull-right hidden-sm-up item-actions">
                                            <a href="{{ route('admin.vendors.contacts.phones.edit', [$vendor, $contact, $phone]) }}">
                                                <i class="fa fa-fw fa-pencil"></i>
                                            </a>
                                        </small>
                                    @endcan
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="contact-emails col-xs-12">
                    <div class="card">
                        <div class="card-block">
                            <p>No phones for this contact</p>
                        </div>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            $('.contact-phone, .contact-email').hover(
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