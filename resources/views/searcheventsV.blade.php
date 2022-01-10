@extends('layouts.viewer')

@section('title','All Events')

@section('content')
<div class="row mb-5 d-flex justify-content-end ">

    <form class="form-group " method="GET" action="{{ route('web.searcheventsV')}}">
    <div class="input-group ">
        
            <div class="form-outline">
                <input type="search" name="searcheventsV" id="searcheventsV" class="form-control" placeholder="search" required/>
            </div>
        <button type="" class="btn btn-primary">
          <i class="fas fa-search"></i>
        </button>
        
    </div>
</form>
</div>
<div class="row justify-content-center">
@foreach($events as $key => $item)
    <div class="col-md-3 mb-5">
        <div class="card" style="width: 14rem;">
            <a href="{{ route("event.eventdetails", $item->id_event) }}"> 
                <img class="card-img-top" src="{{  asset('img/'.$item->picture) }}" alt="Card image cap" style="height: 310px;object-fit: fill;">
            </a>
        </div>
    </div>
@endforeach
    
</div>
<div class="d-flex justify-content-end">
        {{ $events->links('layouts.pagination-custom') }}
</div>
@endsection