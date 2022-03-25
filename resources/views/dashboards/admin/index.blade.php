@extends('layouts.master')

@section('title','Dashboard')
@section('content')

    @include('layouts.loading')

    <div class="row">
        <div class="col-lg-6 col-6">
            <div class="small-box bg-purple">
                <div class="inner">
                    <p>Total pending advertisement:</p>
                    <h3>
                        {{ $advertisements->count() }}
                    </h3>
                </div>
                <div class="icon">
                    <i class="fas fa-bullhorn"></i>
                </div>
                <a href="{{ route('admin.pendingads') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-6 col-6">
            <div class="small-box bg-purple">
                <div class="inner">
                    <p>Total pending event:</p>
                    <h3>
                        {{ $events->count() }}
                    </h3>
                </div>
                <div class="icon">
                    <i class="fas fa-calendar-week"></i>
                </div>
                <a href="{{ route('admin.pendingads') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-12">
            <div class="card">
              <div class="card-header border-0 bg-purple">
                <div class="d-flex justify-content-between align-items-center">
                  <h3 class="card-title mb-0">Weekly Report</h3>
                  
                </div>
              </div>
              <div class="card-body">
               
                <!-- /.d-flex -->

                <div class="position-relative mb-4"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                  <canvas id="ads" height="400" style="display: block; height: 200px; width: 402px;" width="804" class="chartjs-render-monitor"></canvas>
                </div>

               
              </div>
            </div>
            <!-- /.card -->

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
            const applicationChartCanvas = $('#ads').get(0).getContext('2d')
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
                        stacked: true,
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
                type: 'bar',
                data: {
                    labels: {!! json_encode($joinDateAds->keys()) !!},
                    datasets: [
                        {
                            label: 'Ads Received',
                            backgroundColor: '#ff6384',
                            borderColor: 'rgba(210, 214, 222, 1)',
                            fill: true,
                            data: {!! json_encode($joinDateAds->values()) !!}
                        },
                        {
                            label: 'Event Received',
                            backgroundColor: '#4bc0c0',
                            borderColor: 'rgba(210, 214, 222, 1)',
                            fill: true,
                            data: {!! json_encode($joinDateEvent->values()) !!}
                        },
                      
                    ]
                },
                options: areaChartOptions
            });
            
        

    });
</script>



@endpush