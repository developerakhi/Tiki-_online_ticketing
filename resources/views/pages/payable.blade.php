@extends('layouts.app')
@section('nav')
    @include('components.navigation')
@endsection


@section('content')
    <div class="invoice_content">
        <div class="mb-2 d-flex justify-content-between align-items-center">
            <h2 class="">My Trip</h2>
        </div>

        <div class="d-flex justify-content-between align-items-center">

            <div class="mb-4 d-flex align-items-center">
                {{-- icon  --}}
                <span class="buss-icon">
                    <i class="fa-solid fa-bus"></i>
                </span>
                {{-- dhaka to cox's bazar  --}}
               
                    <strong class="ms-2 mt-2">{{ request('from') }} - {{ request('to') }} <br>
                        <span>Fare : {{ $myTrip->trip->fare }} Tk.</span>
                    </strong>
                    
               
            </div>
            <a class="btn btn-primary"
                href="{{ route('user.pages.show', ['from' => request('from'), 'to' => request('to')]) }}">Back</a>

        </div>
    </div>

    @include('components.aleart')

    <div class="mx-auto w-50 text-center">
        <form action="{{ route('user.pay') }}" method="POST">
            @csrf
            <input type="hidden" name="buss_name" value="{{ $myTrip->trip->buss_name }}">
            <input type="hidden" name="start" value="{{ $myTrip->starting_point }}">
            <input type="hidden" name="end" value="{{ $myTrip->ending_point }}">
            <input type="hidden" name="date" value="{{ $myTrip->date }}">
            <input type="hidden" name="dpt_time" value="{{ $myTrip->Dpt_time->format('h:i A') }}">
            <input type="hidden" name="arr_time" value="{{ $myTrip->Arr_time->format('h:i A') }} ">
            <input type="hidden" name="fare" value="{{ $myTrip->trip->fare }}">
            <input type="hidden" name="seats" value="{{ rand(1, $myTrip->trip->available_seats) }}">
            <div>
                <label for="pay"><strong>Pay ({{ $myTrip->trip->fare }}Tk.)</strong></label>
                <input id="pay" placeholder="Enter amount" name="pay" type="number">
                <input class="btn btn-primary" type="submit" value="Submit">
            </div>
        </form>
    </div>
@endsection
