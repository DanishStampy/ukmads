@extends('layouts.master')
@section('title','My Contents')
@section('content')
<div class="d-flex justify-content-end">
    {{ $ads->links() }}
</div>
    <div class="row justify-content-center">
        @if (count($ads) < 1)
        <div class="ml-3 mt-1">
            <h5>Result Not Found</h5>
        </div>
        @endif
            @foreach($ads as $item)
                <div class="col-md-3 mb-5">
                    <div class="card" style="width: 14rem;">
                        <a href="{{ route("advertiser.editads", $item->id_ads) }}"> 
                            <img class="card-img-top" src="{{  asset('img/'.$item->picture) }}" alt="Card image cap" style="height: 310px;object-fit: fill;">
                            {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#searchAds"
                            data-ads="{{ base64_encode($item->toJson()) }}">View Detail</button> --}}
                        </a>
                    </div>
                </div>
            @endforeach
    </div> 

{{-- start modal details --}}
{{-- <div class="modal fade" id="adsHistory" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
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
</div> --}}
{{-- end modal details --}}
@endsection

{{-- Js --}}
{{-- @push('scripts')

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
                if (status == 'verified' || status == 'pending' ) {
                    x.style.display = "none";
                }
                if (status == 'rejected') {
                    x.style.display = "block";
                }
                console.log(data);
            }).modal('show');
        });

    </script>
@endpush --}}