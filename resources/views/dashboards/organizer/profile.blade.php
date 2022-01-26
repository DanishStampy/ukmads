@extends('layouts.master')
@section('title', 'Profile')
@section('content')
<div class="row">

    @if(Session::has('success_payment'))
        <div class="col-12">
            <div class="alert alert-success alert-dismissible fade show my-3">
                {{ Session::get('success_payment') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif

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
                <a href="#" class="btn btn-block shadow-none"><b>Reset password</b></a>
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
                                {{ $subs->quota - $event->count() }}
                            </a>
                        </li>
                    @endif
                    <a href="" type="button" data-toggle="modal" data-target="#quotaModal"
                        class="btn btn-block shadow-none"><b>Add quota</b></a>
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

<!-- Modal -->
<div class="modal fade" id="quotaModal" tabindex="-1" aria-labelledby="quotaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="quotaModalLabel">Select quota</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('organizer.checkout') }}" method="GET"
                enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form_group">
                        <input id="quota" type="number" class="form_input is-invalid control-label quota-input"
                            name="quota" placeholder=" " autofocus value="4" required min="4" max="400">
                        <label for="quota" class="form_label">Event Quota</label>
                    </div>
                    <small>*Minimum event quota is 4. Maximum quota is 400.</small>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger shadow-none" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary shadow-none">Go to checkout</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script type="text/javascript">
    $(function (){
        
        // var $remainingQuota = parseInt($("#quota-total").text()) - parseInt($("#posted").text());

        // $("#remainder").text($remainingQuota);
    })
</script>

@endsection
