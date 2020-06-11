<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
          'title_en' => $this->title,
          'title_ar' => $this->getTranslation('title','ar'),
          'title' => $this->getTranslation('title',getCode()),
          'coding' => $this->coding,
          'parent_id' =>$this->parent_id,
          'image' => $this->image,
          'sub_cats' => CategoryResource::collection($this->sub_cats)
      ];

    }
}
