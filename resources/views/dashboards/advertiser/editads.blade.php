@extends('layouts.master')
@section('title','Edit Advertisement')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col mt-3">
            <h1 class="content_header">Update {{ $ads->id_ads }}</h1>
        </div>
    </div>

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show my-3">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <h5><i class="icon fas fa-ban"></i> Alert!</h5>
            @foreach ($errors->all() as $err)
                <li class="">{{$err}}</li>
            @endforeach
        </div>
    @endif

    @if($ads->status == 'rejected' or $ads->reason != null)

    <div class="accordion mx-3 " id="accordionReasons">
        <div class="card">
        <div class="card-header bg-teal p-3" id="reason">
          <h2 class="mb-0">
            <button class="btn bg-teal text-left" type="button" data-toggle="collapse" data-target="#adsReason" aria-expanded="false" aria-controls="adsReason">
              Reject's reason
            </button>
          </h2>
        </div>
    
        <div id="adsReason" class="collapse show" aria-labelledby="reason" data-parent="#accordionReasons">
          <div class="card-body  p-3">
            {{$ads->reason}}
          </div>
        </div>
      </div>
    </div>
    
    
    @endif
    <br>
    <div class="container">
        <form action="{{ route('advertiser.updateAds', $ads->id_ads) }}" method="POST"
            class="form-horizontal" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <button class="btn btn-secondary d-lg-flex align-items-lg-center vertical-center"
                                type="button"><input type="file" accept="images/*" name="fileToUpload"
                                    id="inputImage" />
                            </button>
                            <img id="imgPreview" class="img-fluid img-thumbnail rounded mx-auto d-block mt-1"
                                src="/img/{{ $ads->picture }}"
                                onError="this.onerror=null;this.src='{{ asset("img/noimage.jpg") }}';"
                                style="width: 450px; height: 450px;">
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
                            <div class="row">
                                <div class="col">
                                    <div class="form_group">
                                        <input id="name" type="text" class="form_input" name="name" placeholder=" "
                                            autofocus value="{{ $ads->name }}">
                                        <label for="name" class="form_label">Name</label>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form_group">
                                        <input id="product" type="text" class="form_input" name="product"
                                            placeholder=" " value="{{ $ads->type }}">
                                        <label for="product" class="form_label">Product Type</label>
                                        
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form_group">
                                        <input id="price" type="number" min="0.00" step="0.01" class="form_input"
                                            name="price" placeholder=" " value="{{ $ads->price }}">
                                        <label for="price" class="form_label">Price</label>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form_group">
                                        <input id="seller" type="text" class="form_input" name="seller" placeholder=" "
                                            value="{{ $ads->seller_name }}">
                                        <label for="seller" class="form_label">Seller Name</label>
                                        
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form_group">
                                        <input id="contact" type="text" class="form_input" name="contact"
                                            placeholder=" "
                                            value="{{ $ads->contact }}">
                                        <label for="contact" class="form_label">Contact Number</label>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form_group">
                                        <input id="desc" type="text" class="form_input" name="desc" placeholder=" "
                                            value="{{ $ads->description }}">
                                        <label for="desc" class="form_label">Description</label>
                                        
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col d-lg-flex justify-content-lg-end">

                                    @if($ads->status == 'draft')
                                        <button class="btn btn-success text-right border rounded"
                                            type="submit" name="action" value="save">Save As Draft</button>
                                        <button class="btn btn-success text-right border rounded"
                                            type="submit" name="action" value="submit">Verify</button>

                                    @else
                                        <button class="btn btn-success text-right border rounded"
                                        type="submit" name="action" value="update">Update</button>
                                    @endif
                                </div>
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
