@extends('layouts.master')
@section('title','My Contents')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col mt-3">
                <h1 class="content_header">Create Advertisement</h1>
            </div>
        </div>
        <div class="container">
            <form action="{{ route('advertiser.uploadAds') }}" method="POST" class="form-horizontal"
                  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body" style="height: 500px;">
                                <div style="background-image: url({{ asset('img/white.jpg') }});"
                                     class="row">
                                    <button class="btn btn-secondary d-lg-flex align-items-lg-center vertical-center"
                                            type="button"><input type="file" accept="images/*" name="fileToUpload"
                                                                 id="inputImage"/>
                                    </button>
                                </div>
                            </div>
                            <div class="card-header">
                                <h5 class="d-lg-flex justify-content-lg-center">Upload Picture</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Content Details</h5>
                            </div>
                            <div class="card-body">
                                {{-- <div class="row">
                                <div class="col-md-6 text-center">
                                    <div class="form-check"><button class="btn btn-primary text-right border rounded"
                                            type="button">Advertisement</button></div>
                                </div>
                                <div class="col-md-6 text-center">
                                    <div class="form-check"><button class="btn btn-primary text-right border rounded"
                                            type="button">Event</button></div>
                                </div>
                            </div>
                            <hr>
                            <br> --}}


                                <div class="row">
                                    <div class="col">
                                        <div class="form_group">
                                            <input id="name" type="text" class="form_input" name="name" placeholder=" "
                                                   autofocus value="">
                                            <label for="name" class="form_label">Name</label>
                                            <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form_group">
                                            <input id="product" type="text" class="form_input" name="product"
                                                   placeholder=" " value="">
                                            <label for="product" class="form_label">Product Type</label>
                                            <span class="text-danger">@error('product'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form_group">
                                            <input id="price" type="number" min="0.00" step="0.01" class="form_input"
                                                   name="price" placeholder=" " value="">
                                            <label for="price" class="form_label">Price</label>
                                            <span class="text-danger">@error('price'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="form_group">
                                            <input id="seller" type="text" class="form_input" name="seller"
                                                   placeholder=" "
                                                   value="">
                                            <label for="seller" class="form_label">Seller Name</label>
                                            <span class="text-danger">@error('seller'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form_group">
                                            <input id="contact" type="text" class="form_input" name="contact"
                                                   placeholder="#01234567890" pattern="^01[0-9]{1}([0-9]{8}|[0-9]{7})"
                                                   value="">
                                            <label for="contact" class="form_label">Contact Number</label>
                                            <span class="text-danger">@error('contact'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col">
                                        <div class="form_group">
                                            <input id="desc" type="text" class="form_input" name="desc" placeholder=" "
                                                   value="">
                                            <label for="desc" class="form_label">Description</label>
                                            <span class="text-danger">@error('desc'){{ $message }}@enderror</span>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col d-lg-flex justify-content-lg-end">
                                        <button class="btn btn-primary text-right border rounded" type="button"
                                                style="margin-right: 10px;" disabled>Save As Draft
                                        </button>
                                        <button class="btn btn-primary text-right border rounded"
                                                type="submit">Verify
                                        </button>
                                    </div>
                                </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@endsection
