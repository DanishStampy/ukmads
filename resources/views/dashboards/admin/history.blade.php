@extends('layouts.master')

@section('title','History')
@section('content')
<div class="row">
<div class="col-6 col-md-4">
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="{{asset('img/kfc.jpg')}}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">View Detail</button>
  </div>
</div>
</div>
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                    <input type="email" class="form-control" id="exampleInputEmail1"  disabled>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1"  disabled>
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

<div class="row">
<div class="col-6 col-md-4">
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="{{asset('img/kfc.jpg')}}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">Card title</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">View Detail</button>
  </div>
</div>
</div>
</div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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
                    <input type="email" class="form-control" id="exampleInputEmail1"  disabled>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1"  disabled>
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
