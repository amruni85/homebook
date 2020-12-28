@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-14">
            @if(session()->has('alert'))
            <div class="alert {{ session()->get('alert-type')}}">
                {{ session()->get('alert') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    {{ __('My Bookings') }} &nbsp;&nbsp; <a href="{{route('homebook:create')}}" class="btn btn-primary">Add New Booking</a>                
                </div>

                <div class="card-body">
                    <table class="table table-hover table-responsive">
                    <thead>
                    <tr>
                    <th>ID</th>
                    <th>Booking Date</th>
                    <th>From - To</th>
                    <th>Notes</th>
                    <th>Booked at</th>
                    <th>&nbsp;</th>
                    <tr>
                    </thead>
                    <tbody>
                    @foreach($homebooks as $homebook)
                    <tr>
                    <td>{{$homebook->id}}</td>
                    <td>{{$homebook->created_at}}</td>
                    <td>{{$homebook->checkin}} - {{$homebook->checkout}}</td>
                    <td>{{$homebook->notes ? : '-'}}</td>
                    <td>{{$homebook->created_at->diffForHumans()}}</td>
                    <td>
                    <a href="{{route('homebook:show', $homebook)}}" class="btn btn-secondary">View</a>
                    <a href="{{route('homebook:edit', $homebook)}}" class="btn btn-success">Edit</a>
                    <a onclick="return confirm('Are you sure to cancel the booking?')" href="{{route('homebook:delete', $homebook)}}" class="btn btn-danger">Cancel</a>
                    </td>
                    </tr>
                    @endforeach
                    </tbody>
                    </table>
                    {{ $homebooks->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
