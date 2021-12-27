@extends('layouts.master')

@section('title','Pending ')
@section('content')
<br>
<h4>Advertisement</h4>
<div class="row">
    {{ count($advertisements) < 1 ? "No data to be displayed." : '' }}
    @foreach($advertisements as $advertisement)
        @if($advertisement->status == 'pending')
            <div class="col-6 col-md-3">
                <div class="card">
                    <div class="ribbon-wrapper ribbon-lg">
                        <div class="ribbon bg-info">
                            Pending
                        </div>
                    </div>
                    <img class="card-img-top" src="{{ asset('img/'.$advertisement->picture) }}"
                        onError="this.onerror=null;this.src='{{ asset("img/noimage.jpg") }}';"
                        style="height:200px;object-fit: cover">
                    <div class="card-body">
                        <h5 class="card-title">{{ $advertisement->name }}</h5>
                        <p class="card-text">{{ $advertisement->description }}</p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adsPending"
                            data-ads="{{ base64_encode($advertisement->toJson()) }}">View Detail
                        </button>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>
<div class="modal fade .col-12 .col-md-8" id="adsPending" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="row justify-content-around align-self-center">
                <div class="card" style="margin-top: 30px">
                    <img class="img-fluid" id="adsPic"
                        onError="this.onerror=null;this.src='{{ asset("img/noimage.jpg") }}';"
                        style="margin: 10px;height:300px;width:300px;object-fit: cover">
                </div>
                <div class="col-md-10 col-xs-6">
                    <h3 class="modal-title text-center">Details</h3>
                    <div class="col-md-12">
                        <div class="modal-body">
                            <div class="card card-primary">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Id</label>
                                        <input type="text" class="form-control" id="adsId" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" class="form-control" id="adsName" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Price</label>
                                        <input type="text" class="form-control" id="adsPrice" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Seller Name</label>
                                        <input type="text" class="form-control" id="adsSeller" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Contact No</label>
                                        <input type="text" class="form-control" id="adsContact" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea type="text" class="form-control" id="adsDesc" disabled></textarea>
                                    </div>
                                    <div class="text-center">
                                        <form method="post" class="form-horizontal"
                                            action="{{ route('admin.verifiedAds') }}">
                                            @csrf
                                            <input type="hidden" value="" name="id_ads" id="adsHid">
                                            <button name="type" value="approved" type="submit" class="btn btn-success"
                                                style="margin: 10px; width: 30%" id="btnAdsApproved">
                                                Approve
                                            </button>
                                            <button name="type" value="rejected" type="submit" class="btn btn-danger"
                                                style="margin: 10px; width: 30%" id="btnAdsRejected">
                                                Reject
                                            </button>
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
<h4>Event</h4>
<div class="row">
    {{ count($events) < 1 ? "No data to be displayed." : '' }}
    @foreach($events as $event)
        @if($event->status == 'pending')
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
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->name }}</h5>
                        <p class="card-text">{{ $event->description }}</p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eventPending"
                            data-event="{{ base64_encode($event->toJson()) }}">View Detail
                        </button>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>
<div class="modal fade .col-12 .col-md-8" id="eventPending" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="row justify-content-around align-self-center">
                <div class="card" style="margin-top: 30px">
                    <img class="img-fluid" id="eventPic"
                        onError="this.onerror=null;this.src='{{ asset("img/noimage.jpg") }}';"
                        style="margin: 10px;height:300px;width:300px;object-fit: cover">
                </div>
                <div class="col-md-10 col-xs-6">
                    <h3 class="modal-title text-center">Details</h3>
                    <div class="col-md-12">
                        <div class="modal-body">
                            <div class="card card-primary">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>ID</label>
                                        <input type="text" class="form-control" id="eventId" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" class="form-control" id="eventName" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="text" class="form-control" id="eventEmail" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Location</label>
                                        <input type="text" class="form-control" id="eventLocation" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Time</label>
                                        <input type="time" class="form-control" id="eventTime" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="date" class="form-control" id="eventDate" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Organizer</label>
                                        <input type="text" class="form-control" id="eventOrganizer" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Contact no</label>
                                        <input type="text" class="form-control" id="eventContact" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea type="text" class="form-control" id="eventDesc" style="resize: none"
                                            disabled></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <input type="text" class="form-control" id="eventStatus" disabled>
                                    </div>
                                    <div class="text-center">
                                        <form method="post" class="form-horizontal"
                                            action="{{ route('admin.verifiedEvent') }}">
                                            @csrf
                                            <input type="hidden" value="" name="id_event" id="eventHid">
                                            <button name="type" value="approved" type="submit" class="btn btn-success"
                                                style="margin: 10px; width: 30%" id="btnEventApproved">
                                                Approve
                                            </button>
                                            <button name="type" value="rejected" type="submit" class="btn btn-danger"
                                                style="margin: 10px; width: 30%" id="btnEventRejected">
                                                Reject
                                            </button>
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
                $("#adsStatus").val(data.status);

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
                $("#eventStatus").val(data.status);

                // console.log(data);
            })
        });

    </script>
@endpush
