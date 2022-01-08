@extends('layouts.master')
@section('title','Edit Event')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col mt-3">
            <h1 class="content_header">Update {{ $event->id_event }}</h1>
        </div>
    </div>
    @if($event->status == 'rejected' or $event->reason != null)

    <div class="accordion mx-3 " id="accordionReasons">
        <div class="card">
        <div class="card-header bg-teal p-3" id="reason">
          <h2 class="mb-0">
            <button class="btn bg-teal text-left" type="button" data-toggle="collapse" data-target="#eventReason" aria-expanded="false" aria-controls="eventReason">
              Reject's reason
            </button>
          </h2>
        </div>
    
        <div id="eventReason" class="collapse show" aria-labelledby="reason" data-parent="#accordionReasons">
          <div class="card-body  p-3">
            @if($event->reason == null)
                There's no reason. Maybe there is some mistake, please update again so we can verify.
            @else
            {{$event->reason}}
            @endif
          </div>
        </div>
      </div>
    </div>
    
    
    @endif
    <br>

    <div class="container">
        <form action="{{ route('organizer.updateEvent', $event->id_event) }}" method="POST"
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
                                src="/img/{{ $event->picture }}" onError="this.onerror=null;this.src='{{ asset("img/noimage.jpg") }}';" name="imageSave"
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
                                            autofocus value="{{ $event->name }}">
                                        <label for="name" class="form_label">Name</label>
                                        <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form_group">
                                        <input id="location" type="text" class="form_input" name="location"
                                            placeholder=" " value="{{ $event->location }}">
                                        <label for="location" class="form_label">Location</label>
                                        <span class="text-danger">@error('location'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form_group">
                                        <input id="time" type="time" class="form_input" name="time" placeholder=" "
                                            value="{{ $event->time }}">
                                        <label for="time" class="form_label">Time</label>
                                        <span class="text-danger">@error('time'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form_group">
                                        <input id="date" type="date" class="form_input" name="date" placeholder=" "
                                            value="{{ $event->date }}">
                                        <label for="date" class="form_label">Date</label>
                                        <span class="text-danger">@error('date'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form_group">
                                        <input id="org" type="text" class="form_input" name="org" placeholder=" "
                                            value="{{ $event->organizer }}">
                                        <label for="org" class="form_label">Organizer</label>
                                        <span class="text-danger">@error('org'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form_group">
                                        <input id="contactE" type="text" class="form_input" name="contactE"
                                            placeholder="#01234567890" pattern="^01[0-9]{1}([0-9]{8}|[0-9]{7})"
                                            value="{{ $event->contact }}">
                                        <label for="contactE" class="form_label">Contact Number</label>
                                        <span class="text-danger">@error('contactE'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form_group">
                                        <input id="descE" type="text" class="form_input" name="descE" placeholder=" "
                                            value="{{ $event->description }}">
                                        <label for="descE" class="form_label">Description</label>
                                        <span class="text-danger">@error('descE'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col d-lg-flex justify-content-lg-end">

                                    @if($event->status == 'draft')
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