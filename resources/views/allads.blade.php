@extends('layouts.viewer')

@section('title','All Advertisement')

@section('content')
<div class="card row mb-5 d-flex justify-content-between">

    <div class="card-body">
        <form class="form-group d-flex flex-column align-items-start justify-content-end" method="GET"
            action="{{ route('advertisement.allads') }}" enctype="multipart/form-data">

            <div class="d-flex flex-row align-items-center justify-content-end mb-2">
                <span class="mr-3">Sort By:</span>
                <button class="btn btn-primary mr-1" name="sort" type="submit" value="all-ads">All</button>
                <button class="btn btn-primary mr-1" name="sort" type="submit" value="newest">Newest</button>
                <button class="btn btn-primary mr-1" name="sort" type="submit" value="popular">Popularity</button>
            </div>

            <div class="d-flex flex-row align-items-center justify-content-start mb-2">
                <span class="mr-3">Ads Type:</span>
                <button class="btn btn-primary mr-1" name="sort" type="submit" value="Food">Food</button>
                <button class="btn btn-primary mr-1" name="sort" type="submit" value="Rental">Rental</button>
                <button class="btn btn-primary mr-1" name="sort" type="submit" value="Product">Product</button>
            </div>

            <div class="d-flex flex-row align-items-center justify-content-start">
                <span class="mr-3">Price:</span>
                <button class="btn btn-primary mr-1" name="sort" type="submit" value="price_asc">Low to High</button>
                <button class="btn btn-primary" name="sort" type="submit" value="price_desc">High to Low</button>
            </div>
        </form>

        <form class="form-group " method="GET" action="{{ route('web.searchadsV') }}">
            @csrf
            <div class="input-group">
                <input type="search" name="searchadsV" id="searchadsV" class="form-control" placeholder="search"
                    required />
                <div class="input-group-append">
                    <button type="" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>


            </div>
        </form>
    </div>
</div>

<div class="row justify-content-center">
    @foreach($ads as $key => $item)
        <div class="col-md-3 mb-5">
            <a href="{{ route("advertisement.adsdetails", $item->id_ads) }}" class="cards">
                <img src="{{ asset('img/'.$item->picture) }}" class="card__image img-fluid"
                    alt="" />
                <div class="card__overlay">
                    <div class="card__header">
                        <svg class="card__arc" xmlns="http://www.w3.org/2000/svg">
                            <path /></svg>
                        <div class="card__header-text">
                            <h3 class="card__title">{{ $item->name }}</h3>
                            <span class="card__status">{{ $item->type }}</span>
                        </div>
                    </div>
                    <p class="card__description">{{ $item->description }}</p>
                </div>
            </a>
        </div>
    @endforeach

</div>
<div class="d-flex justify-content-end">
    {{ $ads->links('layouts.pagination-custom') }}
</div>
@endsection
