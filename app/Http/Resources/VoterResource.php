<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VoterResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'            =>  $this->id,
            'device_imei'   =>  $this->device_imei,
            'image'         =>  $this->image,
            'area'          =>  $this->whenLoaded('area', function() {
                return $this->area;
            }),
        ];
    }
}
