@extends('layouts.master')
@section('title','My Contents')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h1>Create Advertisement</h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body" style="height: 500px;">
                            <div style="background-image: url({{asset('img/white.jpg')}});" class="row">
                                <button class="btn btn-secondary d-lg-flex align-items-lg-center vertical-center" type="button" >+</button>
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
            <div class="row">
                <div class="col-md-6 text-center">
                    <div class="form-check"><button class="btn btn-primary text-right border rounded" type="button">Advertisement</button></div>
                </div>
                <div class="col-md-6 text-center">
                    <div class="form-check"><button class="btn btn-primary text-right border rounded" type="button">Event</button></div>
                </div>
            </div>     
            <hr>
            <br>
            <form action="" method="post" class="form-horizontal" enctype="">
            <div class="row">
                <div class="col">
                    <div class="form_group">
						<input id="login" type="text" class="form_input" name="login" placeholder=" "  autofocus value="" required>
						<label for="login" class="form_label">Name</label>
						<!-- <span class="text-danger">@error('login'){{ $message }}@enderror</span> -->
					</div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="form_group">
						<input id="login" type="text" class="form_input" name="login" placeholder=" "  autofocus value="" required>
						<label for="login" class="form_label">Product Type</label>
						<!-- <span class="text-danger">@error('login'){{ $message }}@enderror</span> -->
					</div>
                </div>
                <div class="col">
                    <div class="form_group">
						<input id="login" type="text" class="form_input" name="login" placeholder=" "  autofocus value="" required>
						<label for="login" class="form_label">Price</label>
						<!-- <span class="text-danger">@error('login'){{ $message }}@enderror</span> -->
					</div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <div class="form_group">
						<input id="login" type="text" class="form_input" name="login" placeholder=" "  autofocus value="" required>
						<label for="login" class="form_label">Seller Name</label>
						<!-- <span class="text-danger">@error('login'){{ $message }}@enderror</span> -->
					</div>
                </div>
                <div class="col">
                    <div class="form_group">
						<input id="login" type="text" class="form_input" name="login" placeholder=" "  autofocus value="" required>
						<label for="login" class="form_label">Contact No.</label>
						<!-- <span class="text-danger">@error('login'){{ $message }}@enderror</span> -->
					</div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <div class="form_group">
						<input id="login" type="text" class="form_input" name="login" placeholder=" "  autofocus value="" required>
						<label for="login" class="form_label">Description</label>
						<!-- <span class="text-danger">@error('login'){{ $message }}@enderror</span> -->
					</div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col d-lg-flex justify-content-lg-end">
                    <button class="btn btn-primary text-right border rounded" type="button" style="margin-right: 10px;" disabled>Save As Draft</button>
                    <button class="btn btn-primary text-right border rounded" type="submit" >Verify</button>
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

