@extends('layouts.master')

@section('title','All Events')

@section('content')

<div class="row justify-content-center" >
@foreach($event as $key => $item)
    <div class="col-md-3 mb-5">
        <div class="card" style="width: 14rem;">
            <a href="{{ route("event.eventdetails", $item->id_event) }} " >
                <img class="card-img-top" src="{{  asset('img/'.$item->picture) }}" alt="Card image cap" style="height: 310px;object-fit: fill;">
            </a>
        </div>
    </div>
    @endforeach
  
</div>
<div class="d-flex justify-content-end">
        {{ $event->links() }}
    </div>
@endsection