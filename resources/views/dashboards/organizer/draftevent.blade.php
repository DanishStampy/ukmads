@extends('layouts.master')
@section('title','Draft Event')

@section('content')

<h4>Events</h4>
<div>
    <div class="row">
        @if(count($events) < 1)
            <div class="ml-3 mt-1">
                <h5>No data to be displayed.</h5>
            </div>
        @endif
        @foreach($events as $event)
            @if($event->status!=='pending')

                <div class="col-6 col-md-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('img/'.$event->picture) }}"
                            onError="this.onerror=null;this.src='{{ asset("img/noimage.jpg") }}';"
                            style="height:200px;object-fit: cover">
                        <div class="card-body text-align-center">
                            <h5 class="card-title">{{ $event->name }}</h5>
                            <p class="card-text"
                                style="height:30px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                {{ $event->description }}</p>
                            <div class="row justify-content-center">
                                <a href="{{ route("organizer.editevent", $event->id_event) }}"
                                    class="btn btn-app bg-warning w-100 mr-2" type='button'>
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            @endif
        @endforeach
    </div>
    {{-- Pagination --}}
    <div class="d-flex justify-content-end">
        {{ $events->links() }}
    </div>
</div>
@endsection
