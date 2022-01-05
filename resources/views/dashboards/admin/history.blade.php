@extends('layouts.master')

@section('title','History')
@section('content')
<br>
<h4>Advertisement</h4>

<div>
    <div class="row" style="margin: 20px 0px 50px">
        @if (count($advertisements) < 1)
            <h5>No data to be displayed.</h5>
        @endif
        @foreach($advertisements as $advertisement)
            @if($advertisement->status=='verified' or $advertisement->status=='rejected')

            <div class="col-6 col-md-3">
                <div class="card">
                    <div class="ribbon-wrapper ribbon-lg">
                        @if($advertisement->status=='verified')
                            <div class="ribbon bg-success">
                                Verified
                            </div>
                        @else
                            <div class="ribbon bg-danger">
                                Rejected
                            </div>
                        @endif
                    </div>
                    <img class="card-img-top" src="{{ asset('img/'.$advertisement->picture) }}"
                        onError="this.onerror=null;this.src='{{ asset("img/noimage.jpg") }}';"
                        style="height:200px;object-fit: cover">
                    <div class="card-body">
                        <h5 class="card-title">{{ $advertisement->name }}</h5>
                        <p class="card-text"
                            style="height:30px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                            {{ $advertisement->description }}</p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adsHistory"
                            data-ads="{{ base64_encode($advertisement->toJson()) }}">View Detail</button>
                    </div>
                </div>
            </div>
        @endif
        @endforeach
    </div>
    {{-- Pagination --}}
    <div class="d-flex justify-content-end">
        {{ $advertisements->appends(['events' => $events->currentPage()])->links() }}
    </div>
</div>

<div class="modal fade" id="adsHistory" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">

    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="row justify-content-around align-self-center">
                <div class="card" style="margin-top: 30px">
                    <img class="img-fluid" id="adsPic" onError="this.onerror=null;this.src='{{ asset("img/noimage.jpg") }}';" style="margin: 10px;height:300px;width:300px;object-fit: fill">
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
                                            <input type="text" class="form-control" id="adsStatus" disabled>
                                        </div>
                                    </div>
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
                                            <label>Contact no</label>
                                            <input type="text" class="form-control" id="adsContact" disabled>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label>Description</label>
                                            <textarea type="text" class="form-control" id="adsDesc" style="resize: none" disabled></textarea>
                                        </div>
                                    </div>
                                    <div class="row" id="reasonAds">
                                        <div class="form-group col-sm-12">
                                            <label>Reason</label>
                                            <textarea type="text" class="form-control" id="adsReason"
                                                placeholder="no reason" style="resize: none" disabled></textarea>
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
</div>
<hr>
<h4>Event</h4>

<div>
    <div class="row" style="margin: 20px 0px 50px">
        @if (count($events) < 1)
            <h5>No data to be displayed.</h5>
        @endif
        @foreach($events as $event)
            @if($event->status=='verified' or $event->status=='rejected')
            <div class="col-6 col-md-3">

                <div class="card">
                    <div class="ribbon-wrapper ribbon-lg">
                        @if($event->status=='verified')
                            <div class="ribbon bg-success">
                                Verified
                            </div>
                        @else
                            <div class="ribbon bg-danger">
                                Rejected
                            </div>
                        @endif
                    </div>
                    <img class="card-img-top" src="{{ asset('img/'.$event->picture) }}"
                        onError="this.onerror=null;this.src='{{ asset("img/noimage.jpg") }}';"
                        style="height:200px;object-fit: cover">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->name }}</h5>
                        <p class="card-text"
                            style="height:30px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                            {{ $event->description }}</p>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#eventHistory"
                            data-event="{{ base64_encode($event->toJson()) }}">View Detail</button>
                    </div>

                </div>
            </div>
               @endif

        
        @endforeach
    </div>
    {{-- Pagination --}}
    <div class="d-flex justify-content-end">
        {{ $events->appends(['advertisements' => $advertisements->currentPage()])->links() }}
    </div>
</div>


<div class="modal fade" id="eventHistory" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
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
</div>

@endsection

@push('scripts')

    <script type="text/javascript">
        $(document).ready(function () {
            $('#adsHistory').on('show.bs.modal', function (ads) {
                var button = $(ads.relatedTarget) // Button that triggered the modal
                var ads = button.data('ads') // Extract info from data-* attributes
                var modal = $(this)

                var data = atob(ads);
                var data = $.parseJSON(data);

                $("#adsPic").attr('src',
                    `{{ asset('img/${data.picture}') }}`);
                $("#adsId").val(data.id_ads);
                $("#adsName").val(data.name);
                $("#adsEmail").val(data.creator_email);
                $("#adsType").val(data.type);
                $("#adsPrice").val(data.price);
                $("#adsSeller").val(data.seller_name);
                $("#adsContact").val(data.contact);
                $("#adsDesc").val(data.description);
                $("#adsStatus").val(data.status);
                $("#adsReason").val(data.reason);

                var status = data.status;
                var x = document.getElementById("reasonAds");
                if (status == 'verified') {
                    x.style.display = "none";
                }
                if (status == 'rejected') {
                    x.style.display = "block";
                }

            })

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
                if (status == 'verified') {
                    x.style.display = "none";
                }
                if (status == 'rejected') {
                    x.style.display = "block";
                }

            })
        });

    </script>
@endpush

