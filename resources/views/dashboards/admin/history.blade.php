@extends('layouts.master')

@section('title','History')
@section('content')
<div class="row">
    <div class="col-6 col-md-4">
        <h3>Advertisement</h3>

        {{ count($advertisements) < 1 ? "No data to be displayed." : '' }}
        @foreach($advertisements as $advertisement)
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{ asset($advertisement->picture) }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $advertisement->name }}</h5>
                    <p class="card-text">{{ $advertisement->description }}</p>
                    <button type="button" class="btn btn-primary" data-toggle="modal"
                        data-target=".bd-example-modal-lg">View Detail</button>
                </div>
            </div>
        @endforeach
    </div>
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="row justify-content-around align-self-center">
                <div class="card w-50" style="margin-top: 30px">
                        <img class="img-fluid" src="{{ asset('img/kfc.jpg') }}" alt="Dist Photo 3" style="margin: 10px">
                </div>
                <div class="col-md-10 col-xs-6">
                    <h3 class="modal-title text-center">Details</h3>
                    <div class="col-md-12">
                        <div class="modal-body">
                            <div class="card card-primary">
                                <form>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" value="{{ $advertisement->name }}"
                                                disabled>
                                        </div>

                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input type="text" class="form-control"
                                                value="{{ $advertisement->email }}" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label>Type</label>
                                            <input type="text" class="form-control" value="{{ $advertisement->type }}"
                                                disabled>
                                        </div>

                                        <div class="form-group">
                                            <label>Price</label>
                                            <input type="text" class="form-control"
                                                value="{{ $advertisement->price }}" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label>Seller Name</label>
                                            <input type="text" class="form-control"
                                                value="{{ $advertisement->seller_name }}" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label>Contact no</label>
                                            <input type="text" class="form-control"
                                                value="{{ $advertisement->contact }}" disabled>
                                        </div>

                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea type="text" class="form-control" style="resize: none"
                                                disabled>{{ $advertisement->description }}</textarea>
                                        </div>

                                        <div class="form-group">
                                            <label>Status</label>
                                            <input type="text" class="form-control"
                                                value="{{ $advertisement->status }}" disabled>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6 col-md-4">
        <h3>Event</h3>
        <div class="card" style="width: 18rem;">
            <img class="card-img-top" src="{{ asset('img/kfc.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the
                    card's content.</p>
                <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target=".bd-example-modal-lg">View Detail</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" disabled>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" disabled>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Contact Number</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" disabled>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Location</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" disabled>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputPassword1">Organizer</label>
                                <input type="password" class="form-control" id="exampleInputPassword1" disabled>
                            </div>

                            <div class="-group">
                                <label for="exampleInputPassword1">Date and Time Picker</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                                    <input type="text" class="form-control float-right" id="reservationtime" disabled>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <div class="alert alert-success" role="alert">
                                    Approved
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
