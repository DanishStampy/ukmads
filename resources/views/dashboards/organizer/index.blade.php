@extends('layouts.master')

@section('title','Dashboard')
@section('content')

@include('layouts.loading')

<div class="row">
    <div class="col-lg-12 col-12">
        <div class="small-box bg-indigo">
            <div class="inner">
                <p>Total created events:</p>
                <h3>
                    {{ $event->count() }}
                </h3>
            </div>
            <div class="icon">
              <i class="fas fa-calendar-week"></i>
            </div>
            <a href="{{ route('organizer.manageevents') }}" class="small-box-footer">
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
                    {{ $event->where('status','draft')->count() }}
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
                    {{ $event->where('status','verified')->count() }}
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
                    {{ $event->where('status','pending')->count() }}
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
                    {{ $event->where('status','rejected')->count() }}
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
    </div>
</div>
@endsection
