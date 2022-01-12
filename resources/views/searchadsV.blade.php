@extends('layouts.viewer')

@section('title','All Advertisement')

@section('content')
<div class="row mb-5 d-flex justify-content-end ">

    <form class="form-group " method="GET" action="{{ route('web.searchadsV')}}">
    <div class="input-group ">
        
            <div class="form-outline">
                <input type="search" name="searchadsV" id="searchadsV" class="form-control" placeholder="search" required/>
            </div>
        <button type="" class="btn btn-primary">
          <i class="fas fa-search"></i>
        </button>
        
    </div>
</form>
</div>
<div class="row justify-content-center">
    @foreach($ads as $key => $item)
        @if ($item->status=='verified')
            <div class="col-md-3 mb-5">
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
        @endif    
    @endforeach
        
    </div>
<div class="d-flex justify-content-end">
        {{ $ads->links('layouts.pagination-custom') }}
</div>
@endsection