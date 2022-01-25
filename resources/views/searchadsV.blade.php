@extends('layouts.viewer')

@section('title','All Advertisement')

@section('content')
<div class="card row mb-5 d-flex justify-content-between round">

    <div class="card-body">
        <form class="form-group pb-3" method="GET" action="{{ route('web.searchadsV') }}">
            <div class="input-group ">
                <div class="form-outline">
                    <input type="search" name="searchadsV" id="searchadsV" class="form-control" placeholder="search"
                        required />
                </div>
                <button type="" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>

            </div>
        </form>

        <form class="form-group d-flex flex-column align-items-between mb-0" method="GET"
            action="{{ route('advertisement.allads') }}" enctype="multipart/form-data">

            <div class="row align-items-center">
                <div class="col-6 d-flex flex-row justify-content-center">
                    <div class="align-items-center">
                        <span class="mr-3">Sort By:</span>
                        <button class="btn bg-indigo mr-1 round" name="sort" type="submit" value="all-ads">All</button>
                        <button class="btn bg-indigo mr-1 round" name="sort" type="submit" value="newest">Newest</button>
                        <button class="btn bg-indigo mr-1 round" name="sort" type="submit"
                            value="popular">Popularity</button>
                    </div>

                    <div class="align-items-center ml-1">
                        <select name="price" id="price" class="form-control round">
                            <option value="" selected>Price</option>
                            <option @if (Request::get('price')=='price_asc' ) selected @endif value="price_asc">Low to
                                High</option>
                            <option @if (Request::get('price')=='price_desc' ) selected @endif value="price_desc">High
                                to Low</option>
                        </select>

                    </div>
                </div>

                <div class="col-6 d-flex flex-row justify-content-center">
                    <div class="d-flex flex-row align-items-center justify-content-end mb-2">
                        <span class="mr-3">Ads Type:</span>
                        <button class="btn bg-indigo mr-1 round" name="sort" type="submit" value="Food">Food</button>
                        <button class="btn bg-indigo mr-1 round" name="sort" type="submit" value="Rental">Rental</button>
                        <button class="btn bg-indigo mr-1 round" name="sort" type="submit" value="Product">Product</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


</div>
<div class="row justify-content-center">
    @foreach($ads as $key => $item)
        @if($item->status=='verified')
            <div class="col-md-3 mb-5">
                <a href="{{ route("advertisement.adsdetails", $item->id_ads) }}"
                    class="cards">
                    <img src="{{ asset('img/'.$item->picture) }}" class="card__image" alt="" />
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
        @endif
    @endforeach

</div>
<div class="d-flex justify-content-end">
    {{ $ads->links('layouts.pagination-custom') }}
</div>
@endsection
