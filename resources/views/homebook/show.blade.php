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
                <div class="card-header">{{ __('My Booking') }}</div>

                <div class="card-body">
                <div class="row form-group">
                    <div class="form-group">
                        <label>Checkin Date :</label>
                        <input type="text" name="checkin" class="form-control" value="{{ $homebook->checkin }}" readonly>
                    </div>&nbsp;&nbsp;
                    <div class="form-group">
                        <label>Checkout Date :</label>
                        <input type="text" name="checkout" class="form-control" value="{{ $homebook->checkout }}" readonly>
                    </div>
                </div>
                <div class="row form-group">              
                    <div class="form-group">
                        <label>Adult :</label><br>
                        <input type="text" name="adult" class="form-control" value="{{ $homebook->adult ? : '0' }}" readonly>
                    </div>&nbsp;&nbsp;
                    <div class="form-group">
                        <label>Child :</label><br>
                        <input type="text" name="child" class="form-control" value="{{ $homebook->child ? : '0' }}" readonly>
                    </div>&nbsp;&nbsp;
                    <div class="form-group">
                        <label>Infant :</label><br>
                        <input type="text" name="infant" class="form-control" value="{{ $homebook->infant ? : '0' }}" readonly>
                    </div>
                </div>
                    
                    <div class="row form-group">
                        <label>Notes :</label>
                        <textarea name="notes" class="form-control" readonly>{{ $homebook->notes ? : "None" }}</textarea>
                    </div>
                </form>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

