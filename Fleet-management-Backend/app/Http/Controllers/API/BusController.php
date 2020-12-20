<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\BusResource;
use App\Models\Bus;

class BusController extends Controller
{
    public function index() {
        return BusResource::collection(
            Bus::all()
        );
    }
}
