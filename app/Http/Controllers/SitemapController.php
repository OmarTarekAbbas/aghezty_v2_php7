<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\ProductImage;
use Carbon\Carbon;


class SitemapController extends Controller
{

  public function sitemap_categories()
  {
    $categories = Category::whereNotNull("parent_id")->orderBy('updated_at', 'DESC')->get();
    return response(view('sitemap.categories')->with(compact('categories')), 200, [
      'Content-Type' => 'test/xml',
      'Content-Disposition' => 'attachment; filename="categories.xml"',
  ]);
  }

  public function sitemap_products()
  {
    $products = Product::whereDate('updated_at',Carbon::now()->toDateString())->orderBy('updated_at', 'DESC')->get();
    return response(view('sitemap.products')->with(compact('products')), 200, [
      'Content-Type' => 'test/xml',
      'Content-Disposition' => 'attachment; filename="products.xml"',
  ]);
  }

  public function image_products()
  {
    $image_products = ProductImage::whereDate('updated_at',Carbon::now()->toDateString())->orderBy('updated_at', 'DESC')->get();
    return response(view('sitemap.ImageProducts')->with(compact('image_products')), 200, [
      'Content-Type' => 'test/xml',
      'Content-Disposition' => 'attachment; filename="ImageProducts.xml"',
  ]);
  }

}
