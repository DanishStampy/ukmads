@extends('layouts.master')

@section('title','Event Details')

@section('content')


<!-- Default box -->
<div class="card card-solid">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3 class="d-inline-block d-sm-none">{{$details->name}} Review</h3>
                <div class="col-12">
                    <img src="{{ asset('img/'.$details->picture) }}" class="product-image" alt="Product Image" style="height:1000px">
                </div>
            </div>
            <div class="col-12 col-sm-6">
                <h3 class="my-3" style="text-align: center;">{{$details->name}}</h3>
                <hr>
                <div class="card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Location:</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" value="{{$details->location}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Time:</label>
                                <input type="" class="form-control" id="exampleInputPassword1" value="{{$details->time}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Organizer:</label>
                                <input type="" class="form-control" id="exampleInputPassword1" value="{{$details->organizer}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Contact Number:</label>
                                <input type="" class="form-control" id="exampleInputPassword1" value="{{$details->contact}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Date:</label>
                                <input type="" class="form-control" id="exampleInputPassword1" value="{{$details->date}}" disabled>
                            </div>

                        </div>
                        <!-- /.card-body -->


                    </form>
                </div>
                <h3 style="margin-top: 2rem;">Join Now!!!</h3>
                <div class="card card-primary">
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email:</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Name:</label>
                                <input type="" class="form-control" id="exampleInputPassword1" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Contact Number: </label>
                                <input type="" class="form-control" id="exampleInputPassword1" >
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary" >Submit</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.card-body -->
</div>
<!-- /.card -->


@endsection