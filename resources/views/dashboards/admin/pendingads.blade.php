@extends('layouts.master')

@section('title','Pending ')
@section('content')
<div class="row">
  <div class="col-6 col-md-4">
    <h1>Advertisement</h1>
    <div class="card" style="width: 18rem;">
      <img class="card-img-top" src="{{asset('img/kfc.jpg')}}" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-xl">View Detail</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade bd-example-modal-xl .col-12 .col-md-8" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="row">
                <div class="col-md-4 m-2">
                    <img class="card-img-top" src="{{asset('img/kfc.jpg')}}" alt="Dist Photo 3" style="width:400px; height:650px;">
                </div>
                <div class="col-md-6 col-xs-6">
                    <div class="details" style="margin-left:20px; margin-top:5px;">
                        <h3>Details</h3>
                    </div>
                    <div class="card border-dark mb-3" style="max-width: 100rem; margin-left:20px;margin-top:10px;">
                        <div class="card-header">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body text-dark">
                            <p class="card-text">Location: </p>
                            <p class="card-text">Time </p>
                            <p class="card-text">Organizer: </p>
                            <p class="card-text">Contact No: </p>
                            <p class="card-text">Date: </p>
                        </div>
                    </div>
                    <button type="button" class="btn btn-success" style="margin-left:20px; margin-top:5px;">Approve</button>
                    <button type="button" class="btn btn-danger" style="margin-left:20px; margin-top:5px;">Reject</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-6 col-md-4">
    <h1>Event</h1>
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
            <div class="row">
                <div class="col-md-4 m-2">
                    <img class="card-img-top" src="{{asset('img/kfc.jpg')}}" alt="Dist Photo 3" style="width:400px; height:650px;">
                </div>
                <div class="col-md-6 col-xs-6">
                    <div class="details" style="margin-left:20px; margin-top:5px;">
                        <h3>Details</h3>
                    </div>
                    <div class="card border-dark mb-3" style="max-width: 100rem; margin-left:20px;margin-top:10px;">
                        <div class="card-header">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body text-dark">
                            <p class="card-text">Location: </p>
                            <p class="card-text">Time </p>
                            <p class="card-text">Organizer: </p>
                            <p class="card-text">Contact No: </p>
                            <p class="card-text">Date: </p>
                        </div>
                    </div>
                    <button type="button" class="btn btn-success" style="margin-left:20px; margin-top:5px;">Approve</button>
                    <button type="button" class="btn btn-danger" style="margin-left:20px; margin-top:5px;">Reject</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection