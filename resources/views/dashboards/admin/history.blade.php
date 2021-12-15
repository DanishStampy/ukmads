@extends('layouts.master')

@section('title','History')
@section('content')
<div class="card mb-2" style="width:225px;height: 313px; ">
    <img class="card-img-top" src="{{asset('img/kfc.jpg')}}" alt="Dist Photo 3" style="width:225px; height:313px;">
    <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-lg" style="margin-top: 7px;">View More</button>
                  
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