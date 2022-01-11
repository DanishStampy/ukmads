@extends('layouts.master')
@section('title','Draft List')

@section('content')
<div>
    {{-- Pagination --}}
    <div class="d-flex justify-content-end">
        {{ $events->links('layouts.pagination-custom') }}
    </div>
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
                        <div class="card-body" style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap">
                            <h5 class="card-title" style="width: 230px;text-overflow: inherit;overflow: inherit">
                                {{ $event->name }}</h5>
                            <p class="card-text" style="height: 30px;text-overflow: inherit;overflow: inherit">
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
</div>
@endsection
