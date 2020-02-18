<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PropertyValueResource;

class PropertyResource extends JsonResource
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
          'id'     => $this->id,
          'title'  => $this->getTranslation('title',getCode()),
          'pvalue' => PropertyValueResource::collection($this->pvalue)
      ];

    }
}
