@extends('layouts.app')

@section('nav')
    @include('components.navigation')
@endsection


@section('content')
    <div class="mb-5 d-flex justify-content-between align-items-center">
        <h2 class="">My Trip</h2>
        <a class="btn btn-primary" href="#">Back</a>
    </div>
    @include('components.aleart')
    <div class="card p-5 m-5">
        {{-- <form action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Trim Name</label>
                <input type="text" class="form-control" name="trim_name" id="name" aria-describedby="emailHelp"
                    {{ old('name') }} placeholder="Bus/Trip Name">
                @error('name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-3">
                <label for="from" class="form-label">From</label>
                <input type="text" class="form-control" name="from" id="from" aria-describedby="emailHelp">
                @error('from')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="to" class="form-label">To</label>
                <input type="text" class="form-control" id="to" name="to" {{ old('to') }}>
                @error('to')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" {{ old('date') }}>
            </div>

            <button type="submit" class="btn btn-primary">Create</button>
        </form> --}}
        <div class="myInvoice">
            <h3 class="text-center">My Invoice</h3>
            <div class="card w-50 mx-auto my-3 p-3">
                <div class="row row-cols-1 row-cols-lg-2">
                    <!-- First Column -->
                    <div class="col">
                        <h5>Buss Name : </h5>
                        <h5>From : </h5>
                        <h5>To : </h5>
                        <h5>Date : </h5>
                        <h5>Dpt.Time : </h5>
                        <h5>Arr.Time : </h5>
                        <h5>Fare : </h5>
                        <h5>Your Seat Number : </h5>
                    </div>
            
                    <!-- Second Column -->
                    <div class="col">
                        <h5>{{ $buss_name }}</h5>
                        <h5>{{ $startingPoint }}</h5>
                        <h5>{{ $endingPoint }} </h5>
                        <h5>{{ $date }}</h5>
                        <h5>{{ $dpt_time }}</h5>
                        <h5>{{ $arr_time }}</h5>
                        <h5>{{ $fare }}</h5>
                        <h5>{{ rand(1,$seats) }}</h5>
                    </div>
                </div>
            </div>
            
        </div>

    </div>
@endsection
