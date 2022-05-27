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

