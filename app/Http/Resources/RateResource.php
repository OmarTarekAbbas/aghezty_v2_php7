<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PropertyValueResource;

class RateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      return  [
          'id'       => $this->pivot->id,
          'comment'  => $this->pivot->comment,
          'rate'     => $this->pivot->rate,
          'name'     => $this->name,
          'date'     => $this->pivot->created_at->format('d-m-Y h:m A')
      ];

    }
}
