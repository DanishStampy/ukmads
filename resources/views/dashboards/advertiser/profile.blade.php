@extends('layouts.master')
@section('title', 'Profile')
@section('content')
<div class="row">
    <div class="col-4">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                        src="{{ asset('img/AvatarMaker.png') }}" alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ ucfirst(Auth::user()->name) }}</h3>

                <p class="text-muted text-center">{{ ucfirst(Auth::user()->role) }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Email</b> <a class="float-right">{{ Auth::user()->email }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Posted</b> <a
                            class="float-right">{{ $ads->where('status', 'verified')->count() }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Subscription status</b> <a class="float-right">None</a>
                    </li>
                </ul>
                <a href="#" class="btn btn-primary btn-block"><b>Reset password</b></a>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="col-8">
        <div class="card card-primary card-outline">
            <div class="card-body">
                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Total advertisement quota</b> <a class="float-right">10</a>
                    </li>
                    <li class="list-group-item">
                        <b>Quota remaining</b> <a class="float-right">3</a>
                    </li>
                    <a href="{{route('advertiser.checkout')}}" class="btn btn-primary btn-block"><b>Add quota</b></a>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
