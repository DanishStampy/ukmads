@extends('layouts.master')

@section('title','Advertisement Details')

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
                                <label for="exampleInputEmail1">Name:</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" value="{{$details->seller_name}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Price:</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" value="RM{{$details->price}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Type:</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" value="{{$details->type}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Contact Number:</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" value="{{$details->contact}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Description:</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" value="{{$details->description}}" disabled>
                            </div>

                        </div>
                        <!-- /.card-body -->


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