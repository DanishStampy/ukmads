@extends('layouts.master')

@section('title','Pending Advertisement')
@section('content')
<div class="card mb-2" style="width:225px;height: 313px; ">
    <img class="card-img-top" src="{{asset('img/kfc.jpg')}}" alt="Dist Photo 3" style="width:225px; height:313px;">
    <button type="button" class="btn btn-info" data-toggle="modal" data-target=".bd-example-modal-xl" style="margin-top: 7px;">View More</button>

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
</div>
@endsection