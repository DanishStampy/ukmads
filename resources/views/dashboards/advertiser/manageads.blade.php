@extends('layouts.master')
@section('title','My Contents')
@section('content')


<div class="row">
    <div class="col mt-3">
        <h1 class="content_header">Advertisements</h1>
    </div>
</div>
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
<div class="row">

    @foreach($ads as $ads)
        <div class="col-md-4">
            <div class="card card-widget widget-user">
                <div class="widget-user">

                    @if($ads->status == 'pending')
                        <div class="ribbon-wrapper ribbon-xl">
                            <div class="ribbon bg-info">
                                Pending
                            </div>
                        </div>
                    @elseif($ads->status == 'verified')
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
                <img class="card-img-top" src="{{ asset('img/'.$ads->picture) }}"
                    onError="this.onerror=null;this.src='{{ asset("img/noimage.jpg") }}';"
                    style="height:300px;object-fit: cover">

                @if($ads->status == 'rejected')
                    <div class="card-footer" style="padding-top: 20px">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="description-block">
                                    <a href="{{ route("advertiser.deleteAds", $ads->id_ads) }}"
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
                                    <a href="{{ route("advertiser.editads", $ads->id_ads) }}"
                                        class="btn btn-app bg-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12 col-xs-12">
                                <div class="description-block">
                                    <a href="{{ route("advertiser.deleteAds", $ads->id_ads) }}"
                                        class="btn btn-app bg-danger">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
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
                            <a class="btn btn-app bg-info" href="{{ route("advertiser.createads") }}">
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
