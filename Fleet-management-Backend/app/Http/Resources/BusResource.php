<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class BusResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'src_name' => $this->src_name,
            'dest_name' => $this->dest_name,
            'seat_1' => $this->seat_1,
            'seat_2' => $this->seat_2,
            'seat_3' => $this->seat_3,
            'seat_4' => $this->seat_4,
            'seat_5' => $this->seat_5,
            'seat_6' => $this->seat_6,
            'seat_7' => $this->seat_7,
            'seat_8' => $this->seat_8,
            'seat_9' => $this->seat_9,
            'seat_10' => $this->seat_10,
            'seat_11' => $this->seat_11,
            'seat_12' => $this->seat_12,
            'availability' => $this->availability
        ];
    }
}
