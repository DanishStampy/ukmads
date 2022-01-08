@extends('layouts.master')
@section('title','Draft List')

@section('content')
<h4>Advertisement</h4>
<div>
    <div class="row">
        @if(count($ads) < 1)
            <div class="ml-3 mt-1">
                <h5>No data to be displayed.</h5>
            </div>
        @endif
        @foreach($ads as $item)
            @if($item->status!=='pending')

                <div class="col-6 col-md-3">
                    <div class="card">
                        <img class="card-img-top" src="{{ asset('img/'.$item->picture) }}"
                            onError="this.onerror=null;this.src='{{ asset("img/noimage.jpg") }}';"
                            style="height:200px;object-fit: cover">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <p class="card-text"
                                style="height:30px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;">
                                {{ $item->description }}</p>
                            <div class="row justify-content-center">
                                <a href="{{ route("advertiser.editads", $item->id_ads) }}"
                                    class="btn btn-app bg-warning w-100 mr-2">
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
        {{ $ads->links() }}
    </div>
</div>
@endsection