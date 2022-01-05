@extends('layouts.master')

@section('title','Popular Events')

@section('content')
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleControls" data-slide-to="0" class="active">
            </li>
        </ol>

        @foreach($popularEvent as $key => $item)
            <div
                class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <img class="rounded mx-auto d-block " src="{{ asset('img/'.$item->picture) }}"
                    alt="First slide"
                    style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; height: 470px; width: 1000px; object-fit: fill;">
                <div class="carousel-caption d-none d-md-block ">
                    <a href=" {{ route("event.eventdetails", $item->id_event) }} "
                        type="button" class="btn btn-info">Join Now</a>
                </div>
            </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true" style="fill:black;"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="row">
    <div class="col-sm-8">
        <h4 style="font-weight: bold; margin-top: 2rem;">Newest Events</h4>
    </div>
    <div class="col-sm-4" style="margin-top: 2rem; text-align:right;">
        <a href="{{ route('event.allevents') }}">See all</a>
    </div>
</div>

<div class="row justify-content-center">
  @foreach ($newestEvent as $item)
      <div class="col-md-3">
        <div class="card" style="width: 14rem;">
            <a href="{{ route("event.eventdetails", $item->id_event) }}">
                <img class="card-img-top" src="{{ asset('img/'. $item->picture) }}"
                    alt="Card image cap" style="height: 310px;object-fit: fill;">
            </a>
        </div>
    </div>
  @endforeach
    
</div>



@endsection
