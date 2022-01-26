@extends('layouts.master')

@section('title','Dashboard')
@section('content')

@include('layouts.loading')

<div class="row">

    @if ($subs->quota == $event->count())
        <div class="col-12">
            <div class="alert alert-warning alert-dismissible fade show">
                <p class="text-center mb-0"><i class="fas fa-exclamation"></i> Your quota has finished. Please add more if you want to post more events. Click <a href="{{ route('organizer.profile')}}">here.</a></p>
            </div>
            
        </div>
    @endif

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
     <!-- Data visualisation -->
     <div class="col-lg-12">
        <div class="card">
            <div class="card-header border-0 bg-indigo">
                <div class="d-flex justify-content-start align-items-center">
                    <h3 class="card-title mb-0">Weekly Event Report</h3>
                   
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex">
                    <p class="d-flex flex-column">
                        <span class="text-bold text-lg">{{$totalJoin}}</span>
                        <span>Join Over Time</span>
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
                    <canvas id="joinEvent" height="400" style="display: block; height: 200px; width: 402px;" width="804" class="chartjs-render-monitor"></canvas>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"
            integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg=="
            crossorigin="anonymous" referrerpolicy="no-referrer" defer>
</script>

<script type="text/javascript">
     $(document).ready(function () {
        /*
            ===========
            LINE CHART
            ===========
            */
            const applicationChartCanvas = $('#joinEvent').get(0).getContext('2d')
            var areaChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                elements: {
                    line: {
                        tension: 0.4
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: "Date"
                        },
                        grid: {
                            display: false,
                        }
                    },
                    y: {
                        stacked: true,
                        title: {
                            display: true,
                            text: "Total Joined"
                        },
                        grid: {
                            display: false,
                        }
                    }
                }
            }
            new Chart(applicationChartCanvas, {
                type: 'line',
                data: {
                    labels: {!! json_encode($joinDate->keys()) !!},
                    datasets: [
                        {
                            label: 'Total Joined',
                            backgroundColor: '#5B56B0',
                            borderColor: 'rgba(210, 214, 222, 1)',
                            fill: true,
                            data: {!! json_encode($joinDate->values()) !!}
                        },
                      
                    ]
                },
                options: areaChartOptions
            });
        

    });
</script>

@endpush