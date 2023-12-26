<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Trip;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function payable(Request $request)
    {
        $id = $request->query('id');
        $from = $request->query('from');
        $to = $request->query('to');
        $myTrip = Location::find($id);
        return view('pages.payable', compact('myTrip', 'from', 'to'));
    }


    public function pay(Request $request)
    {
        // dd($request->all());
        $fare = $request->fare;
        $pay = $request->pay;
        $buss_name = $request->buss_name;
        $startingPoint =  $request->start;
        $endingPoint = $request->end;
        $date = $request->date;
        $dpt_time = $request->dpt_time;
        $arr_time = $request->arr_time;
        $seats = $request->seats;


        if ($pay > $fare) {
            return redirect()->back()->with('failed', 'Your amount is greater than fare');
        } else if ($pay < $fare) {
            return redirect()->back()->with('failed', 'Your amount is less than fare');

        } else {
           return view('pages.my_trip', compact('fare','pay','buss_name','startingPoint','endingPoint','date','dpt_time','arr_time','seats'));
        }

    }
}
