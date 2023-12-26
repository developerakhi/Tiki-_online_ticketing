<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TripController extends Controller
{
    public function index(Request $request)
    {
        $starting_points = Location::select('starting_point')->get();
        $ending_points = Location::select('ending_point')->get();
        return view('pages.index', compact('starting_points', 'ending_points'));
    }
    public function create()
    {
        return view('pages.create_trip');
    }

    public function mytrip()
    {
        return view('pages.my_trip');
    }


    public function searchBuss(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $date = $request->date_item;

        if ($from == 'enter_city' || $to == 'enter_city') {
            return redirect()->back()->with('failed', 'Enter your city');
        }
        if ($date == null) {
            return redirect()->back()->with('failed', 'Enter your date for journey');
        }
         
        $foundFrom = Location::select('starting_point')->where('starting_point',$from)->first();
        $foundTo = Location::select('ending_point')->where('ending_point',$to)->first();

        $found = Location::select('date')->where('date', $date)->first();

        if ($found) {
            $trips = Location::with('trip')->get();
            // return $trips;
            $count = 1;
            return view('pages.show',compact('trips','count','from','to'));

        } else {
            return redirect()->back()->with('failed', 'No bus found in destination route');
        }

    }


    public function show(Request $request){
        $from = $request->from;
        $to = $request->to;
        $date = $request->date_item;
        $trips = Location::with('trip')->get();
        $count = 1;
        return view('pages.show',compact('trips','count','from','to'));

    }

}
