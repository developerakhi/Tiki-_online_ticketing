@extends('layouts.app')

@section('nav')
    @include('components.nav')
@endsection

@section('content')
    <div class="mb-5">
        <h2 class="text-center">Search Your Buss</h2>
        @include('components.aleart')
    </div>
    <div class="container p-0">
        <div class="w-75 mx-auto">
            <form action="{{ route('user.searchBuss') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="from">From</label>
                    <select class="form-select" aria-label="Default select example" name="from" {{ old('from') }}>
                        <option value="enter_city" selected>Enter City</option>
                        @foreach ($starting_points as $start)
                            <option value="{{ $start->starting_point }}">{{ $start->starting_point }} </option>
                        @endforeach


                    </select>
                    @error('from')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="to">To</label>
                    <select class="form-select" aria-label="Default select example" name="to" {{ old('to') }}>
                        <option value="enter_city" selected>Enter City</option>
                        @foreach ($ending_points as $end)
                            <option value="{{ $end->ending_point }}">{{ $end->ending_point }} </option>
                        @endforeach


                    </select>
                    @error('to')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="mb-1" for="date">Date of Journey</label><br>
                    <input class="w-100 p-1" type="date" name="date_item" id="date">
                    @error('date')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Search Buss</button>

            </form>
        </div>
    </div>
@endsection
