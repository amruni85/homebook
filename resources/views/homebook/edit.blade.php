@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Edit My Booking') }}</div>

                <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                @csrf <!--nak elakkan 419 Page Expired -->
                <div class="row form-group">
                    <div class="form-group">
                        <label>Checkin Date :</label>
                        <input type="text" name="checkin" class="form-control"  required value="{{$homebook->checkin}}" readonly>
                    </div>&nbsp;&nbsp;
                    <div class="form-group">
                        <label>Checkout Date :</label>
                        <input type="text" name="checkout" class="form-control" required value="{{$homebook->checkin}}" readonly>
                    </div>
                </div>
                <div class="row form-group">              
                    <div class="form-group">
                        <label>Adult :</label><br>
                        <input type="text" name="adult" class="form-control" value="{{$homebook->adult}}" readonly>
                    </div>&nbsp;&nbsp;
                    <div class="form-group">
                        <label>Child :</label><br>
                        <input type="text" name="child" class="form-control" value="{{$homebook->child}}" readonly>
                    </div>&nbsp;&nbsp;
                    <div class="form-group">
                        <label>Infant :</label><br>
                        <input type="text" name="infant" class="form-control" value="{{$homebook->infant}}" readonly>
                    </div>
                </div>
                    <div class="row form-group">
                        <label>Attachment :</label>
                        <input type="file" name="attachment" class="form-control" class="@error('attachment') is-invalid @enderror">
                        @error('attachment')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="row form-group">
                        <label>Notes :</label>
                        <textarea name="notes" class="form-control">{{$homebook->notes}}</textarea>
                    </div>
                
                    <!-- <div class="row form-group">
                        <label>I hereby confirm all the information above are TRUE.</label>
                    </div> -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update My Booking!</button>
                    </div>
                </form>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

