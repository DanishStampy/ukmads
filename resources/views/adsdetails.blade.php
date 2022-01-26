@extends('layouts.viewer')

@section('content')

<div class="row justify-content-center align-items-center">
    <div class="col-5 round card card-detail-img" data-aos="fade-right">
        <div class="card-body">

            @if( count($details['picture']) > 1)

                <div id="adsCarousel" class="carousel slide round product-image" data-ride="carousel">
                    <div class="carousel-inner">

                        @foreach($details['picture'] as $key => $item)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img src="/img/{{$item}}" class="round product-image" alt="Picture">
                            </div>
                        @endforeach

                    </div>
                    <a class="carousel-control-prev" href="#adsCarousel" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#adsCarousel" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>

            @else
                <img src="{{ asset('img/'.$details['picture'][0]) }}"
                    class="round product-image" alt="Product Image">
            @endif

        </div>
    </div>

    <div class="col-7 pl-0">
        <div class="card-detail card round" data-aos="fade-left">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-between align-items-start">
                    <h1 class="detail-title text-left">{{ $details->name }}</h1>
                    <p class="text-right font-weight-light ml-auto" style="color: #929292"><i class="fas fa-eye"></i>
                        {{ $details->reads }}</p>
                </div>
                <div class="border-bottom d-flex flex-row justify-content-between align-items-end mt-3"
                    style="color: #929292">
                    <p class="text-left font-weight-normal">By {{ $details->seller_name }}</p>
                    <p class="text-right font-italic font-weight-light">{{ $details->type }}</p>
                </div>

                <div class="">
                    <h2 class="detail-desc">
                        Description
                    </h2>
                    <p class="detail-desc">
                        {{ $details->description }}
                    </p>
                </div>

                <div class="d-flex flex-row justify-content-between align-items-center mt-5">
                    <h2 class="detail-item">
                        Price
                    </h2>
                    <p class="detail-item-content">
                        RM {{ $details->price }}
                    </p>
                </div>

                <div class="d-flex flex-row justify-content-between align-items-center">
                    <h2 class="detail-item">
                        Contact number
                    </h2>
                    <p class="detail-item-content">
                        {{ $details->contact }}
                    </p>
                </div>

                <div class="text-center my-4">
                    <a href="https://api.WhatsApp.com/send?phone=+6{{ $details->contact }}" target="_blank"
                        class="btn-links btn-detail ">
                        Contact me
                        <i class="ml-1 fab fa-whatsapp"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>



@endsection
