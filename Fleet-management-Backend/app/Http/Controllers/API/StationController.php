<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\StationResource;
use App\Models\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{
    public function index() {
        return StationResource::collection(
            Station::all()
        );
    }
}
