<?php

namespace App\Http\Controllers\API;
use App\Http\Requests\TripRequest;
use App\Models\Trip;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function create(TripRequest $request) {
        $trip = Trip::create([
            'user_id' => $request->user_id,
            'bus_id' => $request->bus_id,
            'seat_number' => $request->seat_number
        ]);

        return response()->json([
            'success' => true,
            'message' => 'trip created successfully',
            'trip' => $trip
        ]);
    }
}
