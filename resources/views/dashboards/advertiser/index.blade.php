@extends('layouts.master')

@section('title','Dashboard')
@section('content')

@include('layouts.loading')

<div class="row">
  <div class="col-lg-6 col-6">
    <div class="small-box bg-info">
      <div class="inner">
        <p>Total created advertisement:</p>
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
    <div class="small-box bg-info">
      <div class="inner">
        <p>Total created event:</p>
        <h3>
          {{ $event->count() }}
        </h3>
      </div>
      <div class="icon">
        <i class="fas fa-calendar-week"></i>
      </div>
      <a href="{{ route('advertiser.manageevents') }}" class="small-box-footer">
        More info <i class="fas fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  


</div>
<div class="row">
  <div class="col-lg-6 col-6">
    <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
      <div class="card-header">Total Advertisements Pending</div>
      <div class="card-body">
        <h1 class="card-text" value="adspend">

        </h1>
      </div>
    </div>
  </div>
  
  <div class="col-lg-6 col-6">
    <div class="card text-white bg-warning mb-3" style="max-width: 18rem;">
      <div class="card-header">Total Events Pending</div>
      <div class="card-body">
        <h1 class="card-text">
          {{ $event->count() }}
        </h1>
      </div>
    </div>
  </div>
</div>
@endsection