@extends('layouts.viewer')

@section('title','All Events')

@section('content')

<div class="row justify-content-center" >
@foreach($event as $key => $item)
    <div class="col-md-3 mb-5">
        <a href="{{ route("event.eventdetails", $item->id_event) }} " class="cards">
            <img src="{{  asset('img/'.$item->picture) }}" class="card__image" alt="" />
            <div class="card__overlay">
              <div class="card__header">
                <svg class="card__arc" xmlns="http://www.w3.org/2000/svg"><path /></svg>
                <div class="card__header-text">
                  <h3 class="card__title">{{$item->name}}</h3>            
                  <span class="card__status">By {{$item->organizer}}</span>
                </div>
              </div>
              <p class="card__description">{{$item->description}}</p>
            </div>
          </a>      
    </div>
    @endforeach
  
</div>
<div class="d-flex justify-content-end">
        {{ $event->links('layouts.pagination-custom') }}
    </div>
@endsection