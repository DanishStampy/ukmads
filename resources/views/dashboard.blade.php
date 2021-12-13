@extends('layouts.app')

@section('title','Dashboard')
@section('content')
    <!-- Default box with Title & Footer -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Announcement</h3>

            <!-- Card Button (Remove if needed) -->
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>

            </div>
        </div>
        <div class="card-body">
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
            industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
            scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into
            electronic typesetting, remaining essentially unchanged.
        </div>
        <!-- /.card-body -->

        <!-- /.card-footer-->
    </div>
    <!-- /.card -->

    <!-- Default box -->
    <div class="row pt-5">
        <div class="col-lg-4 col-6 mx-auto">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>2</h3>

                    @if (Auth::user()->role == 'student')
                    <p>Total Registered Courses</p>
                    @elseif (Auth::user()->role == 'lecturer')
                    <p>Total Submitted Application</p>
                    @elseif (Auth::user()->role == 'admin')
                    <p>Total Submitted Feedback</p>
                    @endif
                </div>
                <div class="icon">
                    <i class="fas fa-chart-bar"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-6 mx-auto">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>1</h3>

                    @if (Auth::user()->role == 'student')
                    <p>Total Approved Application</p>
                    @elseif (Auth::user()->role == 'lecturer')
                    <p>Total Approved Application</p>
                    @elseif (Auth::user()->role == 'admin')
                    <p>Total Feedback Today</p>
                    @endif
                </div>
                <div class="icon">
                    <i class="fas fa-check-square"></i>
                </div>
            </div>
        </div>

    </div>
@endsection