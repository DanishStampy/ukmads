@extends('layouts.viewer')

@section('content')

<div class="row justify-content-center align-items-center">
    <div class="col-5 round card card-detail-img" data-aos="fade-right">
        <div class="card-body" >
            <img src="{{ asset('img/'.$details->picture) }}" class="round product-image"
                alt="Product Image">
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
                    <a href="https://api.WhatsApp.com/send?phone=+6{{ $details->contact }}" target="_blank" class="btn-links btn-detail ">
                        Contact me
                        <i class="ml-1 fab fa-whatsapp"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>



@endsection
