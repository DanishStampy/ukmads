@extends('layouts.viewer')

@section('title','Popular Events')

@section('content')

@if(count($popularEvent) < 1)
    <div class="ml-3 mt-1">
        <h5>No data to be displayed.</h5>
    </div>
@else
    <div id="carouselExampleControls" class="carousel slide bg-fuchsia p-4 round" data-ride="carousel">
        <div class="carousel-inner">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleControls" data-slide-to="0" class="active">
                </li>
                <li data-target="#carouselExampleControls" data-slide-to="1">
                </li>
                <li data-target="#carouselExampleControls" data-slide-to="2">
                </li>
            </ol>

            @foreach($popularEvent as $key => $item)
                <div
                    class="carousel-item  {{ $key == 0 ? 'active' : '' }}">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <img class="round mx-auto d-block w-100"
                                src="{{ asset('img/'.$item['picture'][0]) }}" alt="First slide"
                                style="height: 756px; width: 540px;">
                        </div>
                        <div class="col-md-6 d-flex flex-column align-self-center text-center">
                            <h1 class="">
                                {{ $item->name }}
                            </h1>

                            <div class="mb-5">
                                <p class="lead">{{ $item->description }}</p>
                            </div>

                            <a href=" {{ route("event.eventdetails", $item->id_event) }} "
                                type="button" class="btn bg-reverse-fuchsia round">Join Now</a>

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

    <div class="card mt-5 round">
        <div class="card-body p-4">
            <div class="row mb-3">
                <div class="col-sm-8">
                    <h3 class="mt-0 h3-title">Newest Events</h3>
                </div>
                <div class="col-sm-4 text-right">
                    <a href="{{ route('event.allevents') }}" class="see-all">See all</a>
                </div>
            </div>

            <div class="row justify-content-center">
                @foreach($newestEvent as $item)
                    <div class="col-md-3 d-flex flex-row justify-content-center">
                        <div class="round card card-newest" style="width: 14rem;">
                            <a href="{{ route("event.eventdetails", $item->id_event) }}">
                                <img class="round card-img-top img-newest"
                                    src="{{ asset('img/'. $item['picture'][0]) }}"
                                    alt="Card image cap">
                            </a>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <br>

@endif


@endsection
