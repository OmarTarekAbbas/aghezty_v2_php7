@extends('frontv2.master')
@section('content')

<div class="main">
  <!-- Start Slider Carsoul -->

  <!-- End Slider Carsoul -->

  <div class="mobile_views">
    <div class="row">
      <div class="col-md-12 col-lg-12 col-xl-12 col-12">
        <div class="shopping_cart_title mt-3">
          <h2 class="text-center text-uppercase h2 text-primary font-weight-bold">
            <marquee class="marquee_cart" behavior="scroll">Shopping Cart</marquee>
          </h2>
        </div>
      </div>

      <div class="col-md-12 col-lg-12 col-xl-12 col-12">
        <div class="alert_msg alert alert-success my-3 w-100 hvr-wobble-to-bottom-right" role="alert">Apple iPhone 11
          Pro,256GB, 4GB RAM, 4G LTE, Gold was added to your shopping Cart.
          <i class="fas fa-times fa-lg float-right mt-1"></i>
        </div>
      </div>
    </div>
  </div>

  <section class="cart_shopping my-2">
    <div class="mobile_views">
      <div class="row">
        <div class="col-md-8 col-lg-8 col-xl-8 col-12">
          <div class='table-responsive'>
            <table id="tablePreview" class="table text-secondary table-sm table-bordered mb-0">

              <thead>
                <tr class="text-light bg-dark">
                  <th class="text-capitalize align-middle text-center">product name</th>
                  <th class="text-capitalize align-middle text-center">unit price</th>
                  <th class="text-capitalize align-middle text-center">quantity</th>
                  <th class="text-capitalize align-middle text-center">subtotal</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <th class="th_th text-primary h6" scope="row">
                    <a class="item-delete btn btn-sm text-primary" href="#0">
                      <i class="fas fa-times fa-lg "></i>
                    </a>

                    <a class="img_link" ref="inner-page.php">
                      <img class="w-25" src="{{url('public/frontv2/images/product1.jfif')}}" alt="iphone">
                    </a>

                    <span>Apple iPhone 11 Pro,256GB, 4GB RAM, 4G LTE, Gold</span>
                  </th>

                  <td class="item-price align-middle">9850 EGP</td>

                  <td class="td_td align-middle text-center w-25">
                    <div class="qty-holder text-center">
                      <a href="#0" class="table_qty_dec">-</a>

                      <input value="1" size="4" title="Qty" class="input-text qty" maxlength="12">

                      <a href="#0" class="table_qty_inc">+</a>

                      <a href="inner-page.php">
                        <i class="far fa-eye px-2 h6"></i>
                      </a>
                    </div>
                  </td>

                  <td class="item-total align-middle">9,850 EGP</td>
                </tr>

                <tr>
                  <th class="th_th text-primary h6" scope="row">
                    <a class="item-delete btn btn-sm text-primary" href="#0">
                      <i class="fas fa-times fa-lg"></i>
                    </a>

                    <a class="img_link" href="inner-page.php">
                      <img class="w-25" src="{{url('public/frontv2/images/products/4.jpg')}}" alt="iphone">
                    </a>

                    <span>Beko Front Loading Digital Washing Machine</span>
                  </th>

                  <td class="item-price align-middle">6,680 EGP</td>

                  <td class="td_td align-middle text-center w-25">
                    <div class="qty-holder text-center">
                      <a href="#0" class="table_qty_dec">-</a>

                      <input value="2" size="4" title="Qty" class="input-text qty" maxlength="12">

                      <a href="#0" class="table_qty_inc">+</a>

                      <a href="inner-page.php">
                        <i class="far fa-eye px-2 h6"></i>
                      </a>
                    </div>
                  </td>

                  <td class="item-total align-middle">‭13,360‬ EGP</td>
                </tr>

                <tr>
                  <th class="th_th text-primary h6" scope="row">
                    <a class="item-delete btn btn-sm text-primary" href="#0">
                      <i class="fas fa-times fa-lg"></i>
                    </a>

                    <a class="img_link" href="inner-page.php">
                      <img class="w-25" src="{{url('public/frontv2/images/products/3.jpg')}}" alt="iphone">
                    </a>

                    <span>Sony PlayStation 4 Slim, 1TB, 2 Controller, Black</span>
                  </th>

                  <td class="item-price align-middle">7,100 EGP</td>

                  <td class="td_td align-middle text-center w-25">
                    <div class="qty-holder text-center">
                      <a href="#0" class="table_qty_dec">-</a>

                      <input value="3" size="4" title="Qty" class="input-text qty" maxlength="12">

                      <a href="#0" class="table_qty_inc">+</a>

                      <a href="inner-page.php">
                        <i class="far fa-eye px-2 h6"></i>
                      </a>
                    </div>
                  </td>

                  <td class="item-total align-middle">‭21,300‬ EGP</td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="row btn_shopping table-bordered mx-0 py-3">
            <div class="col-md-6 col-lg-6 col-xl-6 col-12">
              <button class="btn continue_shopping btn-secondary text-capitalize text-white text-left hvr-wobble-to-bottom-right">continue
                shopping</button>
            </div>

            <div class="col-md-6 col-lg-6 col-xl-6 col-12">
              <button class="btn clear_shopping btn-secondary text-capitalize text-white text-right hvr-wobble-to-bottom-right">clear shopping
                cart</button>
            </div>
          </div>
        </div>

        <div class="col-md-4 col-lg-4 col-xl-4">
          <div class="discount_code_accordion md-accordion" id="accordionEx" role="tablist" aria-multiselectable="true">
            <!-- Start Discount Codes -->
            <div class="card">
              <div class="card-header w-100" role="tab" id="headingOne1">
                <a data-toggle="collapse" data-parent="#accordionEx" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne1">
                  <h5 class="mb-0 text-uppercase text-dark">
                    discount codes <i class="fas fa-angle-down rotate-icon float-right"></i>
                  </h5>
                </a>
              </div>

              <div id="collapseOne1" class="collapse" role="tabpanel" aria-labelledby="headingOne1" data-parent="#accordionEx">
                <div class="card-body">
                  <div class="input-group mb-2 m-auto w-100 hvr-float">
                    <div class="input-group-prepend">
                      <div class="input-group-text text-capitalize">coupon</div>
                    </div>
                    <input type="text" class="form-control text-center" placeholder="Code">
                  </div>
                </div>
              </div>
            </div>
            <!-- End Discount Codes -->

            <!-- Start Cart Totals -->
            <div class="card my-3">
              <div class="card-header w-100" role="tab" id="headingTwo2">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordionEx" href="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                  <h5 class="mb-0 text-uppercase text-dark">
                    cart totals <i class="fas fa-angle-down rotate-icon float-right"></i>
                  </h5>
                </a>
              </div>

              <div id="collapseTwo2" class="collapse show" role="tabpanel" aria-labelledby="headingTwo2" data-parent="#accordionEx">
                <div class="card-body">
                  <div class="sub_total">
                    <strong class="text-capitalize">subtotal</strong>
                    <strong class="subtotal_price text-uppercase float-right">41,150 <span>egp</span></strong>
                  </div>

                  <div class="border-bottom border-secondary w-100 my-3"></div>

                  <div class="sub_total">
                    <strong class="text-capitalize">shipping</strong>
                    <strong class="subtotal_price text-uppercase float-right">250 <span>egp</span></strong>
                  </div>

                  <div class="border-bottom border-secondary w-100 my-3"></div>

                  <div class="sub_total">
                    <strong class="text-capitalize">grand total</strong>
                    <strong class="subtotal_price text-uppercase float-right">41,400 <span>egp</span></strong>
                  </div>

                  <div class="cart_checkout w-100 my-3">
                    <button class="btn w-100 text-uppercase font-weight-bold hvr-wobble-to-bottom-right">proceed to checkout</button>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Cart Totals -->

            <div class="ads_img">
              <img class="rounded w-100" style="height:14rem" src="{{url('public/frontv2/images/ads/top-banner.jpg')}}" alt="Ads">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="choose_category mt-3">
    <div class="mobile_views">
      <div class="row no_margin">
        <div class="col-xl-2 col-6 margin_bottom_mob">
          <div class="choose_category_form text-center w-100 hvr-outline-in">
            <a href="listproduct.php">
              <img class="rounded w-100" src="{{url('public/frontv2/images/stationary.jpg')}}" alt="stationary">
            </a>
          </div>
        </div>

        <div class="col-xl-2 col-6 margin_bottom_mob">
          <div class="choose_category_form text-center w-100 hvr-outline-in">
            <a href="listproduct.php">
              <img class="rounded w-100" src="{{url('public/frontv2/images/computers.jpg')}}" alt="computers">
            </a>
          </div>
        </div>

        <div class="col-xl-2 col-6 margin_bottom_mob">
          <div class="choose_category_form text-center w-100 hvr-outline-in">
            <a href="listproduct.php">
              <img class="rounded w-100" src="{{url('public/frontv2/images/appliances.jpg')}}" alt="appliances">
            </a>
          </div>
        </div>

        <div class="col-xl-2 col-6 margin_bottom_mob">
          <div class="choose_category_form text-center w-100 hvr-outline-in">
            <a href="listproduct.php">
              <img class="rounded w-100" src="{{url('public/frontv2/images/personal-care.jpg')}}" alt="personal-care">
            </a>
          </div>
        </div>

        <div class="col-xl-2 col-6 margin_bottom_mob">
          <div class="choose_category_form text-center w-100 hvr-outline-in">
            <a href="listproduct.php">
              <img class="rounded w-100" src="{{url('public/frontv2/images/small-appliances.jpg')}}" alt="small-appliances">
            </a>
          </div>
        </div>

        <div class="col-xl-2 col-6 margin_bottom_mob">
          <div class="choose_category_form text-center w-100 hvr-outline-in">
            <a href="listproduct.php">
              <img class="rounded w-100" src="{{url('public/frontv2/images/mobile-accessories.jpg')}}" alt="mobile-accessories">
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="product_view mt-3">
    <div class="mobile_views">
      <div class="product_view_type">
        <div class="product_title mb-3">
          <div class="title_left text-left font-weight-bold">
            <strong id="cart_selected_typed"></strong>
          </div>

          <div class="title_right text-right">
            <button class="btn btn-dark">View More</button>
          </div>
        </div>

        <div class="row">
          <div class="col-xl-2 col-6 margin_bottom_mob">
            <div class="px-2 product_desc hvr-bob rounded">
              <a href="listproduct.php">
                <img src="{{url('public/frontv2/images/products/5.jpg')}}" alt="product" class="w-100 d-block m-auto">

                <div>
                  <p class="full_desc">Philips Viva Collection Citrus press - HR2744/40</p>
                </div>
              </a>

              <div class="price-box">
                <span class="regular-price">
                  <span class="price">699 EGP</span>
                </span>

                <p class="old-price">
                  <span class="price">
                    799 EGP </span>
                </p>
              </div>
            </div>
          </div>

          <div class="col-xl-2 col-6 margin_bottom_mob">
            <div class="px-2 product_desc hvr-bob rounded">
              <a href="listproduct.php">
                <img src="{{url('public/frontv2/images/products/6.jpg')}}" alt="product" class="w-100 d-block m-auto">

                <div>
                  <p class="full_desc">Philips Daily Collection Sandwich Maker, 2 Toasts, 820 Watt, White</p>
                </div>
              </a>

              <div class="price-box">
                <span class="regular-price">
                  <span class="price">899 EGP</span>
                </span>
              </div>
            </div>
          </div>

          <div class="col-xl-2 col-6 margin_bottom_mob">
            <div class="px-2 product_desc hvr-bob rounded">
              <a href="listproduct.php">
                <img src="{{url('public/frontv2/images/products/7.jpg')}}" alt="product" class="w-100 d-block m-auto">

                <div>
                  <p class="full_desc">Cozy Sporty Buff Bean Bag, Printed Pattern England, Waterproof</p>
                </div>
              </a>

              <div class="price-box">
                <span class="regular-price">
                  <span class="price">399 EGP</span>
                </span>

                <p class="old-price">
                  <span class="price">599 EGP </span>
                </p>
              </div>
            </div>
          </div>

          <div class="col-xl-2 col-6 margin_bottom_mob">
            <div class="px-2 product_desc hvr-bob rounded">
              <a href="listproduct.php">
                <img src="{{url('public/frontv2/images/products/8.jpg')}}" alt="product" class="w-100 d-block m-auto">

                <div>
                  <p class="full_desc">Unionaire 49 Inch Smart Full HD LED TV - ML49US615</p>
                </div>
              </a>

              <div class="price-box">
                <span class="regular-price">
                  <span class="price">4,649 EGP</span>
                </span>

                <p class="old-price">
                  <span class="price">4,899 EGP </span>
                </p>
              </div>
            </div>
          </div>

          <div class="col-xl-2 col-6 margin_bottom_mob">
            <div class="px-2 product_desc hvr-bob rounded">
              <a href="listproduct.php">
                <img src="{{url('public/frontv2/images/products/5.jpg')}}" alt="product" class="w-100 d-block m-auto">

                <div>
                  <p class="full_desc">Philips Viva Collection Citrus press - HR2744/40</p>
                </div>
              </a>

              <div class="price-box">
                <span class="regular-price">
                  <span class="price">699 EGP</span>
                </span>

                <p class="old-price">
                  <span class="price">
                    799 EGP </span>
                </p>
              </div>
            </div>
          </div>

          <div class="col-xl-2 col-6 margin_bottom_mob">
            <div class="px-2 product_desc hvr-bob rounded">
              <a href="listproduct.php">
                <img src="{{url('public/frontv2/images/products/7.jpg')}}" alt="product" class="w-100 d-block m-auto">

                <div>
                  <p class="full_desc">Cozy Sporty Buff Bean Bag, Printed Pattern England, Waterproof</p>
                </div>
              </a>

              <div class="price-box">
                <span class="regular-price">
                  <span class="price">399 EGP</span>
                </span>

                <p class="old-price">
                  <span class="price">599 EGP </span>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection

@section('script')
<script>
  var cart_selected_typed = new Typed('#cart_selected_typed', {
    strings: ['Selected For You'],
    typeSpeed: 150,
    backSpeed: 0,
    fadeOut: true,
    smartBackspace: true, // this is a default
    loop: true
  });
</script>
@endsection