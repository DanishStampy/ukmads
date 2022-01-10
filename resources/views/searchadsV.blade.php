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
    <div class="col-md-3 mb-5">
        <div class="card" style="width: 14rem;">
            <a href="{{ route("advertisement.adsdetails", $item->id_ads) }}"> 
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