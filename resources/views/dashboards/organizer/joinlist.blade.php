@extends('layouts.master')

@section('title', 'List of participant')
@section('content')

@if(Session::has('export_success'))
    <div class="alert alert-success alert-dismissible fade show my-3">
        {{ Session::get('export_success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $event->name }}'s participant</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact No.</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->guest_name }}</td>
                                <td>{{ $item->guest_email }}</td>
                                <td>{{ $item->guest_contact }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<div class="row text-right p-3 ">
    <form method="GET" action="{{ route('organizer.listexport') }}" enctype="multipart/form-data">
      @csrf
        <input type="hidden" value="{{ $event->id_event }}" name="id_event">
        <button type="submit" class="btn btn-info btn-block btn-flat rounded"><i class="far fa-file-excel mr-2"></i>
            Export to excel</button>
    </form>

</div>
@endsection
