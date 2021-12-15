@extends('layouts.master')
@section('title','My Contents')
@section('content')


<div class="row">
    <div class="col">
        <h1>Events</h1>
    </div>
</div>
@if(Session::has('success_events'))
    <div class="alert alert-success my-3">
        {{ Session::get('success_events') }}
    </div>
@elseif(Session::has('success_uploaded_events'))
    <div class="alert alert-success my-3">
        {{ Session::get('success_uploaded_events') }}
    </div>
@endif
<div class="row">

    @foreach($event as $event)
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <div class="border rounded" style="height:300px;">
                        <img src="/img/{{$event->picture}}" class="img-fluid" style="height:300px;">
                        <a href="{{ route("advertiser.editevent", $event->id_event) }}" class="btn btn-secondary">
                            Edit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <div class="border rounded "
                        style="height: 300px;background-image: url({{ asset('img/white.jpg') }});background-position: center;background-size: cover;">
                        <a href=" {{ route("advertiser.createevents") }} " class="btn btn-secondary"
                            type="button">+</a>
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection

