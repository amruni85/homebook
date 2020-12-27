@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                <div class="card-header">{{ __('Homestay Book') }}</div>

                <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                @csrf <!--nak elakkan 419 Page Expired -->
                <div class="row form-group">
                    <div class="form-group">
                        <label>Checkin Date :</label>
                        <input type="text" name="checkin" class="form-control"  required class="@error('checkin') is-invalid @enderror" value="{{ old('checkin') }}">
                        @error('checkin')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>&nbsp;&nbsp;
                    <div class="form-group">
                        <label>Checkout Date :</label>
                        <input type="text" name="checkout" class="form-control" required class="@error('checkout') is-invalid @enderror" value="{{ old('checkout') }}">
                        @error('checkout')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="row form-group">              
                    <div class="form-group">
                        <label>Adult :</label><br>
                        <select id="adult" name="adult">
                            <option value="">---Please choose---</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                        <!-- <input type="text" name="adult" class="form-control"> -->
                    </div>&nbsp;&nbsp;
                    <div class="form-group">
                        <label>Child :</label><br>
                        <select id="child" name="child">
                            <option value="">---Please choose---</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                        <!-- <input type="text" name="child" class="form-control"> -->
                    </div>&nbsp;&nbsp;
                    <div class="form-group">
                        <label>Infant :</label><br>
                        <select id="infant" name="infant">
                            <option value="">---Please choose---</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                        <!-- <input type="text" name="infant" class="form-control"> -->
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
                        <textarea name="notes" class="form-control"></textarea>
                    </div>
                
                    <!-- <div class="row form-group">
                        <label>I hereby confirm all the information above are TRUE.</label>
                    </div> -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Confirm Booking!</button>
                    </div>
                </form>   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

