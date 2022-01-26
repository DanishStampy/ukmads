@extends('layouts.master')
@section('title','My Contents')
@section('content')

{{-- Message --}}
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
@elseif(Session::has('delete_event'))
    <div class="alert alert-success alert-dismissible fade show my-3">
        {{ Session::get('delete_event') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

{{-- Button & Pagination --}}
<div class="row">
    {{-- button --}}
    <form method="GET" class="col-md-3 form-horizontal" action="{{ route('organizer.manageevents') }}"
        enctype="multipart/form-data">
        <div class="btn-group btn-group-toggle">
            <button name="status" type="submit" class="btn bg-info mr-1 shadow-none" value="pending">Pending</button>
            <button name="status" type="submit" class="btn bg-teal mr-1 shadow-none" value="verified">Verified</button>
            <button name="status" type="submit" class="btn bg-danger mr-1 shadow-none" value="rejected">Rejected</button>
        </div>
    </form>
    <div class="col-md-3">
        <a class="btn btn-create shadow-none" href="{{ route("organizer.createevents") }}">
            <i class="fas fa-feather"></i> Create New
        </a>
    </div>
    {{-- Pagination --}}
    <div class="col-md-6 d-flex justify-content-end">
        {{ $events->links('layouts.pagination-custom') }}
    </div>
</div>

{{-- Event Card --}}
<div class="row justify-content-center">
    @if( count($events) < 1)
        <div class="mt-3">
            <h5>No event to be displayed yet. Click <a href="{{ route('organizer.createevents')}}">here</a> to create event.</h5>
        </div>
    @else
        @foreach($events as $event)
            <div class="col-md-4 mt-3">
                <div class="card card-widget widget-user">
                    <div class="widget-user">

                        @if($event->status == 'pending')
                            <div class="ribbon-wrapper ribbon-xl">
                                <div class="ribbon bg-info">
                                    Pending
                                </div>
                            </div>
                        @elseif($event->status == 'verified')
                            <div class="ribbon-wrapper ribbon-xl">
                                <div class="ribbon bg-teal">
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
                </div>
                <img class="card-img-top" src="{{ asset("img/".$event['picture'][0]) }}"
                    onError="this.onerror=null;this.src='{{ asset("img/noimage.jpg") }}';"
                    style="height:300px;object-fit: cover">

                @if($event->status == 'rejected')
                    <div class="card-footer" style="padding-top: 20px">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-12 col-xs-12 border-right">
                                <div class="description-block">
                                    <a href="{{ route("organizer.editevent", $event->id_event) }}"
                                        class="btn btn-app bg-warning shadow-none">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 col-xs-12 border-right">
                                <div class="description-block">
                                    <a type="button" data-toggle="modal" data-target="#detailevent"
                                        data-event="{{ base64_encode($event->toJson()) }}"
                                        class="btn btn-app bg-olive shadow-none">
                                        <i class="fas fa-info"></i> Details
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-12 col-xs-12">
                                <div class="description-block">
                                    <a data-toggle="modal" data-target="#Delete"
                                        data-event="{{ base64_encode($event->toJson()) }}"
                                        class="btn btn-app bg-danger shadow-none">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                @else
                    <div class="card-footer" style="padding-top: 20px">
                        <div class="row justify-content-center mb-2">
                            <h4 class="text-center">{{ $event->join }} Joins</h4>
                        </div>
                        <div class="row">

                            @if ($event->join > 1)
                                <div class="col-lg-4 col-md-12 col-xs-12 border-right">
                                    <div class="description-block">
                                        <a href="{{ route("organizer.editevent", $event->id_event) }}"
                                            class="btn btn-app bg-warning shadow-none">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 col-xs-12 border-right">
                                    <div class="description-block">
                                        <a href="{{ route("organizer.listevent", $event->id_event) }}"
                                            class="btn btn-app bg-fuchsia shadow-none">
                                            <i class="fas fa-list"></i> List
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-12 col-xs-12">
                                    <div class="description-block">
                                        <a data-toggle="modal" data-target="#Delete"
                                            data-event="{{ base64_encode($event->toJson()) }}"
                                            class="btn btn-app bg-danger shadow-none">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            @else
                                <div class="col-lg-6 col-md-12 col-xs-12 border-right">
                                    <div class="description-block">
                                        <a href="{{ route("organizer.editevent", $event->id_event) }}"
                                            class="btn btn-app bg-warning shadow-none">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-xs-12">
                                    <div class="description-block">
                                        <a data-toggle="modal" data-target="#Delete"
                                            data-event="{{ base64_encode($event->toJson()) }}"
                                            class="btn btn-app bg-danger shadow-none">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        @endforeach
    @endif
</div>

{{-- Detail confirmation modal --}}
<div class="modal fade .col-12 .col-md-8" id="detailevent" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="row justify-content-around align-self-center">
                <div class="card" style="margin-top: 30px">
                    <img class="img-fluid" id="eventPic"
                        onError="this.onerror=null;this.src='{{ asset("img/noimage.jpg") }}';"
                        style="margin: 10px;height:300px;width:300px;object-fit: cover">
                </div>
                <div class="col-md-12 col-xs-6">
                    <h3 class="modal-title text-center">Details</h3>
                    <div class="col-md-12">
                        <div class="modal-body">
                            <div class="card card-primary">
                                <div class="card-body" style="margin: 10px 20px">
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label>ID</label>
                                            <input type="text" class="form-control" id="eventId" disabled>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Email Address</label>
                                            <input type="text" class="form-control" id="eventEmail" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label>Name</label>
                                            <input type="text" class="form-control" id="eventName" disabled>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Organizer</label>
                                            <input type="text" class="form-control" id="eventOrganizer" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label>Time</label>
                                            <input type="time" class="form-control" id="eventTime" disabled>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Date</label>
                                            <input type="date" class="form-control" id="eventDate" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label>Location</label>
                                            <input type="text" class="form-control" id="eventLocation" disabled>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Contact no</label>
                                            <input type="text" class="form-control" id="eventContact" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label>Description</label>
                                            <textarea type="text" class="form-control" id="eventDesc"
                                                style="resize: none" disabled></textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label>Reason</label>
                                            <textarea id="eventReason" id="eventReason" type="text" class="form-control"
                                                disabled></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center mb-3">
                                    <button type="button" class="btn btn-info col-md-4" data-dismiss="modal">
                                        OK
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- DELETE confirmation modal --}}
@if(count(array($events)) > 0)
    <div class="modal fade" id="Delete" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="DeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="DeleteModalLabel">Delete Event Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Nope</button>
                    <form method="POST" class="form-horizontal"
                        action="{{ route("organizer.deleteEvent") }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="" name="id_event" id="eventHid">
                        <button type="submit" id="btnDelete" value="delete" name="type"
                            class="btn btn-danger">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif

{{-- Create New Event --}}

@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#Delete').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var event = button.data('event') // Extract info from data-* attributes
                var modal = $(this)

                var data = atob(event);
                var data = $.parseJSON(data);

                $("#eventHid").val(data.id_event);

                console.log(data)

            })
        });

        $(document).ready(function () {

            $('#detailevent').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var event = button.data('event') // Extract info from data-* attributes
                var modal = $(this)

                var data = atob(event);
                var data = $.parseJSON(data);


                $("#eventPic").attr('src',
                    `{{ asset('img/${data.picture}') }}`);
                $("#eventId").val(data.id_event);
                $("#eventHid").val(data.id_event);
                $("#eventName").val(data.name);
                $("#eventEmail").val(data.creator_email);
                $("#eventLocation").val(data.location);
                $("#eventTime").val(data.time);
                $("#eventDate").val(data.date);
                $("#eventOrganizer").val(data.organizer);
                $("#eventContact").val(data.contact);
                $("#eventDesc").val(data.description);

                if (data.reason != null) {
                    $("#eventReason").val(data.reason);
                }

            })
        });

        function showReasonEvent() {
            var x = document.getElementById("reasonEvent");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        };

    </script>
@endpush
