@extends('layouts.master')
@section('title','My Contents')
@section('content')

{{-- Message --}}
@if(Session::has('success_ads'))
    <div class="alert alert-success alert-dismissible fade show my-3">
        {{ Session::get('success_ads') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@elseif(Session::has('success_uploaded_ads'))
    <div class="alert alert-success alert-dismissible fade show my-3">
        {{ Session::get('success_uploaded_ads') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@elseif(Session::has('delete_ads'))
    <div class="alert alert-success alert-dismissible fade show my-3">
        {{ Session::get('delete_ads') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

{{-- Button & Pagination --}}
<div class="row">
    {{-- button --}}
    <form method="GET" class="col-md-3 form-horizontal" action="{{ route('advertiser.manageads') }}"
        enctype="multipart/form-data">
        <div class="btn-group btn-group-toggle">
            <button name="status" type="submit" class="btn bg-info mr-1 shadow-none" value="pending">Pending</button>
            <button name="status" type="submit" class="btn bg-teal mr-1 shadow-none" value="verified">Verified</button>
            <button name="status" type="submit" class="btn bg-danger mr-1 shadow-none" value="rejected">Rejected</button>
        </div>
    </form>
    <div class="col-md-3">
        <a class="btn btn-create shadow-none" href="{{ route("advertiser.createads") }}">
            <i class="fas fa-feather"></i> Create New
        </a>
    </div>
    {{-- Pagination --}}
    <div class="col-md-6 d-flex justify-content-end">
        {{ $ads->links('layouts.pagination-custom') }}
    </div>
</div>

{{-- Advertisement Card --}}
<div class="row justify-content-center">
    @if(count($ads) < 1)
    <div class="mt-3">
        <h5>No advertisement to be displayed yet. Click <a href="{{ route('advertiser.createads')}}">here</a> to create advertisement.</h5>
    </div>
    @else
        @foreach($ads as $ad)
            <div class="col-md-4 mt-3">
                {{-- Ribbon based on status --}}
                <div class="card card-widget widget-user">
                    <div class="widget-user">

                        @if($ad->status == 'pending')
                            <div class="ribbon-wrapper ribbon-xl">
                                <div class="ribbon bg-info">
                                    Pending
                                </div>
                            </div>
                        @elseif($ad->status == 'verified')
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

                <img class="card-img-top" src="{{ asset("img/".$ad['picture'][0]) }}"
                    onError="this.onerror=null;this.src='{{ asset("img/noimage.jpg") }}';"
                    style="height:300px;object-fit: cover">

                @if($ad->status == 'rejected')
                    <div class="card-footer" style="padding-top: 20px">
                        <div class="row justify-content-center">
                            <div class="col-lg-4 col-md-12 col-xs-12 border-right">
                                <div class="description-block">
                                    <a href="{{ route("advertiser.editads", $ad->id_ads) }}"
                                        class="btn btn-app bg-warning shadow-none">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 col-xs-12 border-right">
                                <div class="description-block">
                                    <a type="button" data-toggle="modal" data-target="#detailads"
                                        data-ads="{{ base64_encode($ad->toJson()) }}"
                                        class="btn btn-app bg-olive shadow-none">
                                        <i class="fas fa-info"></i> Details
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12 col-xs-12">
                                <div class="description-block">
                                    <a data-toggle="modal" data-target="#Delete"
                                        data-ads="{{ base64_encode($ad->toJson()) }}" class="btn btn-app bg-danger shadow-none">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                @else
                    <div class="card-footer" style="padding-top: 20px">
                        <div class="row justify-content-center mb-2">
                            <h4 class="text-center">{{ $ad->reads }}  Views</h4>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-xs-12 border-right">
                                <div class="description-block">
                                    <a href="{{ route("advertiser.editads", $ad->id_ads) }}"
                                        class="btn btn-app bg-warning shadow-none">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12 col-xs-12">
                                <div class="description-block">
                                    <a data-toggle="modal" data-target="#Delete"
                                        data-ads="{{ base64_encode($ad->toJson()) }}" class="btn btn-app bg-danger shadow-none">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach
    @endif
</div>
{{-- Detail confirmation modal --}}
<div class="modal fade .col-12 .col-md-8" id="detailads" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="row justify-content-around align-self-center">
                <div class="card" style="margin-top: 30px">
                    <img class="img-fluid" id="adsPic"
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
                                    <div class="row">
                                        <div class="form-group col-sm-12">
                                            <label>Reason</label>
                                            <textarea name="adsReason" id="adsReason" type="text" class="form-control"
                                                style="min-height: 100px" disabled></textarea>
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
@if(count(array($ads)) > 0)
    <div class="modal fade" id="Delete" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="DeleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="DeleteModalLabel">Delete Advertisement Confirmation</h5>
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
                        action="{{ route("advertiser.deleteAds") }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" value="" name="id_ads" id="adsHid">
                        <button type="submit" id="btnDelete" value="delete" name="type"
                            class="btn btn-danger shadow-none">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            console.log('hi')
            $('#Delete').on('show.bs.modal', function (ads) {
                var button = $(ads.relatedTarget) // Button that triggered the modal
                var ads = button.data('ads') // Extract info from data-* attributes
                var modal = $(this)

                var data = atob(ads);
                var data = $.parseJSON(data);

                $("#adsHid").val(data.id_ads);

                console.log(data)

            })
        });

        $(document).ready(function () {

            $('#detailads').on('show.bs.modal', function (ads) {

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
                $("#adsReason").val(data.reason);
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

    </script>
@endpush
