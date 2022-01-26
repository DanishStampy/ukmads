@extends('layouts.master')

@section('title','Dashboard')
@section('content')

@include('layouts.loading')

<div class="row">

    @if ($subs->quota == $ads->where('status','verified')->count())
        <div class="col-12">
            <div class="alert alert-warning alert-dismissible fade show">
                <p class="text-center mb-0"><i class="fas fa-exclamation"></i> Your quota has finished. Please add more if you want to post more advertisement. Click <a href="{{ route('advertiser.profile')}}">here.</a></p>
            </div>
            
        </div>
    @endif

    <div class="col-lg-12 col-12">
        <div class="small-box bg-indigo">
            <div class="inner">
                <p>Total created ads:</p>
                <h3>
                    {{ $ads->count() }}
                </h3>
            </div>
            <div class="icon">
                <i class="fas fa-bullhorn"></i>
            </div>
            <a href="{{ route('advertiser.manageads') }}" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-6 col-6">
        <div class="info-box">
            <span class="info-box-icon bg-warning elevation-1"><i class="far fa-file-alt"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Draft</span>
                <span class="info-box-number">
                    {{ $ads->where('status','draft')->count() }}
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>

    <div class="col-lg-6 col-6">
        <div class="info-box">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-thumbs-up"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Verified</span>
                <span class="info-box-number">
                    {{ $ads->where('status','verified')->count() }}
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>

    <div class="col-lg-6 col-6">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-hourglass-half"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Pending</span>
                <span class="info-box-number">
                    {{ $ads->where('status','pending')->count() }}
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>

    <div class="col-lg-6 col-6">
        <div class="info-box">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-down"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Total Rejected</span>
                <span class="info-box-number">
                    {{ $ads->where('status','rejected')->count() }}
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>
</div>
@endsection

