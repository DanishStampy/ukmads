@extends('layouts.master')
@section('title','My Contents')
@section('content')


<div class="row">
    <div class="col">
        <h1>Events</h1>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body text-center">
                <div class="border rounded"
                    style="height: 300px;background-image: url({{ asset('img/white.jpg') }});background-position: center;background-size: cover;">
                </div><br><img src="{{ asset('img/tick.png') }}" style="width: 20%;height:20%;">
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body text-center">
                <div class="border rounded"
                    style="height: 300px;background-image: url({{ asset('img/white.jpg') }});background-position: center;background-size: cover;">
                </div><br><img src="{{ asset('img/tick.png') }}" style="width: 20%;height:20%;">
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body text-center">
                <div class="border rounded"
                    style="height: 300px;background-image: url({{ asset('img/white.jpg') }});background-position: center;background-size: cover;">
                </div><br><img src="{{ asset('img/x.png') }}" style="width: 16%;height:20%;">
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body text-center">
                <div class="border rounded"
                    style="height: 300px;background-image: url({{ asset('img/white.jpg') }});background-position: center;background-size: cover;">
                </div><br><img src="{{ asset('img/!.png') }}" style="width: 25%;height:20%;">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body text-center">
                <div class="border rounded"
                    style="height: 300px;background-image: url({{ asset('img/white.jpg') }});background-position: center;background-size: cover;">
                    <a href=" {{ route("advertiser.createevents") }} " class="btn btn-secondary" type="button">+</a>
                </div>
            </div>
        </div>
    </div>
    <div class="col"></div>
    <div class="col"></div>
    <div class="col"></div>
</div>
@endsection

</html>
