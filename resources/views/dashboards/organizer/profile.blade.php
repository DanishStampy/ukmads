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
                            class="float-right" id="posted">{{ $event->where('status', 'verified')->count() }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Subscription status</b> <a class="float-right">
                            {{$subs->subs_status}}  
                        </a>
                    </li>
                </ul>
                <a href="#" class="btn btn-primary btn-block"><b>Reset password</b></a>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <div class="col-8">
        <div class="card card-primary card-outline mb-4">
            <div class="card-body">
                <ul class="list-group list-group-unbordered mb-3">
                    @if ($subs->quota == '')
                        <li class="list-group-item text-center mb-2">
                            <b>No quota</b>
                        </li>
                    @else
                        <li class="list-group-item">
                            <b>Total event quota</b> <a class="float-right" id="quota-total">
                                {{$subs->quota}}
                            </a>
                        </li>
                        <li class="list-group-item mb-2">
                            <b>Quota remaining</b> <a class="float-right" id="remainder">
                                0
                            </a>
                        </li>
                    @endif
                    <a href="{{route('advertiser.checkout')}}" class="btn btn-primary btn-block"><b>Add quota</b></a>
                </ul>
            </div>
        </div>

        <div class="card card-primary card-outline">
            <div class="card-body">
                <p><b>Payment history</b></p>
                <ul class="list-group list-group-unbordered mb-3">

                    @foreach ($paymentHistory as $data)
                    <li class="list-group-item border-bottom">
                        <div class="row">
                            <div class="col-md-4">
                                <p>{{$data->created_at}}</p>
                            </div>
                            <div class="col-md-8">
                                <div class="d-flex flex-row justify-content-between">
                                    <b>Payment ID:</b>
                                    <b>{{$data->payment_id}}</b>
                                </div>
                            </div>
                            <div class="col-md-4">
                            </div>
                            <div class="col-md-8">
                                <div class="d-flex flex-column">
                                    <div class="d-flex flex-row justify-content-between">
                                        <p>Quota purchased:</p>
                                        <p>{{$data->quota_count}}</p>
                                    </div>
                                    <div class="d-flex flex-row justify-content-between">
                                        <p>Amount:</p>
                                        <p>RM{{$data->amount}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function (){
        
        var $remainingQuota = parseInt($("#quota-total").text()) - parseInt($("#posted").text());

        $("#remainder").text($remainingQuota);
    })
</script>

@endsection
