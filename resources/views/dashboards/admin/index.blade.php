@extends('layouts.master')

@section('title','Dashboard')
@section('content')

    @include('layouts.loading')

    <div class="row">
        <div class="col-lg-6 col-6">
            <div class="small-box bg-info">
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
            <div class="small-box bg-info">
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
    </div>

@endsection
