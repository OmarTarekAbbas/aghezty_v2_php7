<?php

namespace App\Http\Resources;

use App\Product;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Language;
use App\Http\Resources\BrandResource;
use App\Http\Resources\BrandCollection;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryCollection;
class OrderDetailsResource extends JsonResource
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
            'quantity' => $this->quantity,
            'price' => $this->price,
            'total_price' => $this->total_price,
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'title_en' =>Product::where("id", $this->product_id)->first()->title,
            'title_ar' =>Product::where("id", $this->product_id)->first()->getTranslation('title','ar'),
            'main_image' =>Product::where("id", $this->product_id)->first()->main_image,
        ];
    }
}
