@extends('layouts.viewer')

@section('title','Popular Events')

@section('content')

@if(count($popularEvent) < 1)
<div class="ml-3 mt-1">
  <h5>No data to be displayed.</h5>
</div>
@else
<div id="carouselExampleControls" class="carousel slide bg-fuchsia p-4 rounded" data-ride="carousel">
    <div class="carousel-inner">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleControls" data-slide-to="0" class="active">
            </li>
        </ol>

        @foreach($popularEvent as $key => $item)
            <div class="carousel-item  {{ $key == 0 ? 'active' : '' }}">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <img class="rounded mx-auto d-block w-100" src="{{ asset('img/'.$item->picture) }}"
                    alt="First slide" style="height: 756px; width: 540px;">
                    </div>
                    <div class="col-md-6 d-flex flex-column align-self-center text-center">
                        <h1 class="">
                            {{$item->name}}
                        </h1>

                        <div class="mb-5">
                            <p class="lead">{{$item->description}}</p>
                        </div>
                            
                        <a href=" {{ route("event.eventdetails", $item->id_event) }} "
                            type="button" class="btn bg-reverse-fuchsia">Join Now</a>
                        
                    </div>
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
        <h3 style="font-weight: bold; margin-top: 2rem;">Newest Events</h3>
    </div>
    <div class="col-sm-4 text-right" style="margin-top: 2rem;">
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
@endif


@endsection
