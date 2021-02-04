<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Language;

class BrandResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
      $langs = Language::all();
      $data =  [
          'id' => $this->id,
          'title' => $this->getTranslation('title',getCode()),
          'title_en' => $this->getTranslation('title','en'),
          'image' => $this->image,
      ];
      $lng = [];
      foreach ($langs as $key => $value) {
          $lng += [$value->short_code => $this->getTranslation('title',$value->short_code )];
      }
      $data['langs'] = $lng;
      return $data;
    }
}
