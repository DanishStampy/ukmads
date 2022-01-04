@extends('layouts.master')

@section('title','All Advertisement')

@section('content')
<div class="row">
    <div class="col">
        <div class="card" style="width: 14rem;">
            <!-- <a href=" {{ route("adsdetails") }} " > -->
                <img class="card-img-top" src="{{ asset('img/musicfest.jpg') }}" alt="Card image cap" style="height: 310px;object-fit: fill;">
            </a>
        </div>
    </div>
    <div class="col">
        <div class="card" style="width: 14rem;">
            <!-- <a href=" {{ route("adsdetails") }} " > -->
                <img class="card-img-top" src="{{ asset('img/musicfest.jpg') }}" alt="Card image cap" style="height: 310px;object-fit: fill;">
            </a>
        </div>
    </div>
    <div class="col">
        <div class="card" style="width: 14rem;">
            <!-- <a href=" {{ route("adsdetails") }} " > -->
                <img class="card-img-top" src="{{ asset('img/berrycombo.png') }}" alt="Card image cap" style="height: 310px;object-fit: fill;">
            </a>
        </div>
    </div>
    <div class="col">
        <div class="card" style="width: 14rem;">
            <!-- <a href=" {{ route("adsdetails") }} " > -->
                <img class="card-img-top" src="{{ asset('img/mouthgasmkokiss.png') }}" alt="Card image cap" style="height: 310px;object-fit: fill;">
            </a>
        </div>
    </div>
</div>

@endsection