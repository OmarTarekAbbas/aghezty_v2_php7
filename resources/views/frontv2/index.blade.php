@extends('frontv2.layout')
@section('content')

<div class="main">
  <!-- Start Slider Carsoul -->
  @include('frontv2.video_slider')

  <section class="carsoul_ads">
    <div class="mobile_views ">
      <div class="row">
        <div class="col-md-12 col-xl-12 d-none d-sm-block">
          <a href="#">
            <div class="full_banner">
              <img class="rounded w-100" src="{{url($ads[2]->image)}}" alt="Top Wide">
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- End Slider Carsoul -->

  <section class="choose_category mt-3">
    <div class="mobile_views">
      <div class="choose_category_background">
        <div class="row mr-0 ml-0">
          <div class="col-md-2 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="listproduct.php">
                <!-- <img class="rounded-circle w-75" src="images/mobiles_offers/mobiles.jpg" alt="mobiles"> -->
                <div class="diamond_sample diamond_bg_1">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block">Mobile</strong>
                    <strong class="d-block"> Offers</strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>

          <div class="col-md-2 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="listproduct.php">
                <!-- <img class="rounded-circle w-75" src="images/mobiles_offers/less-1000.jpg" alt="less-1000"> -->
                <div class="diamond_sample diamond_bg_2">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block">Less Than</strong>
                    <strong class="d-block"> 1000 EGP</strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>

          <div class="col-md-2 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="listproduct.php">
                <!-- <img class="rounded-circle w-75" src="images/mobiles_offers/mobiles-1000-3000.jpg" alt="mobiles-1000-3000"> -->
                <div class="diamond_sample diamond_bg_3">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block">From 1000 EGP</strong>
                    <strong class="d-block"> To 3000 EGP</strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>

          <div class="col-md-2 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="listproduct.php">
                <!-- <img class="rounded-circle w-75" src="images/mobiles_offers/mobiles-3000-6000.jpg" alt="mobiles-3000-6000"> -->
                <div class="diamond_sample diamond_bg_4">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block">From 3000 EGP</strong>
                    <strong class="d-block"> To 6000 EGP</strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>

          <div class="col-md-2 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="listproduct.php">
                <!-- <img class="rounded-circle w-75" src="images/mobiles_offers/mobiles-6000-10000.jpg" alt="mobiles-6000-10000"> -->
                <div class="diamond_sample diamond_bg_5">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block">From 6000 EGP</strong>
                    <strong class="d-block"> To 10000 EGP</strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>

          <div class="col-md-2 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="listproduct.php">
                <!-- <img class="rounded-circle w-75" src="images/mobiles_offers/more-10000.jpg" alt="more-10000"> -->
                <div class="diamond_sample diamond_bg_6">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block">More Than</strong>
                    <strong class="d-block"> 10000 EGP</strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="row ml-0">
        <div class="col-md-6 col-xl-6 pl-0 ">
          <div class="left-img mt-3">
            <a href="listproduct.php">
              <img class="w-100" src="{{url($ads[3]->image)}}" alt="left">
            </a>
          </div>
        </div>

        <div class="col-md-6 col-xl-6 pl-0">
          <div class="left-img mt-3">
            <a href="listproduct.php">
              <img class="w-100" src="{{url($ads[4]->image)}}" alt="right">
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="choose_category mt-3">
    <div class="mobile_views">
      <div class="choose_category_background">
        <div class="row mr-0 ml-0">
          <div class="col-md-2 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="listproduct.php">
                <!-- <img class="rounded-circle w-75" src="images/tv_offers/tv-offers.webp" alt="mobiles"> -->

                <div class="diamond_sample diamond_bg_1">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block">Television</strong>
                    <strong class="d-block"> Offers</strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>

          <div class="col-md-2 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="listproduct.php">
                <!-- <img class="rounded-circle w-75" src="images/tv_offers/less-32-inch.jpg" alt="mobiles-6000-10000"> -->

                <div class="diamond_sample diamond_bg_2">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block">Less Than</strong>
                    <strong class="d-block"> 32 INCH</strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>

          <div class="col-md-2 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="listproduct.php">
                <!-- <img class="rounded-circle w-75" src="images/tv_offers/32-43-inch.jpg" alt="less-1000"> -->

                <div class="diamond_sample diamond_bg_3">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block">32 To</strong>
                    <strong class="d-block"> 43 INCH</strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>

          <div class="col-md-2 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="listproduct.php">
                <!-- <img class="rounded-circle w-75" src="images/tv_offers/49-55-inch.jpg" alt="mobiles-1000-3000"> -->

                <div class="diamond_sample diamond_bg_4">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block">49 To</strong>
                    <strong class="d-block"> 55 INCH</strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>

          <div class="col-md-2 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="listproduct.php">
                <!-- <img class="rounded-circle w-75" src="images/tv_offers/60-75-inch.jpg" alt="mobiles-3000-6000"> -->

                <div class="diamond_sample diamond_bg_5">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block">60 To</strong>
                    <strong class="d-block"> 75 INCH</strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>

          <div class="col-md-2 col-xl-2 col-4 margin_bottom_mob">
            <div class="choose_category_form text-center">
              <a href="listproduct.php">
                <!-- <img class="rounded-circle w-75" src="images/tv_offers/more-75-inch.jpg" alt="more-10000"> -->

                <div class="diamond_sample diamond_bg_6">
                  <h5 class="diamond_sample_title text-capitalize text-center text-white w-100">
                    <strong class="d-block">More Than</strong>
                    <strong class="d-block"> 75 INCH</strong>
                  </h5>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>

      <div class="row d-none d-sm-block">
        <div class="col-md-12 col-xl-12 col-12">
          <a href="listproduct.php">
            <div class="full_banner mt-3">
              <img class="rounded w-100" src="{{url($ads[5]->image)}}" alt="bottom Wide">
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>

  <section class="product_view mt-3">
    <div class="mobile_views">
      <div class="product_view_type">
        <div class="product_title mb-3">
          <div class="title_left text-left font-weight-bold">
            <strong>Recently Added</strong>
          </div>

          <div class="title_right text-right">
            <button class="btn btn-dark">View More</button>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4 col-xl-2 col-6 margin_bottom_mob">
            <div class="px-2 product_desc rounded">
              <a href="inner-page.php">
                <img src="{{url('public/frontv2/images/products/1.jpg')}}" alt="product" class="w-75 d-block m-auto">

                <div>
                  <p class="full_desc">2 Cozy Kids Buff Bean Bag, Solid Pattern, Waterproof</p>
                </div>
              </a>

              <div class="price-box">
                <span class="regular-price">
                  <span class="price">300 EGP</span>
                </span>

                <p class="old-price">
                  <span class="price">
                    700 EGP </span>
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-xl-2 col-6 margin_bottom_mob">
            <div class="px-2 product_desc rounded">
              <a href="inner-page.php">
                <img src="{{url('public/frontv2/images/products/2.webp')}}" alt="product" class="w-75 d-block m-auto">

                <div>
                  <p class="full_desc">Arzum Okka - OK006 - Turkish Coffee Machine</p>
                </div>
              </a>

              <div class="price-box">
                <span class="regular-price" id="product-price-13085">
                  <span class="price">1,900 EGP</span>
                </span>

                <p class="old-price">
                  <span class="price" id="old-price-20549">
                    2,200 EGP </span>
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-xl-2 col-6 margin_bottom_mob">
            <div class="px-2 product_desc rounded">
              <a href="inner-page.php">
                <img src="{{url('public/frontv2/images/products/3.jpg')}}" alt="product" class="w-75 d-block m-auto">

                <div>
                  <p class="full_desc">Sony PlayStation 4 Slim, 1TB, 2 Controller, Black</p>
                </div>
              </a>

              <div class="price-box">
                <span class="regular-price" id="product-price-13085">
                  <span class="price">7,100 EGP</span>
                </span>

                <p class="old-price">
                  <span class="price" id="old-price-20549">
                    8,999 EGP </span>
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-xl-2 col-6 margin_bottom_mob">
            <div class="px-2 product_desc rounded">
              <a href="inner-page.php">
                <img src="{{url('public/frontv2/images/products/4.jpg')}}" alt="product" class="w-75 d-block m-auto">

                <div>
                  <p class="full_desc">Beko Front Loading Digital Washing Machine</p>
                </div>
              </a>

              <div class="price-box">
                <span class="regular-price" id="product-price-13085">
                  <span class="price">6,680 EGP</span>
                </span>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-xl-2 col-6 margin_bottom_mob">
            <div class="px-2 product_desc rounded">
              <a href="inner-page.php">
                <img src="{{url('public/frontv2/images/products/1.jpg')}}" alt="product" class="w-75 d-block m-auto">

                <div>
                  <p class="full_desc">2 Cozy Kids Buff Bean Bag, Solid Pattern, Waterproof</p>
                </div>
              </a>

              <div class="price-box">
                <span class="regular-price" id="product-price-13085">
                  <span class="price">300 EGP</span>
                </span>

                <p class="old-price">
                  <span class="price" id="old-price-20549">
                    700 EGP </span>
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-xl-2 col-6 margin_bottom_mob">
            <div class="px-2 product_desc rounded">
              <a href="inner-page.php">
                <img src="{{url('public/frontv2/images/products/3.jpg')}}" alt="product" class="w-75 d-block m-auto">

                <div>
                  <p class="full_desc">Sony PlayStation 4 Slim, 1TB, 2 Controller, Black</p>
                </div>
              </a>

              <div class="price-box">
                <span class="regular-price" id="product-price-13085">
                  <span class="price">7,100 EGP</span>
                </span>

                <p class="old-price">
                  <span class="price" id="old-price-20549">
                    8,999 EGP </span>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="choose_category mt-3">
    <div class="mobile_views">
      <div class="row no_margin">
        <div class="col-md-2 col-xl-2 col-6 margin_bottom_mob">
          <div class="choose_category_form text-center">
            <a href="listproduct.php">
              <img class="rounded w-100" src="{{url('public/frontv2/images/stationary.jpg')}}" alt="stationary">
            </a>
          </div>
        </div>

        <div class="col-md-2 col-xl-2 col-6 margin_bottom_mob">
          <div class="choose_category_form text-center">
            <a href="listproduct.php">
              <img class="rounded w-100" src="{{url('public/frontv2/images/computers.jpg')}}" alt="computers">
            </a>
          </div>
        </div>

        <div class="col-md-2 col-xl-2 col-6 margin_bottom_mob">
          <div class="choose_category_form text-center">
            <a href="listproduct.php">
              <img class="rounded w-100" src="{{url('public/frontv2/images/appliances.jpg')}}" alt="appliances">
            </a>
          </div>
        </div>

        <div class="col-md-2 col-xl-2 col-6 margin_bottom_mob">
          <div class="choose_category_form text-center">
            <a href="listproduct.php">
              <img class="rounded w-100" src="{{url('public/frontv2/images/personal-care.jpg')}}" alt="personal-care">
            </a>
          </div>
        </div>

        <div class="col-md-2 col-xl-2 col-6 margin_bottom_mob">
          <div class="choose_category_form text-center">
            <a href="listproduct.php">
              <img class="rounded w-100" src="{{url('public/frontv2/images/small-appliances.jpg')}}" alt="small-appliances">
            </a>
          </div>
        </div>

        <div class="col-md-2 col-xl-2 col-6 margin_bottom_mob">
          <div class="choose_category_form text-center">
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
            <strong>Selected For You</strong>
          </div>

          <div class="title_right text-right">
            <button class="btn btn-dark">View More</button>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4 col-xl-2 col-6 margin_bottom_mob">
            <div class="px-2 product_desc rounded">
              <a href="listproduct.php">
                <img src="{{url('public/frontv2/images/products/5.jpg')}}" alt="product" class="w-75 d-block m-auto">

                <div>
                  <p class="full_desc">Philips Viva Collection Citrus press - HR2744/40</p>
                </div>
              </a>

              <div class="price-box">
                <span class="regular-price" id="product-price-13085">
                  <span class="price">699 EGP</span>
                </span>

                <p class="old-price">
                  <span class="price" id="old-price-20549">
                    799 EGP </span>
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-xl-2 col-6 margin_bottom_mob">
            <div class="px-2 product_desc rounded">
              <a href="listproduct.php">
                <img src="{{url('public/frontv2/images/products/6.jpg')}}" alt="product" class="w-75 d-block m-auto">

                <div>
                  <p class="full_desc">Philips Daily Collection Sandwich Maker, 2 Toasts, 820 Watt, White</p>
                </div>
              </a>

              <div class="price-box">
                <span class="regular-price" id="product-price-13085">
                  <span class="price">899 EGP</span>
                </span>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-xl-2 col-6 margin_bottom_mob">
            <div class="px-2 product_desc rounded">
              <a href="listproduct.php">
                <img src="{{url('public/frontv2/images/products/7.jpg')}}" alt="product" class="w-75 d-block m-auto">

                <div>
                  <p class="full_desc">Cozy Sporty Buff Bean Bag, Printed Pattern England, Waterproof</p>
                </div>
              </a>

              <div class="price-box">
                <span class="regular-price" id="product-price-13085">
                  <span class="price">399 EGP</span>
                </span>

                <p class="old-price">
                  <span class="price" id="old-price-20549">599 EGP </span>
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-xl-2 col-6 margin_bottom_mob">
            <div class="px-2 product_desc rounded">
              <a href="listproduct.php">
                <img src="{{url('public/frontv2/images/products/8.jpg')}}" alt="product" class="w-75 d-block m-auto">

                <div>
                  <p class="full_desc">Unionaire 49 Inch Smart Full HD LED TV - ML49US615</p>
                </div>
              </a>

              <div class="price-box">
                <span class="regular-price" id="product-price-13085">
                  <span class="price">4,649 EGP</span>
                </span>

                <p class="old-price">
                  <span class="price" id="old-price-20549">4,899 EGP </span>
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-xl-2 col-6 margin_bottom_mob">
            <div class="px-2 product_desc rounded">
              <a href="listproduct.php">
                <img src="{{url('public/frontv2/images/products/5.jpg')}}" alt="product" class="w-75 d-block m-auto">

                <div>
                  <p class="full_desc">Philips Viva Collection Citrus press - HR2744/40</p>
                </div>
              </a>

              <div class="price-box">
                <span class="regular-price" id="product-price-13085">
                  <span class="price">699 EGP</span>
                </span>

                <p class="old-price">
                  <span class="price" id="old-price-20549">
                    799 EGP </span>
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-xl-2 col-6 margin_bottom_mob">
            <div class="px-2 product_desc rounded">
              <a href="listproduct.php">
                <img src="{{url('public/frontv2/images/products/7.jpg')}}" alt="product" class="w-75 d-block m-auto">

                <div>
                  <p class="full_desc">Cozy Sporty Buff Bean Bag, Printed Pattern England, Waterproof</p>
                </div>
              </a>

              <div class="price-box">
                <span class="regular-price" id="product-price-13085">
                  <span class="price">399 EGP</span>
                </span>

                <p class="old-price">
                  <span class="price" id="old-price-20549">599 EGP </span>
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
