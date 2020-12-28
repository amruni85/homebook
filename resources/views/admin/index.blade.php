@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if(session()->has('alert'))
            <div class="alert {{ session()->get('alert-type')}}">
                {{ session()->get('alert') }}
            </div>
            @endif
            <div class="card">
                <div class="card-header">
                    {{ __('Booking Lists') }}                
                </div>

                <div class="card-body">
                    <table class="table table-hover table-responsive">
                    <thead>
                    <tr>
                    <!-- <th>ID</th> -->
                    <th>Booking Date</th>
                    <th>From - To</th>
                    <th>Booked by</th>
                    <th>Booked for</th>
                    <th>Notes</th>
                    <th>Actions</th>
                    <tr>
                    </thead>
                    <tbody>
                    @foreach($homebooks as $homebook)
                    <tr>
                    <!-- <td>{{$homebook->id}}</td> -->
                    <td>{{$homebook->created_at}}</td>
                    <td>{{$homebook->checkin}} - {{$homebook->checkout}}</td>
                    <td>{{$homebook->user->name}}<br>{{$homebook->user->email}}</td>
                    <td>Adult: {{$homebook->adult}}<br>Child: {{$homebook->child ? : '0'}}<br>Infant: {{$homebook->infant ? : '0'}}</td>
                    <td width="200">{{$homebook->notes ? : 'None'}}</td>
                    <td>
                    <a href="{{route('admin:show', $homebook)}}" class="btn btn-secondary">View</a>
                    <a onclick="return confirm('Are you sure to delete the booking?')" href="{{route('admin:delete', $homebook)}}" class="btn btn-danger">Delete</a>
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
