@extends('admin::index')

@section('page-title')
    {{$member->name->firstLast}}
    <small><a href="{{ route('admin.organizations.members.edit', [$organization->id, $member->id]) }}"><i class="fa fa-fw fa-pencil"></i></a></small>
    <span class="h4 pull-right">
        <a href="{{ route('admin.organizations.show', $organization->id) }}">{{ $organization->name }}</a>
        <small>{{ $organization->pivot->title }}</small>
    </span>
@endsection

@section('content')

    <div class="information mb-1">
        <h4>Information</h4>
        <h5>Email</h5>
        <div class="row">
            <div class="contact-email col-xs-6">
                <div class="card">
                    <div class="card-block">
                        @if($organization->pivot->email)
                            <h6><a href="mailto:{{ $organization->pivot->email->address }}">{{ $organization->pivot->email->address }}</a></h6>
                        @else
                            <p>No email address assigned to this user for this organization</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <h5>
            Phone
            {{--<small>--}}
                {{--<a href="{{ route('organizations.members.p) }}"><i class="fa fa-fw fa-plus"></i>--}}
                {{--</a>--}}
            {{--</small>--}}
        </h5>
        <div class="row">
            <div class="contact-phone col-xs-6">
                <div class="card">
                    <div class="card-block">
                        @if($organization->pivot->phone->number)
                        <h6>{{ $organization->pivot->phone->type->name }}
                            <small>{{ $organization->pivot->phone->number }}</small>
                            {{--<a class="edit hidden-sm-up pull-right" href="{{ url('/vendors/' . $vendor->id . '/contacts/' . $member->id . '/phones/' . $phone->id . '/edit') }}">--}}
                                {{--<i class="fa fa-fw fa-pencil"></i>--}}
                            {{--</a>--}}
                        </h6>
                        @else
                            <p>No phone number associated to this user for this organization</p>
                        @endif
                    </div>
                </div>
            </div>
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