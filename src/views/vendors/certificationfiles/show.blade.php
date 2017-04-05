@extends('layouts.app')

@section('page-title')
    {{$contact->name}}
    <small><a href="{{ url('/vendors/' . $vendor->id . '/contacts/' . $contact->id . '/edit') }}"><i class="fa fa-fw fa-pencil"></i></a></small>
    <span class="h4 pull-right">
        <a href="{{ route('vendors.show', $contact->vendor->id) }}">{{ $contact->vendor->name }}</a>
        <small>{{ $contact->title }}</small>
    </span>
@endsection

@section('content')

    <div class="information mb-1">
        <h4>Information</h4>
        <h5>Email</h5>
        <div class="row">
            <div class="contact-phone col-xs-12">
                <div class="card">
                    <div class="card-block">
                        @if($contact->email)
                            <h6><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></h6>
                        @else
                            <p></p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <h5>Phone <small><a href="{{ url('/vendors/' . $vendor->id . '/contacts/' . $contact->id . '/phones/create') }}"><i class="fa fa-fw fa-plus"></i></a></small></h5>
        <div class="row">
            @if(!$contact->phones->isEmpty())
                @foreach($contact->phones as $phone)
                    <div class="contact-phone col-xs-6">
                        <div class="card">
                            <div class="card-block">
                                <h6>{{ $phone->type->name }}
                                    <small>{{ $phone->phone }}</small>
                                    <a class="edit hidden-sm-up pull-right" href="{{ url('/vendors/' . $vendor->id . '/contacts/' . $contact->id . '/phones/' . $phone->id . '/edit') }}">
                                        <i class="fa fa-fw fa-pencil"></i>
                                    </a>
                                </h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-xs-12">
                    <div class="card">
                        <div class="card-block">
                            <p>No phones added to contact</p>
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
            $('.contact-phone').hover(
                    function(){
                        $(this).find('.edit').toggleClass('hidden-sm-up');
                        console.log($(this));
                    },
                    function(){
                        $(this).find('.edit').toggleClass('hidden-sm-up');
                    }
            );
        });
    </script>

@endsection