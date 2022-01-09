@extends('layouts.viewer')

@section('title','All Advertisement')

@section('content')
<div class="row mb-5">
    {{-- <div class="navbar-search-block">
        <form class="form" method="GET" action="">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" name="searchads" placeholder="Search ads"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
        </form>
    </div> --}}
    <div class="input-group d-flex justify-content-end ">
        <div class="form-outline">
          <input type="search" id="form1" class="form-control" placeholder="search"/>
        </div>
        <button type="button" class="btn btn-primary">
          <i class="fas fa-search"></i>
        </button>
      </div>
</div>

<div class="row justify-content-center">
@foreach($ads as $key => $item)
    <div class="col-md-3 mb-5">
        <div class="card" style="width: 14rem;">
             <a href=" {{ route("advertisement.adsdetails", $item->id_ads) }} " > 
                <img class="card-img-top" src="{{  asset('img/'.$item->picture) }}" alt="Card image cap" style="height: 310px;object-fit: fill;">
            </a>
        </div>
    </div>
    @endforeach
    
</div>
<div class="d-flex justify-content-end">
        {{ $ads->links('layouts.pagination-custom') }}
    </div>
@endsection