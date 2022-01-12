@extends('layouts.viewer')

@section('title','All Advertisement')

@section('content')
<div class="row justify-content-center">
@foreach($ads as $key => $item)
    <div class="col-md-3 mb-5">
        {{-- <div class="card" style="width: 14rem;">
             <a href=" {{ route("advertisement.adsdetails", $item->id_ads) }} " > 
                <img class="card-img-top" src="{{  asset('img/'.$item->picture) }}" alt="Card image cap" style="height: 310px;object-fit: fill;">
            </a>
        </div> --}}
        <a href="{{ route("advertisement.adsdetails", $item->id_ads) }}" class="cards">
            <img src="{{  asset('img/'.$item->picture) }}" class="card__image" alt="" />
            <div class="card__overlay">
              <div class="card__header">
                <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>
                <div class="card__header-text">
                  <h3 class="card__title">{{$item->name}}</h3>            
                  <span class="card__status">{{$item->type}}</span>
                </div>
              </div>
              <p class="card__description">{{$item->description}}</p>
            </div>
          </a>      
    </div>
    @endforeach
    
</div>
<div class="d-flex justify-content-end">
        {{ $ads->links('layouts.pagination-custom') }}
    </div>
@endsection

