<?php

namespace App\Http\Controllers\API;
use App\Http\Requests\TripRequest;
use App\Models\Trip;
use App\Models\Bus;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function create(TripRequest $request) {

        /*Checking if the bus has available seats*/
        $availability = Bus::select('availability')->where('id', $request->bus_id)->get()->first()->availability;
        if($availability) {
            $trip = Trip::create([
                'user_id' => $request->user_id,
                'bus_id' => $request->bus_id,
                'seat_number' => $request->seat_number
            ]);

            /*decrementing seats number when booking a seat*/
            DB::table('buses')->decrement('seats_number', 1);

            /*checking if there are still available seats in the bus*/
            $seats_number = Bus::select('seats_number')->where('id', $request->bus_id)->get()->first()->seats_number;
            if($seats_number == 0) {
                $bus = Bus::find($request->bus_id);
                $bus->availability = false;
                $bus->save();
            }

            /*concatinating string seat_ and seat number entered by user because column name in db is seat_number*/
            $seat = array("seat_", strval($request->seat_number));
            $unavailable_seat_number = implode("", $seat);

            /*setting booked seat to unavailable*/
            $bus = Bus::find($request->bus_id);
            $bus->$unavailable_seat_number = false;
            $bus->save();

            return response()->json([
                'success' => true,
                'message' => 'trip created successfully',
                'trip' => $trip
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, no seats available in this bus'
            ]);
        }
    }
}
