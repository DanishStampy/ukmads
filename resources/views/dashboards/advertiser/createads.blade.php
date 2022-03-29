@extends('layouts.master')
@section('title','My Contents')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col mt-3">
            <h1 class="content_header">Create Advertisement</h1>
        </div>
    </div>
</div>

@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show m-3">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
        @foreach ($errors->all() as $err)
            <li class="">{{$err}}</li>
        @endforeach
    </div>
@endif

<div class="container">
    <form action="{{ route('advertiser.uploadAds') }}" method="POST" class="form-horizontal"
        enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-secondary d-lg-flex align-items-lg-center vertical-center"
                            type="button"><input type="file" accept="images/*" name="fileToUpload[]" multiple id="inputImage" />
                        </button>
                        <img id="imgPreview" class="img-fluid img-thumbnail rounded mx-auto d-block mt-1"
                            src="{{ asset('img/noimage.jpg') }}"
                            onError="this.onerror=null;this.src='{{ asset("img/noimage.jpg") }}';"
                            style="width: 450px; height: 450px;">
                    </div>
                    <div class="card-header bg-purple">
                        <h5 class="d-lg-flex justify-content-lg-center">Upload Picture</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-purple">
                        <h5 class="mb-0">Content Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form_group">
                                    <input id="name" type="text" class="form_input is-invalid" name="name" placeholder=" "
                                        autofocus value="">
                                    <label for="name" class="form_label">Name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form_group">
                                    {{-- <input id="product" type="text" class="form_input" name="product" placeholder=" "
                                        value=""> --}}
                                        <select id="product" name="product" class="form_input">
                                            <option value="Product">Product</option>
                                            <option value="Food">Food & Beverages</option>
                                            <option value="Rental">Rental</option>
                                        </select>
                                    <label for="product" class="form_label">Product Type</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form_group">
                                    <input id="price" type="number" min="0.00" step="0.01" class="form_input"
                                        name="price" placeholder=" " value="">
                                    <label for="price" class="form_label">Price</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form_group">
                                    <input id="seller" type="text" class="form_input" name="seller" placeholder=" "
                                        value="">
                                    <label for="seller" class="form_label">Seller Name</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form_group">
                                    <input id="contact" type="text" class="form_input" name="contact"
                                        placeholder=" " value="">
                                    <label for="contact" class="form_label">Contact Number</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form">
                                    {{-- <input id="desc" type="text" class="form_input" name="desc" placeholder=" "
                                        value=""> --}}
                                    <textarea name="desc" class="form_input" id="desc" style="min-height: 100px"></textarea>
                                    <label for="desc" class="form_label">Description</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col d-lg-flex justify-content-lg-end">

                                @if ($subs->subs_status == 'NO' || $adsCreated == $subs->quota)
                                    <a href="{{ route('advertiser.profile')}}" name="action" value="save" class="btn btn-create text-right border rounded shadow-none"
                                    type="button" style="margin-right: 10px;">Ads Quota</a>

                                @else
                                    <button name="action" value="save" class="btn btn-warning text-right border shadow-none rounded"
                                    type="submit" style="margin-right: 10px;">Save As Draft</button>
                                    <button name="action" value="verify" id="verify-ads" class="btn btn-create text-right border rounded shadow-none"
                                    type="submit">Verify</button>

                                @endif
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>

@endsection

@push('scripts')
    <script type="text/javascript">
        inputImage.onchange = evt => {
            const [file] = inputImage.files
            if (file) {
                imgPreview.src = URL.createObjectURL(file)
            }
        }

    </script>
@endpush
