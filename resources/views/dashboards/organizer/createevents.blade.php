@extends('layouts.master')
@section('title','My Contents')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col mt-3">
            <h1 class="content_header">Create Events</h1>
        </div>
    </div>

    @if($errors->any())
    <div class="row">
        <div class="alert alert-danger alert-dismissible fade show m-3">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <h5><i class="icon fas fa-ban"></i> Alert!</h5>
        @foreach ($errors->all() as $err)
            <li class="">{{$err}}</li>
        @endforeach
    </div>
    </div>
    
@endif

    <div class="container">
        <form action="{{ route('organizer.uploadEvents') }}" method="POST" class="form-horizontal"
            enctype="multipart/form-data">
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
                                src="{{ asset('img/noimage.jpg') }}" onError="this.onerror=null;this.src='{{ asset("img/noimage.jpg") }}';"
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
                                            autofocus value="">
                                        <label for="name" class="form_label">Name</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form_group">
                                        <input id="location" type="text" class="form_input" name="location"
                                            placeholder=" " value="">
                                        <label for="location" class="form_label">Location</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form_group">
                                        <input id="time" type="time" class="form_input" name="time" placeholder=" "
                                            value="">
                                        <label for="time" class="form_label">Time</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form_group">
                                        <input id="date" type="date" class="form_input" name="date" placeholder=" "
                                            value="">
                                        <label for="date" class="form_label">Date</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form_group">
                                        <input id="org" type="text" class="form_input" name="org" placeholder=" "
                                            value="">
                                        <label for="org" class="form_label">Organizer</label>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form_group">
                                        <input id="contactE" type="text" class="form_input" name="contactE"
                                            placeholder="#01234567890" pattern="^01[0-9]{1}([0-9]{8}|[0-9]{7})"
                                            value="">
                                        <label for="contactE" class="form_label">Contact Number</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form">
                                        {{-- <input id="descE" type="text" class="form_input" name="descE" placeholder=" "
                                            avalue=""> --}}
                                        <textarea name="descE" class="form_input" id="descE" style="min-height: 100px"></textarea>
                                        <label for="descE" class="form_label">Description</label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col d-lg-flex justify-content-lg-end">
                                    <button name="action" value="save" class="btn btn-primary text-right border rounded" type="submit"
                                        style="margin-right: 10px;">Save As Draft</button>
                                    <button name="action" value="verify" id="verify-event" class="btn btn-success text-right border rounded"
                                        type="submit">Verify</button>
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
