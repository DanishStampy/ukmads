@extends('layouts.master')
@section('title','My Contents')
@section('content')

<div class="row">
    <div class="col mt-3">
        <h1 class="content_header">Events</h1>
    </div>
</div>
@if(Session::has('success_events'))
    <div class="alert alert-success alert-dismissible fade show my-3">
        {{ Session::get('success_events') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@elseif(Session::has('success_uploaded_events'))
    <div class="alert alert-success alert-dismissible fade show my-3">
        {{ Session::get('success_uploaded_events') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<div class="row">

    @foreach($event as $event)
        <div class="col-md-4">
            <div class="card card-widget widget-user">
                <div class="widget-user-header text-white"
                    style="height:300px; background: url('/img/{{ $event->picture }}') center center;">

                    @if($event->status == 'pending')
                    <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon bg-info">
                          Pending
                        </div>
                      </div>
                    @elseif($event->status == 'verified')
                    <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon bg-success">
                          Verified
                        </div>
                      </div>
                    @else
                    <div class="ribbon-wrapper ribbon-xl">
                        <div class="ribbon bg-danger">
                          Rejected
                        </div>
                      </div>
                    @endif

                </div>

                @if($event->status == 'rejected')
                <div class="card-footer" style="padding-top: 20px">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="description-block">
                                <a href="{{ route("advertiser.deleteEvent", $event->id_event) }}" class="btn btn-app bg-danger">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="card-footer" style="padding-top: 20px">
                    <div class="row">
                        <div class="col-sm-6 border-right">
                            <div class="description-block">
                                <a href="{{ route("advertiser.editevent", $event->id_event) }}"
                                    class="btn btn-app bg-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="description-block">
                                <a href="{{ route("advertiser.deleteEvent", $event->id_event) }}" class="btn btn-app bg-danger">
                                    <i class="fas fa-trash-alt"></i> Delete
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

            </div>
            <br>
        </div>
    @endforeach

    <div class="col-md-4">
        <div class="card card-widget widget-user">
            <div class="widget-user-header text-white"
                style="height:300px; background: url('/img/addnew.jpg') center center;">

            </div>

            <div class="card-footer" style="padding-top: 20px">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="description-block">
                            <a class="btn btn-app bg-info"
                                href="{{ route("advertiser.createevents") }}">
                                <i class="fas fa-feather"></i> Create New
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


{{-- <div class="col-md-3">
        <div class="card">
            <div class="card-body text-center">
                <div class="border rounded "
                    style="height: 300px;background-image: url({{ asset('img/white.jpg') }});background-position:
center;background-size: cover;">
<a href=" {{ route("advertiser.createevents") }} " class="btn btn-secondary" type="button">+</a>
</div>
</div>
</div>
</div> --}}
