@extends('layouts.master')

@section('title','Pending ')
@section('content')
<div>
    <div class="row">
        <div class="col">
            <h3>Advertisement</h3>
        </div>
        {{-- Pagination --}}
        <div class="col d-flex justify-content-end">
            {{ $advertisements->appends(['events' => $events->currentPage()])->links('layouts.pagination-custom') }}
        </div>
    </div>
    <div class="row" style="margin: 20px 0px 50px">
        @if(count($advertisements) < 1)
            <h5>No data to be displayed.</h5>
        @else
            @foreach($advertisements as $advertisement)
                {{-- @if($advertisement->status == 'pending') --}}
                <div class="col-6 col-md-3">
                    <div class="card">
                        <div class="ribbon-wrapper ribbon-lg">
                            <div class="ribbon bg-info">
                                Pending
                            </div>
                        </div>
                        <img class="card-img-top"
                            src="{{ asset('img/'.$advertisement->picture) }}"
                            onError="this.onerror=null;this.src='{{ asset("img/noimage.jpg") }}';"
                            style="height:200px;object-fit: cover">
                        <div class="card-body" style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap">
                            <h5 class="card-title" style="width: 230px;text-overflow: inherit;overflow: inherit">
                                {{ $advertisement->name }}</h5>
                            <p class="card-text" style="height: 30px;text-overflow: inherit;overflow: inherit">
                                {{ $advertisement->description }}</p>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adsPending"
                                data-ads="{{ base64_encode($advertisement->toJson()) }}">View Detail
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

<div class="modal fade .col-12 .col-md-8" id="adsPending" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="row justify-content-around align-self-center">
                <div class="card" style="margin-top: 30px">
                    <img class="img-fluid" id="adsPic"
                        onError="this.onerror=null;this.src='{{ asset("img/noimage.jpg") }}';"
                        style="margin: 10px;height:300px;width:400px;object-fit: fill">
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
                                            <input type="text" class="form-control" id="adsId" disabled>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Email Address</label>
                                            <input type="text" class="form-control" id="adsEmail" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-6">
                                            <label>Name</label>
                                            <input type="text" class="form-control" id="adsName" disabled>
                                        </div>
                                        <div class="form-group col-sm-6">
                                            <label>Type</label>
                                            <input type="text" class="form-control" id="adsType" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-4">
                                            <label>Price</label>
                                            <input type="text" class="form-control" id="adsPrice" disabled>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Seller Name</label>
                                            <input type="text" class="form-control" id="adsSeller" disabled>
                                        </div>
                                        <div class="form-group col-sm-4">
                                            <label>Contact No</label>
                                            <input type="text" class="form-control" id="adsContact" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label>Description</label>
                                            <textarea type="text" class="form-control" id="adsDesc" style="resize: none"
                                                disabled></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <div class="card-body" style="margin: 20px 20px 0px">
                                        <form method="POST" class="form-horizontal row"
                                            action="{{ route('admin.verifiedAds') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="" name="id_ads" id="adsHid">
                                            <div class="col-sm-6">
                                                <button name="type" value="approved" type="submit"
                                                    class="btn btn-success" style="width: 100%" id="btnAdsApproved">
                                                    Approve
                                                </button>
                                            </div>
                                            <div class="col-sm-6">
                                                <button type="button" class="btn btn-danger" style="width: 100%"
                                                    onclick="showReasonAds()">
                                                    Reject
                                                </button>
                                            </div>
                                            <div class="card-body" id="reasonAds"
                                                style="margin: 0px 20px;display: none">
                                                <div class="form-group">
                                                    <label>Reason</label>
                                                    <textarea name="adsReason" id="adsReason" type="text"
                                                        class="form-control" style="min-height: 100px"
                                                        placeholder="Give valid reason to reject"></textarea>
                                                </div>
                                                <button name="type" value="rejected" type="submit"
                                                    class="btn btn-primary" style="margin: 10px; width: 30%"
                                                    id="btnAdsRejected">
                                                    Confirm
                                                </button>
                                            </div>
                                        </form>
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

