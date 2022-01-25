@extends('layouts.viewer')

@section('content')

@if(Session::has('success_submit'))
    <div class="alert alert-success alert-dismissible fade show my-3">
        {{ Session::get('success_submit') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

@elseif(Session::has('failed_submit'))
    <div class="alert alert-danger alert-dismissible fade show my-3">
        {{ Session::get('failed_submit') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show my-3">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
        @foreach($errors->all() as $err)
            <li class="">{{ $err }}</li>
        @endforeach
    </div>
@endif

<div class="row justify-content-center align-items-center">
    <div class="col-5 round card card-detail-img" data-aos="fade-right">
        <div class="card-body">
            <img src="{{ asset('img/'.$details->picture) }}" class="round product-image"
                alt="Product Image">
        </div>
    </div>

    <div class="col-7 pl-0">
        <div class="card-detail card round" data-aos="fade-left">
            <div class="card-body">
                <div class="d-flex flex-row justify-content-between align-items-start">
                    <h1 class="detail-title text-left">{{ $details->name }}</h1>
                </div>
                <div class="border-bottom d-flex flex-row justify-content-between align-items-end mt-3"
                    style="color: #929292">
                    <p class="text-left font-weight-normal">By {{ $details->organizer }}</p>
                    <p class="text-right font-weight-light ml-auto" style="color: #929292"><i
                            class="fas fa-address-book"></i>
                        {{ $details->join }}</p>
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
                        Location
                    </h2>
                    <p class="detail-item-content">
                        {{ $details->location }}
                    </p>
                </div>

                <div class="d-flex flex-row justify-content-between align-items-center">
                    <h2 class="detail-item">
                        Time
                    </h2>
                    <p class="detail-item-content">
                        {{ date('g:i a', strtotime($details->time)) }}
                    </p>
                </div>

                <div class="d-flex flex-row justify-content-between align-items-center">
                    <h2 class="detail-item">
                        Date
                    </h2>
                    <p class="detail-item-content ">
                        {{ date("d-m-Y", strtotime($details->date)) }}
                    </p>
                </div>

                <div class="text-center my-4 ">
                    <a href="https://api.WhatsApp.com/send?phone=+6{{ $details->contact }}" target="_blank"
                        class="btn-links btn-detail ">
                        Contact for more information
                        <i class="ml-1 fab fa-whatsapp"></i>
                    </a>
                    <button data-toggle="modal" data-target="#joinForm" class="btn-links btn-detail ml-2">
                        Join now
                        <i class="ml-1 fas fa-file-signature"></i>
                    </button>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="joinForm" tabindex="-1" aria-labelledby="joinFormModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-fuchsia">
                <h3 class="modal-title" id="joinFormModal">Register here</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" style="color: #fff;">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('event.joinlist') }}" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="card-body">
                        <input type="hidden" name="id_event" value="{{ $details->id_event }}" />
                        <div class="form_group">
                            <input type="email" name="guest_email" class="form-control form_input" id="email" placeholder=" " value="">
                            <label for="guest_email" class="form_label">Email</label>
                        </div>
                        <div class="form_group">
                            <input type="text" name="guest_name" class="form-control form_input" id="name" placeholder=" " value="">
                            <label for="guest_name" class="form_label">Name</label>
                        </div>
                        <div class="form_group">
                            <input type="text" name="guest_contact" class="form-control form_input" id="contact" placeholder=" " value="">
                            <label for="guest_contact" class="form_label">Contact Number</label>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn-links btn-detail mt-0">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection
