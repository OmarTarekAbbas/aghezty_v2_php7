<?php

namespace App\Http\Resources;

use App\Http\Resources\OrderDetailsResource;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Language;
use App\Product;
use App\Http\Resources\BrandResource;
use App\Http\Resources\BrandCollection;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategoryCollection;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'shipping_amount' => $this->shipping_amount,
            'total_price' => $this->total_price,
            'status' => $this->status,
            'client_id' => $this->client_id,
            'address_id' => $this->address_id,
            'lang' => $this->lang,
            'payment' => $this->payment,
            'created_at' => $this->created_at->format('d-m-Y'),
            'products' => OrderDetailsResource::collection($this->products),

        ];
    }
}
