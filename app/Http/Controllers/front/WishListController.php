<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cart;
use App\Product;

class WishListController extends Controller
{
  /**
   * Method index
   *
   * @return Response
   */
  public function index()
  {
    $wishListProducts = auth()->guard('client')->user()->wishList;
    $selected_for_you = Product::stock()->where('selected_for_you', 1)->get();
    if (count($selected_for_you) != 6) {
      $limit = 6 - count($selected_for_you);
      $selected_for_youR = Product::stock()->get()->random($limit);
      $selected_for_you = $selected_for_you->toBase()->merge($selected_for_youR);
    }
    return view("frontv2.wishlist",compact("wishListProducts", "selected_for_you"));
  }

  /**
   * Method createOrdelet
   *
   * create or delete wishlist for user or delete all product in wishlist for current user
   *
   * @param Request $request
   *
   * @return Response
   */
  public function createOrdelete(Request $request)
  {
      if($request->filled('delete_all')) {
        auth()->guard('client')->user()->wishList()->detach();
      } else {
        auth()->guard('client')->user()->wishList()->toggle($request->product_id);
      }

      if($request->ajax()) {
        return "ok";
      }
      return back();
  }

  /**
   * Method addWishlistProductToCart
   *
   * add wish list product to cart
   *
   * @param Request $request
   *
   * @return Response
   */
  public function addWishlistProductToCart(Request $request)
  {
    auth()->guard('client')->user()->wishList()->toggle($request->product_id);
    $price = product($request->product_id)->price_after_discount > 0 ? product($request->product_id)->price_after_discount : product($request->product_id)->price;
    $cart = Cart::create([
      'product_id' => $request->product_id,
      'client_id'  => auth()->guard('client')->id(),
      'quantity'   => $request->quantity,
      'price'      => $price,
      'total_price'=> $price
    ]);
    return redirect(route("front.home.cart"));
  }
}
