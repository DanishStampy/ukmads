@extends('layouts.master')

@section('title','Popular Advertisement')

@section('content')
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    @foreach($ads as $item)
    <div class="carousel-item active">
      <img class="rounded mx-auto d-block " src="{{ asset('img/'.$item->picture) }}" alt="First slide" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;height: 470px;width: 1000px;;object-fit: fill;">
      <div class="carousel-caption d-none d-md-block ">
        <!-- <a href=" {{ route("adsdetails",$item->id_ads) }} " type="button" class="btn btn-info">Join Now</a> -->
      </div>
    </div>
    @endforeach
    <!-- <div class="carousel-item">
      <img class="rounded mx-auto d-block  " src="{{ asset('img/berrycombo.png') }}" alt="Second slide" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;height: 470px;width: 1000px;;object-fit: fill;">
      <div class="carousel-caption d-none d-md-block">

        <a href=" {{ route("adsdetails") }} " type="button" class="btn btn-info">Join Now</a>
      </div>
    </div>
    <div class="carousel-item">
      <img class="rounded mx-auto d-block " src="{{ asset('img/mouthgasmkokiss.png') }}" alt="Third slide" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;height: 470px;width: 1000px;;object-fit: fill;">
      <div class="carousel-caption d-none d-md-block">

        <a href=" {{ route("adsdetails") }} " type="button" class="btn btn-info">Join Now</a>
      </div>
    </div> -->
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true" style="fill:black;"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="row">
  <div class="col-sm-8">
    <h4 style="font-weight: bold; margin-top: 2rem;">Newest Advertisement</h4>
  </div>
  <div class="col-sm-4" style="margin-top: 2rem; text-align:right;">
    <a href="{{ route('allads') }}">See all</a>
  </div>
</div>

<div class="row">
  <div class="col">
    <div class="card" style="width: 14rem;">
      <a href=" # " >
        <img class="card-img-top" src="{{ asset('img/musicfest.jpg') }}" alt="Card image cap" style="height: 310px;object-fit: fill;">
      </a>
    </div>
  </div>
  <div class="col">
    <div class="card " style="width: 14rem;">
      <a href=" # " >
        <img class="card-img-top" src="{{ asset('img/berrycombo.png') }}" alt="Card image cap" style="height: 310px;object-fit: fill;">
      </a>
    </div>
  </div>
  <div class="col">
    <div class="card" style="width: 14rem;">
      <a href=" # " >
        <img class="card-img-top" src="{{ asset('img/musicfest.jpg') }}" alt="Card image cap" style="height: 310px;object-fit: fill;">
      </a>
    </div>
  </div>
  <div class="col">
    <div class="card" style="width: 14rem;">
      <a href=" # " >
        <img class="card-img-top" src="{{ asset('img/musicfest.jpg') }}" alt="Card image cap" style="height: 310px;object-fit: fill;">
      </a>
    </div>
  </div>

</div>



@endsection