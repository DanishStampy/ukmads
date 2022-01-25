@extends('layouts.viewer')

@section('title','All Events')

@section('content')
<div class="card row mb-5 d-flex justify-content-between round">

    <div class="card-body">
        <form class="form-group border-bottom pb-3" method="GET" action="{{ route('web.searcheventsV') }}">
            @csrf
            <div class="input-group ">
                <input type="search" name="searcheventsV" id="searcheventsV" class="form-control round" placeholder="search"
                    required />
                <div class="input-group-append">
                    <button type="" class="btn bg-indigo round">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <form class="form-group d-flex flex-column align-items-start justify-content-end" method="GET"
            action="{{ route('event.allevents') }}" enctype="multipart/form-data">

            <div class="d-flex flex-row align-items-center">
                <span class="mr-3">Sort By:</span>
                <button class="btn bg-indigo mr-1 round" name="sort" type="submit" value="all-ads">All</button>
                <button class="btn bg-indigo mr-1 round" name="sort" type="submit" value="newest">Newest</button>
                <button class="btn bg-indigo mr-1 round" name="sort" type="submit" value="popular">Popularity</button>
                <button class="btn bg-indigo mr-1 round" name="sort" type="submit" value="date">Date</button>
            </div>
        </form>
    </div>
</div>

<div class="row justify-content-center">
    @foreach($event as $key => $item)
        <div class="col-md-3 mb-5">
            <a href="{{ route("event.eventdetails", $item->id_event) }} " class="cards">
                <img src="{{ asset('img/'.$item->picture) }}" class="card__image" alt="" />
                <div class="card__overlay">
                    <div class="card__header">
                        <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                            <path /></svg>
                        <div class="card__header-text">
                            <h3 class="card__title">{{ $item->name }}</h3>
                            <span class="card__status">By {{ $item->organizer }}</span>
                        </div>
                    </div>
                    <p class="card__description">{{ $item->description }}</p>
                </div>
            </a>
        </div>
    @endforeach

</div>
<div class="d-flex justify-content-end">
    {{ $event->links('layouts.pagination-custom') }}
</div>
@endsection
