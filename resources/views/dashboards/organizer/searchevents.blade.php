@extends('layouts.master')
@section('title','My Contents')
@section('content')
<div class="d-flex justify-content-end">
    {{ $events->links() }}
</div>
    <div class="row justify-content-center">
        @if (count($events) < 1)
        <div class="ml-3 mt-1">
            <h5>Result Not Found</h5>
        </div>
        @endif
            @foreach($events as $item)
                <div class="col-md-3 mb-5">
                    <div class="card" style="width: 14rem;">
                        <a href="{{ route("organizer.editevent", $item->id_event) }}"> 
                            <img class="card-img-top" src="{{  asset('img/'.$item->picture) }}" alt="Card image cap" style="height: 310px;object-fit: fill;">
                            {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#searchAds"
                            data-ads="{{ base64_encode($item->toJson()) }}">View Detail</button> --}}
                        </a>
                    </div>
                </div>
            @endforeach
    </div> 

{{-- start modal details --}}
{{-- <div class="modal fade" id="eventHistory" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="row justify-content-around align-self-center">
                <div class="card" style="margin-top: 30px">
                    <img class="img-fluid" id="eventPic" onError="this.onerror=null;this.src='{{ asset("img/noimage.jpg") }}';" style="margin: 10px;height:300px;width:300px;object-fit: fill">
                </div>
                <div class="col-md-12 col-xs-6">
                    <h3 class="modal-title text-center">Details</h3>
                    <div class="col-md-12">
                        <div class="modal-body">
                            <div class="card card-primary">
                                <div class="card-body" style="margin: 10px 20px">
                                    <div class="row justify-content-around align-self-center text-center">
                                        <div class="form-group col-sm-6">
                                            <label>Status</label>
                                            <input type="text" class="form-control" id="eventStatus" disabled>
                                        </div>
                                    </div>
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
                                            <textarea type="text" class="form-control" id="eventDesc" style="resize: none" disabled></textarea>
                                        </div>
                                    </div>
                                    <div class="row" id="reasonEvent">
                                        <div class="form-group col-sm-12">
                                            <label>Reason</label>
                                            <textarea type="text" class="form-control" id="eventReason"
                                                style="resize: none" disabled></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
{{-- end modal details --}}

@endsection


{{-- @push('scripts')

    <script type="text/javascript">
        $(document).ready(function () {
            $('#eventHistory').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var event = button.data('event') // Extract info from data-* attributes
                var modal = $(this)

                var data = atob(event);
                var data = $.parseJSON(data);

                $("#eventPic").attr('src',
                    `{{ asset('img/${data.picture}') }}`);
                $("#eventId").val(data.id_event);
                $("#eventName").val(data.name);
                $("#eventEmail").val(data.creator_email);
                $("#eventLocation").val(data.location);
                $("#eventTime").val(data.time);
                $("#eventDate").val(data.date);
                $("#eventOrganizer").val(data.organizer);
                $("#eventContact").val(data.contact);
                $("#eventDesc").val(data.description);
                $("#eventStatus").val(data.status);
                $("#eventReason").val(data.reason);

                var status = data.status;
                var x = document.getElementById("reasonEvent");
                if (status == 'verified' || status == 'pending') {
                    x.style.display = "none";
                }
                if (status == 'rejected') {
                    x.style.display = "block";
                }

            })
        });

    </script>
@endpush --}}