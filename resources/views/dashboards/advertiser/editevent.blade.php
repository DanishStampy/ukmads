@extends('layouts.master')
@section('title','Edit Event')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h1>Update {{$event->id_event}}</h1>
        </div>
    </div>
    <div class="container">
        <form action="{{ route('advertiser.updateEvent', $event->id_event) }}" method="POST" class="form-horizontal"
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
                                        id="inputImage" /></button>

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
                            @if( Session::get('success'))
                                <div class="alert alert-success">
                                    {{ Session::get('success') }}
                                </div>
                            @endif
                            @if( Session::get('error'))
                                <div class="alert alert-danger">
                                    {{ Session::get('error') }}
                                </div>
                            @endif

                            <div class="row">
                                <div class="col">
                                    <div class="form_group">
                                        <input id="name" type="text" class="form_input" name="name" placeholder=" "
                                            autofocus value="{{$event->name}}">
                                        <label for="name" class="form_label">Name</label>
                                        <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form_group">
                                        <input id="location" type="text" class="form_input" name="location"
                                            placeholder=" " value="{{$event->location}}">
                                        <label for="location" class="form_label">Location</label>
                                        <span class="text-danger">@error('location'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form_group">
                                        <input id="time" type="time" class="form_input" name="time" placeholder=" "
                                            value="{{$event->time}}">
                                        <label for="time" class="form_label">Time</label>
                                        <span class="text-danger">@error('time'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form_group">
                                        <input id="date" type="date" class="form_input" name="date" placeholder=" "
                                            value="{{$event->date}}">
                                        <label for="date" class="form_label">Date</label>
                                        <span class="text-danger">@error('date'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="form_group">
                                        <input id="org" type="text" class="form_input" name="org" placeholder=" "
                                            value="{{$event->organizer}}">
                                        <label for="org" class="form_label">Organizer</label>
                                        <span class="text-danger">@error('org'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form_group">
                                        <input id="contactE" type="text" class="form_input" name="contactE"
                                            placeholder="#601234567890" pattern="^601[0-9]{1}([0-9]{8}|[0-9]{7})"
                                            value="{{$event->contact}}">
                                        <label for="contactE" class="form_label">Contact Number</label>
                                        <span class="text-danger">@error('contactE'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <div class="form_group">
                                        <input id="descE" type="text" class="form_input" name="descE" placeholder=" " value="{{$event->description}}">
                                        <label for="descE" class="form_label">Description</label>
                                        <span class="text-danger">@error('descE'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col d-lg-flex justify-content-lg-end">
                                  <button class="btn btn-success text-right border rounded"
                                  type="submit">Update</button>
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