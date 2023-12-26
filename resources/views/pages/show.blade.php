@extends('layouts.app')

@section('nav')
    @include('components.navigation')
@endsection

@section('content')
    <div class="mb-2 d-flex justify-content-between align-items-center">
        <h2 class="">Available Trips</h2>
    </div>

    <div class="d-flex justify-content-between align-items-center">

        <div class="mb-4 d-flex align-items-center">
            {{-- icon  --}}
            <span class="buss-icon">
                <i class="fa-solid fa-bus"></i>
            </span>
            {{-- dhaka to cox's bazar  --}}
            <strong class="ms-2">{{ $from }} - {{ $to }}</strong>
        </div>
        <a class="btn btn-primary" href="{{ route('user.pages.index') }}">Back</a>
    </div>

    <div class="container p-0">
        <table class="table">
            <thead>
                <tr>

                    <th scope="col">SI</th>
                    <th scope="col">Buss Name</th>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                    <th scope="col">Dpt.Time</th>
                    <th scope="col">Arr.Time</th>
                    <th scope="col">Date</th>
                    <th scope="col">Seats Available</th>
                    <th scope="col">Fare</th>
                    <th scope="col">Action</th>


                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($trips as $trip)
                    <tr>

                        <th scope="row">{{ $count++ }}</th>
                        <td>{{ $trip->trip->buss_name }}</td>
                        <td>{{ $trip->starting_point }}</td>
                        <td>{{ $trip->ending_point }}</td>
                        <td>{{ $trip->Dpt_time->format('h:i A') }} </td>
                        <td>{{ $trip->Arr_time->format('h:i A') }}</td>
                        <td>{{ $trip->date }}</td>
                        <td class="ps-4">{{ $trip->trip->available_seats }}</td>
                        <td>{{ $trip->trip->fare }}</td>
                        {{-- <td><a class="btn btn-success" href="{{ route('user.pages.invoice',['id'=>$trip->id,'from'=>$from,'to'=>$to]) }}">Buy</a></td> --}}
                        <td>
                            <form action="{{ route('user.pages.payable') }}" method="GET">
                                <input type="hidden" name="id" value="{{ $trip->id }}">
                                <input type="hidden" name="from" value="{{ $from }}">
                                <input type="hidden" name="to" value="{{ $to }}">
                                <button type="submit" class="btn btn-success">Buy</button>
                            </form>
                        </td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
