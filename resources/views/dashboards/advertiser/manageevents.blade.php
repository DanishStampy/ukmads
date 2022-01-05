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
@elseif(Session::has('delete_event'))
    <div class="alert alert-success alert-dismissible fade show my-3">
        {{ Session::get('delete_event') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if( count($events) < 1)
    <h5>No data to be displayed.</h5>
@endif
<div class="row justify-content-center">
    @foreach($events as $event)
        <div class="col-md-4">
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
                <img class="card-img-top" src="{{ asset("img/".$event->picture) }}"
                    onError="this.onerror=null;this.src='{{ asset("img/noimage.jpg") }}';"
                    style="height:300px;object-fit: cover">

                @if($event->status == 'rejected')
                    <div class="card-footer" style="padding-top: 20px">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="description-block">
                                    <a data-toggle="modal" data-target="#Delete"
                                        data-event="{{ base64_encode($event->toJson()) }}"
                                        class="btn btn-app bg-danger">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card-footer" style="padding-top: 20px">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-xs-12 border-right">
                                <div class="description-block">
                                    <a href="{{ route("advertiser.editevent", $event->id_event) }}"
                                        class="btn btn-app bg-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="description-block">
                                    <a data-toggle="modal" data-target="#Delete"
                                        data-event="{{ base64_encode($event->toJson()) }}"
                                        class="btn btn-app bg-danger">
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
                            action="{{ route("advertiser.deleteEvent") }}"
                            enctype="multipart/form-data">
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
    {{-- END of DELETE confirmation modal --}}
</div>

{{-- Pagination --}}
<div class="d-flex justify-content-center">
    {{ $events->links() }}
</div>
{{-- Create New Event --}}
<div class="row justify-content-center">
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

    </script>
@endpush
