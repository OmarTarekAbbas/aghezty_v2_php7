<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Language;
use App\Http\Resources\BrandResource;
use App\Http\Resources\BrandCollection;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryCollection;
class ProductResource extends JsonResource
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
          'main_image' => $this->main_image,
          'price' => $this->price,
          'discount' => $this->discount,
          'price_after_discount' => $this->price_after_discount,
          'special' => $this->special,
          'active' => $this->active,
          'description_en' => $this->description,
          'description_ar' => $this->getTranslation('description','ar'),
          'short_description_en' => $this->short_description,
          'short_description_ar' => $this->getTranslation('short_description','ar'),
          'category_id' => $this->category_id,
          'brand_id' => $this->brand_id,
          'stock' => $this->stock,
          'stars' => $this->rate() ? round($this->rate()) : 0,
          'rates' => RateResource::collection($this->client_rates),
          'gallery' => $this->images->pluck('image')
      ];
    }
}
