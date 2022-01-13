@extends('layouts.master')

@section('title','Dashboard')
@section('content')

@include('layouts.loading')

<div class="row">
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
    <!-- Data visualisation -->
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">Online Store Visitors</h3>
                    <a href="javascript:void(0);">View Report</a>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex">
                    <p class="d-flex flex-column">
                        <span class="text-bold text-lg">820</span>
                        <span>Visitors Over Time</span>
                    </p>
                    <p class="ml-auto d-flex flex-column text-right">
                        <span class="text-success">
                            <i class="fas fa-arrow-up"></i> 12.5%
                        </span>
                        <span class="text-muted">Since last week</span>
                    </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                    <div class="chartjs-size-monitor">
                        <div class="chartjs-size-monitor-expand">
                            <div class=""></div>
                        </div>
                        <div class="chartjs-size-monitor-shrink">
                            <div class=""></div>
                        </div>
                    </div>
                    <canvas id="visitors-chart" height="400" style="display: block; height: 200px; width: 402px;" width="804" class="chartjs-render-monitor"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                    <span class="mr-2">
                        <i class="fas fa-square text-primary"></i> This Week
                    </span>

                    <span>
                        <i class="fas fa-square text-gray"></i> Last Week
                    </span>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