<hr>
<div>
    <div class="row">
        <div class="col">
            <h3>Event</h3>
        </div>
        {{-- Pagination --}}
        <div class="col d-flex justify-content-end">
            {{ $events->appends(['advertisements' => $advertisements->currentPage()])->links('layouts.pagination-custom') }}
        </div>
    </div>
    <div class="row" style="margin: 20px 0px 0px">
        @if(count($events) < 1)
            <h5>No data to be displayed.</h5>
        @else
            @foreach($events as $event)
                {{-- @if($event->status == 'pending') --}}
                <div class="col-6 col-md-3">
                    <div class="card">
                        <div class="ribbon-wrapper ribbon-lg">
                            <div class="ribbon bg-info">
                                Pending
                            </div>
                        </div>
                        <img class="card-img-top" src="{{ asset('img/'.$event->picture) }}"
                            onError="this.onerror=null;this.src='{{ asset("img/noimage.jpg") }}';"
                            style="height:200px;object-fit: cover">
                        <div class="card-body" style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap">
                            <h5 class="card-title" style="width: 230px;text-overflow: inherit;overflow: inherit">
                                {{ $event->name }}</h5>
                            <p class="card-text" style="height: 30px;text-overflow: inherit;overflow: inherit">
                                {{ $event->description }}</p>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#eventPending" data-event="{{ base64_encode($event->toJson()) }}">View
                                Detail
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

<div class="modal fade .col-12 .col-md-8" id="eventPending" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="row justify-content-around align-self-center">
                <div class="card" style="margin-top: 30px">
                    <img class="img-fluid" id="eventPic"
                        onError="this.onerror=null;this.src='{{ asset("img/noimage.jpg") }}';"
                        style="margin: 10px;height:300px;width:400px;object-fit: fill">
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
                                </div>
                                <div class="text-center">
                                    <div class="card-body" style="margin: 20px 20px 0px">
                                        <form method="POST" class="form-horizontal row"
                                            action="{{ route('admin.verifiedEvent') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="" name="id_event" id="eventHid">
                                            <div class="col-sm-6">
                                                <button name="type" value="approved" type="submit"
                                                    class="btn btn-success" style="width: 100%" id="btnEventApproved">
                                                    Approve
                                                </button>
                                            </div>
                                            <div class="col-sm-6">
                                                <button type="button" class="btn btn-danger" style="width: 100%"
                                                    onclick="showReasonEvent()">
                                                    Reject
                                                </button>
                                            </div>
                                            <div class="card-body" id="reasonEvent"
                                                style="margin: 0px 20px;display: none">
                                                <div class="form-group">
                                                    <label>Reason</label>
                                                    <textarea name="eventReason" id="eventReason" type="text"
                                                        class="form-control" style="min-height: 100px"
                                                        placeholder="Give valid reason to reject"></textarea>
                                                </div>
                                                <button name="type" value="rejected" type="submit"
                                                    class="btn btn-primary" style="margin: 10px; width: 30%"
                                                    id="btnEventRejected">
                                                    Confirm
                                                </button>
                                            </div>
                                        </form>
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
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {

            $('#adsPending').on('show.bs.modal', function (ads) {

                var button = $(ads.relatedTarget) // Button that triggered the modal
                var ads = button.data('ads') // Extract info from data-* attributes
                var modal = $(this)

                var data = atob(ads);
                var data = $.parseJSON(data);

                $("#adsPic").attr('src',
                    `{{ asset('img/${data.picture}') }}`);
                $("#adsId").val(data.id_ads);
                $("#adsHid").val(data.id_ads);
                $("#adsName").val(data.name);
                $("#adsEmail").val(data.creator_email);
                $("#adsType").val(data.type);
                $("#adsPrice").val(data.price);
                $("#adsSeller").val(data.seller_name);
                $("#adsContact").val(data.contact);
                $("#adsDesc").val(data.description);

            })

            $('#eventPending').on('show.bs.modal', function (event) {
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
                // $("#eventReason").val(data.reason);

            })
        });

        function showReasonAds() {
            var x = document.getElementById("reasonAds");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        };

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
