<!-- Start Header -->
<?php include 'header.php'; ?>
<!-- End Header -->

<style>
  nav.container-fluid {
    padding-right: 0 !important;
    padding-left: 0 !important;
  }
</style>

<!-- start container -->
<div class="main">
  <nav class="mobile_views nav_breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php" title="Go To Home">Home</a>
      </li>

      <li class="breadcrumb-item">
        <a href="listproduct.php" title="Go To Heavy Machine">Heavy Machine</a>
      </li>

      <li class="breadcrumb-item active" aria-current="page">Mobile</li>
    </ol>
  </nav>

  <div class="mobile_views">
    <!-- start row -->
    <div class="row">
      <!-- start col-md-2 -->
      <button type="button" id="button_jq" class="btn btn-dark d-md-none" data-toggle="modal" data-target="#exampleModal">
        <i class="fas fa-sliders-h" data-toggle="modal" data-target="#exampleModal"></i>
      </button>

      <!-- Start Filter Search -->
      <div id="toggle_plus_minus" class="col-md-2 d-none d-md-block">
        <button class="accordion active  w-100 border border-light text-uppercase">Heavy Machines
          <i class="fas fa-minus float-right"></i>
        </button>

        <div class="panel mb-3 w-100 border border-light">
          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_1" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_1">BUILT IN DISH WASHERS</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_2" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_2">HOBS</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_3" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_3">B-in</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_4" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_4">OVENS</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_5" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_5">cookers</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_6" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_6">Dish washer</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_7" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_7">BUILT IN WASHER DRYERS</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_8" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_8">DRYERS</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_9" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_9">washing machines</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_10" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_10">TV</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_11" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_11">Air Conditioner</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_12" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_12">Kitchen Cooker Hood</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_13" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_13">Air</label>
          </div>
        </div>

        <button class="accordion active w-100 border border-light text-uppercase">Light Machines
          <i class="fas fa-minus float-right"></i>
        </button>

        <div class="panel mb-3 w-100 border border-light">
          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_14" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_14">MICROWAVE</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_15" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_15">Coffee &amp; Espresso Makers</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_16" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_16">Electric kettle</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_17" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_17">Food Steamer</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_18" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_18">Air Fryer</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_19" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_19">Table Grill</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_20" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_20">Sandwich Maker</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_200" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_200">Blenders</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_21" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_21">PowerLife Bagged</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_22" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_22">Collection Salad Maker</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_23" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_23">iron</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_24" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_24">Water Dispenser</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_25" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_25">Water Heater</label>
          </div>
        </div>

        <button class="accordion active w-100 border border-light text-uppercase">BRAND
          <i class="fas fa-minus float-right"></i>
        </button>

        <div class="panel mb-3 w-100 border border-light">
          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_26" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_26">Apple</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_27" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_27">Devia</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_28" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_28">Ariston</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_29" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_29">Philips</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_30" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_30">SAMSUNG</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_31" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_31">LG</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_32" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_32">sharp</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_33" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_33">TOSHIBA</label>
          </div>
        </div>

        <button class="accordion active w-100 border border-light text-uppercase">PRICE by shop
          <i class="fas fa-minus float-right"></i>
        </button>

        <div class="panel mb-3 w-100 border border-light">
          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_34" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_34">Less Than - 1000 EGP</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_35" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_35">1000 EGP - 3000 EGP</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_36" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_36">3000 EGP - 6000 EGP</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_37" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_37">6000 EGP - 10,000 EGP</label>
          </div>

          <div class="z-checkbox hvr-icon-forward">
            <input id="panel_38" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_38">10,000 EGP - More Than</label>
          </div>
        </div>

        <button class="accordion active active w-100 border border-light text-uppercase">Offer
          <i class="fas fa-minus float-right"></i>
        </button>

        <div class="panel w-100 border border-light">
          <div class="z-checkbox hvr-icon-forward ">
            <input id="panel_39" class="mb-2" type="checkbox" name="vehicle" value="Bike">
            <label class="d-block text-capitalize" for="panel_39">Offer</label>
          </div>
        </div>
      </div>
      <!-- End Filter Search -->

      <!-- Modal -->
      <div class="modal open_right fade w3-center" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h6 class="modal-title" style="font-weight: bold;">Filter Your Selection</h6>
              <button type="button" class="close close_modal" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

            <div id="toggle_plus_minus" class="modal-body">
              <button class="accordion active w-100 border border-light">Heavy Machines
                <i class="fas fa-minus float-right"></i>
              </button>

              <div class="panel mb-3 border border-secondary">
                <div class="z-checkbox">
                  <input id="panel_100" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_100">BUILT IN DISH WASHERS</label>
                </div>

                <div class="z-checkbox">
                  <input id="panel_2000" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_2000">HOBS</label>
                </div>

                <div class="z-checkbox">
                  <input id="panel_300" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_300">B-in</label>
                </div>

                <div class="z-checkbox">
                  <input id="400" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="400">OVENS</label>
                </div>

                <div class="z-checkbox">
                  <input id="panel_5" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_5">cookers</label>
                </div>

                <div class="z-checkbox">
                  <input id="panel_6" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_6">Dish washer</label>
                </div>

                <div class="z-checkbox">
                  <input id="panel_7" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_7">BUILT IN WASHER DRYERS</label>
                </div>

                <div class="z-checkbox">
                  <input id="panel_8" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_8">DRYERS</label>
                </div>

                <div class="z-checkbox">
                  <input id="panel_9" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_9">washing machines</label>
                </div>

                <div class="z-checkbox">
                  <input id="panel_10" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_10">TV</label>
                </div>

                <div class="z-checkbox">
                  <input id="panel_11" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_11">Air Conditioner</label>
                </div>

                <div class="z-checkbox">
                  <input id="panel_12" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_12">Kitchen Cooker Hood</label>
                </div>

                <div class="z-checkbox">
                  <input id="panel_13" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_13">Air</label>
                </div>
              </div>

              <button class="accordion active w-100 border border-light">Light Machines
                <i class="fas fa-minus float-right"></i>
              </button>

              <div class="panel mb-3 border border-secondary">
                <div class="z-checkbox">
                  <input id="panel_14" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_14">MICROWAVE</label>
                </div>

                <div class="z-checkbox">
                  <input id="panel_15" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_15">Coffee &amp; Espresso Makers</label>
                </div>

                <div class="z-checkbox">
                  <input id="panel_16" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_16">Electric kettle</label>
                </div>

                <div class="z-checkbox">
                  <input id="panel_17" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_17">Food Steamer</label>
                </div>

                <div class="z-checkbox">
                  <input id="panel_18" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_18">Air Fryer</label>
                </div>

                <div class="z-checkbox">
                  <input id="panel_19" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_19">Table Grill</label>
                </div>

                <div class="z-checkbox">
                  <input id="panel_20" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_20">Sandwich Maker</label>
                </div>

                <div class="z-checkbox">
                  <input id="panel_200" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_200">Blenders</label>
                </div>

                <div class="z-checkbox">
                  <input id="panel_21" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_21">PowerLife Bagged</label>
                </div>

                <div class="z-checkbox">
                  <input id="panel_22" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_22">Collection Salad Maker</label>
                </div>

                <div class="z-checkbox">
                  <input id="panel_23" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_23">iron</label>
                </div>

                <div class="z-checkbox">
                  <input id="panel_24" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_24">Water Dispenser</label>
                </div>

                <div class="z-checkbox">
                  <input id="panel_25" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_25">Water Heater</label>
                </div>
              </div>

              <button class="accordion active w-100 border border-light">BRAND
                <i class="fas fa-minus float-right"></i>
              </button>

              <div class="panel mb-3 border border-secondary">
                <div class="z-checkbox">
                  <input id="panel_26" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_26">Apple</label>
                </div>

                <div class="z-checkbox">
                  <input id="panel_27" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_27">Devia</label>
                </div>

                <div class="z-checkbox">
                  <input id="panel_28" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_28">Ariston</label>
                </div>

                <div class="z-checkbox">
                  <input id="panel_29" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_29">Philips</label>
                </div>

                <div class="z-checkbox">
                  <input id="panel_30" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_30">SAMSUNG</label>
                </div>

                <div class="z-checkbox">
                  <input id="panel_31" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_31">LG</label>
                </div>

                <div class="z-checkbox">
                  <input id="panel_32" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_32">sharp</label>
                </div>

                <div class="z-checkbox">
                  <input id="panel_33" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_33">TOSHIBA</label>
                </div>
              </div>

              <button class="accordion active w-100 border border-light">PRICE
                <i class="fas fa-minus float-right"></i>
              </button>

              <div class="panel mb-3 border border-secondary">
                <div class="z-checkbox">
                  <input id="panel_34" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_34">Less Than - 1000 EGP</label>
                </div>

                <div class="z-checkbox">
                  <input id="panel_35" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_35">1000 EGP - 3000 EGP</label>
                </div>

                <div class="z-checkbox">
                  <input id="panel_36" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_36">3000 EGP - 6000 EGP</label>
                </div>

                <div class="z-checkbox">
                  <input id="panel_37" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_37">6000 EGP - 10,000 EGP</label>
                </div>

                <div class="z-checkbox">
                  <input id="panel_38" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_38">10,000 EGP - More Than</label>
                </div>
              </div>

              <button class="accordion active active w-100 border border-light">Offer
                <i class="fas fa-minus float-right"></i>
              </button>

              <div class="panel border border-secondary">
                <div class="z-checkbox">
                  <input id="panel_39" class="mb-2" type="checkbox" name="vehicle" value="Bike">
                  <label class="d-block text-capitalize" for="panel_39">Offer</label>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

      <!-- Start Grid & List View -->
      <!-- Start Image Cover -->
      <div class="col-md-10">
        <div class="list_cover">
          <img class="w-100 " src="images/oppo.jfif" alt="Cover" title="Apple">
        </div>
        <!-- End Image Cover -->

        <!-- Start Toolbar -->
        <div class="toolbar mt-3 p-2 border bg-white">
          <div class="sort-by mr-3 float-left">
            <label class="labelclass m-auto font-weight-normal">Sort By:</label>
          </div>

          <select class="selsort p-1 border border-secondary bg-white">
            <option>Name A-Z</option>
            <option>Name Z-A</option>
            <option>Price DESC</option>
            <option>Price ASC</option>
          </select>

          <strong class="grid_list float-right">
            <a href="#0" id="grid_list_two">
              <i class="fas fa-th active_grid"></i>
            </a>

            <a href="#0" id="grid_list_one">
              <i class="fas fa-list list_view border"></i>
            </a>
          </strong>
        </div>
        <!-- End Toolbar -->

        <!-- start row product -->
        <div id="grid_two" class="row mt-3 content_view_mobile">
          <div class="col-md-3 col-6 mb-3">
            <div class="content_view hvr-bob px-2 h-100 bg-white rounded">
              <a href="inner-page.php">
                <img src="images/download.jfif" alt="Product" class="w-75 d-block m-auto">

                <h6 class="full_desc text-dark text-center text-capitalize">Apple iPhone XS Max, 256GB, 4GB RAM, 4G LTE, Space
                  Grey</h6>
              </a>

              <div class="rating_list_product">
                <i class="fas fa-star colorstar"></i>
                <i class="fas fa-star colorstar"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
              </div>

              <div class="price-description text-uppercase">Cash Price</div>

              <div class="price-box">
                <span class="regular-price">
                  <span class="price font-weight-bold">30,200 EGP</span>
                </span>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-6 mb-3">
            <div class="content_view hvr-bob px-2 h-100 bg-white rounded">
              <a href="inner-page.php">
                <img src="images/product2.webp" alt="Product" class="w-75 d-block m-auto">

                <h6 class="full_desc text-dark text-center text-capitalize">Devia Ocean2 series case for iPhone XI 5.8 2019 - Clear Tea</h6>
              </a>

              <div class="rating_list_product">
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
              </div>

              <div class="price-description text-uppercase">Cash Price</div>

              <div class="price-box">
                <span class="regular-price">
                  <span class="price font-weight-bold">349 EGP</span>
                </span>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-6 mb-3">
            <div class="content_view hvr-bob px-2 h-100 bg-white rounded">
              <a href="inner-page.php">
                <img src="images/product3.webp" alt="Product" class="w-75 d-block m-auto">

                <div class="product-label text-center font-weight-bold">
                  <span class="sale-product-icon">-10%</span>
                </div>

                <h6 class="full_desc text-dark text-center text-capitalize">Apple iPhone 11, 128GB, 4GB RAM, 4G LTE, Green</h6>
              </a>

              <div class="rating_list_product">
                <i class="fas fa-star colorstar"></i>
                <i class="fas fa-star colorstar"></i>
                <i class="fas fa-star colorstar"></i>
                <i class="fas fa-star colorstar"></i>
                <i class="fas fa-star colorstar"></i>
              </div>

              <div class="price-description text-uppercase">Cash Price</div>

              <div class="price-box">
                <span class="regular-price">
                  <span class="price font-weight-bold">16,999 EGP</span>
                </span>

                <p class="old-price">
                  <span class="price font-weight-bold">506 EGP </span>
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-6 mb-3">
            <div class="content_view hvr-bob px-2 h-100 bg-white rounded">
              <a href="inner-page.php">
                <img src="images/product3.webp" alt="Product" class="w-75 d-block m-auto">

                <h6 class="full_desc text-dark text-center text-capitalize">Apple iPhone XS, 256GB, 4GB RAM, 4G LTE, Gold</h6>
              </a>

              <div class="rating_list_product">
                <i class="fas fa-star colorstar"></i>
                <i class="fas fa-star colorstar"></i>
                <i class="fas fa-star colorstar"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
              </div>

              <div class="price-description text-uppercase">Cash Price</div>

              <div class="price-box">
                <span class="regular-price">
                  <span class="price font-weight-bold">27,500 EGP</span>
                </span>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-6 mb-3">
            <div class="content_view hvr-bob px-2 h-100 bg-white rounded">
              <a href="inner-page.php">
                <img src="images/download.jfif" alt="Product" class="w-75 d-block m-auto">

                <div class="product-label text-center font-weight-bold">
                  <span class="sale-product-icon">-10%</span>
                </div>

                <h6 class="full_desc text-dark text-center text-capitalize">Apple iPhone XS Max, 256GB, 4GB RAM, 4G LTE, Space Grey</h6>
              </a>

              <div class="rating_list_product">
                <i class="fas fa-star colorstar"></i>
                <i class="fas fa-star colorstar"></i>
                <i class="fas fa-star colorstar"></i>
                <i class="fas fa-star colorstar"></i>
                <i class="fas fa-star colorstar"></i>
              </div>

              <div class="price-description text-uppercase">Cash Price</div>

              <div class="price-box">
                <span class="regular-price">
                  <span class="price font-weight-bold">30,200 EGP</span>
                </span>

                <p class="old-price">
                  <span class="price font-weight-bold">506 EGP </span>
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-6 mb-3">
            <div class="content_view hvr-bob px-2 h-100 bg-white rounded">
              <a href="inner-page.php">
                <img src="images/product2.webp" alt="Product" class="w-75 d-block m-auto">

                <h6 class="full_desc text-dark text-center text-capitalize">Devia Ocean2 series case for iPhone XI 5.8 2019 - Clear Tea</h6>
              </a>

              <div class="rating_list_product">
                <i class="fas fa-star colorstar"></i>
                <i class="fas fa-star colorstar"></i>
                <i class="fas fa-star colorstar"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
              </div>

              <div class="price-description text-uppercase">Cash Price</div>

              <div class="price-box">
                <span class="regular-price">
                  <span class="price font-weight-bold">349 EGP</span>
                </span>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-6 mb-3">
            <div class="content_view hvr-bob px-2 h-100 bg-white rounded">
              <a href="inner-page.php">
                <img src="images/product3.webp" alt="Product" class="w-75 d-block m-auto">

                <div class="product-label text-center font-weight-bold">
                  <span class="sale-product-icon">-10%</span>
                </div>

                <h6 class="full_desc text-dark text-center text-capitalize">Apple iPhone 11, 128GB, 4GB RAM, 4G LTE, Green</h6>
              </a>

              <div class="rating_list_product">
                <i class="fas fa-star colorstar"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
              </div>

              <div class="price-description text-uppercase">Cash Price</div>

              <div class="price-box">
                <span class="regular-price">
                  <span class="price font-weight-bold">16,999 EGP</span>
                </span>

                <p class="old-price">
                  <span class="price font-weight-bold">506 EGP </span>
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-6 mb-3">
            <div class="content_view hvr-bob px-2 h-100 bg-white rounded">
              <a href="inner-page.php">
                <img src="images/product3.webp" alt="Product" class="w-75 d-block m-auto">

                <h6 class="full_desc text-dark text-center text-capitalize">Apple iPhone XS, 256GB, 4GB RAM, 4G LTE, Gold</h6>
              </a>

              <div class="rating_list_product">
                <i class="fas fa-star colorstar"></i>
                <i class="fas fa-star colorstar"></i>
                <i class="fas fa-star colorstar"></i>
                <i class="fas fa-star colorstar"></i>
                <i class="fas fa-star colorstar"></i>
              </div>

              <div class="price-description text-uppercase">Cash Price</div>

              <div class="price-box">
                <span class="regular-price">
                  <span class="price font-weight-bold">27,500 EGP</span>
                </span>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-6 mb-3">
            <div class="content_view hvr-bob px-2 h-100 bg-white rounded">
              <a href="inner-page.php">
                <img src="images/download.jfif" alt="Product" class="w-75 d-block m-auto">

                <h6 class="full_desc text-dark text-center text-capitalize">Apple iPhone XS Max, 256GB, 4GB RAM, 4G LTE, Space Grey</h6>
              </a>

              <div class="rating_list_product">
                <i class="fas fa-star colorstar"></i>
                <i class="fas fa-star colorstar"></i>
                <i class="fas fa-star colorstar"></i>
                <i class="fas fa-star colorstar"></i>
                <i class="fas fa-star colorstar"></i>
              </div>

              <div class="price-description text-uppercase">Cash Price</div>

              <div class="price-box">
                <span class="regular-price">
                  <span class="price font-weight-bold">30,200 EGP</span>
                </span>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-6 mb-3">
            <div class="content_view hvr-bob px-2 h-100 bg-white rounded">
              <a href="inner-page.php">
                <img src="images/product2.webp" alt="Product" class="w-75 d-block m-auto">

                <div class="product-label text-center font-weight-bold">
                  <span class="sale-product-icon">-10%</span>
                </div>

                <h6 class="full_desc text-dark text-center text-capitalize">Devia Ocean2 series case for iPhone XI 5.8 2019 - Clear Tea</h6>
              </a>

              <div class="rating_list_product">
                <i class="fas fa-star colorstar"></i>
                <i class="fas fa-star colorstar"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
              </div>

              <div class="price-description text-uppercase">Cash Price</div>

              <div class="price-box">
                <span class="regular-price">
                  <span class="price font-weight-bold">349 EGP</span>
                </span>

                <p class="old-price">
                  <span class="price font-weight-bold">506 EGP </span>
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-6 mb-3">
            <div class="content_view hvr-bob px-2 h-100 bg-white rounded">
              <a href="inner-page.php">
                <img src="images/product3.webp" alt="Product" class="w-75 d-block m-auto">

                <h6 class="full_desc text-dark text-center text-capitalize">Apple iPhone 11, 128GB, 4GB RAM, 4G LTE, Green</h6>
              </a>

              <div class="rating_list_product">
                <i class="fas fa-star colorstar"></i>
                <i class="fas fa-star colorstar"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
              </div>

              <div class="price-description text-uppercase">Cash Price</div>

              <div class="price-box">
                <span class="regular-price">
                  <span class="price font-weight-bold">16,999 EGP</span>
                </span>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-6 mb-3">
            <div class="content_view hvr-bob px-2 h-100 bg-white rounded">
              <a href="inner-page.php">
                <img src="images/product3.webp" alt="Product" class="w-75 d-block m-auto">

                <div class="product-label text-center font-weight-bold">
                  <span class="sale-product-icon">-10%</span>
                </div>

                <h6 class="full_desc text-dark text-center text-capitalize">Apple iPhone XS, 256GB, 4GB RAM, 4G LTE, Gold</h6>
              </a>

              <div class="rating_list_product">
                <i class="fas fa-star colorstar"></i>
                <i class="fas fa-star colorstar"></i>
                <i class="fas fa-star colorstar"></i>
                <i class="fas fa-star colorstar"></i>
                <i class="far fa-star"></i>
              </div>

              <div class="price-description text-uppercase">Cash Price</div>

              <div class="price-box">
                <span class="regular-price">
                  <span class="price font-weight-bold">27,500 EGP</span>
                </span>

                <p class="old-price">
                  <span class="price font-weight-bold">506 EGP </span>
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-6 mb-3">
            <div class="content_view hvr-bob px-2 h-100 bg-white rounded">
              <a href="inner-page.php">
                <img src="images/download.jfif" alt="Product" class="w-75 d-block m-auto">

                <h6 class="full_desc text-dark text-center text-capitalize">Apple iPhone XS Max, 256GB, 4GB RAM, 4G LTE, Space
                  Grey</h6>
              </a>

              <div class="rating_list_product">
                <i class="fas fa-star colorstar"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
              </div>

              <div class="price-description text-uppercase">Cash Price</div>

              <div class="price-box">
                <span class="regular-price">
                  <span class="price font-weight-bold">30,200 EGP</span>
                </span>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-6 mb-3">
            <div class="content_view hvr-bob px-2 h-100 bg-white rounded">
              <a href="inner-page.php">
                <img src="images/product2.webp" alt="Product" class="w-75 d-block m-auto">

                <div class="product-label text-center font-weight-bold">
                  <span class="sale-product-icon">-10%</span>
                </div>

                <h6 class="full_desc text-dark text-center text-capitalize">Devia Ocean2 series case for iPhone XI 5.8 2019 -
                  Clear Tea</h6>
              </a>

              <div class="rating_list_product">
                <i class="fas fa-star colorstar"></i>
                <i class="fas fa-star colorstar"></i>
                <i class="fas fa-star colorstar"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
              </div>

              <div class="price-description text-uppercase">Cash Price</div>

              <div class="price-box">
                <span class="regular-price">
                  <span class="price font-weight-bold">349 EGP</span>
                </span>

                <p class="old-price">
                  <span class="price font-weight-bold">506 EGP </span>
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-6 mb-3">
            <div class="content_view hvr-bob px-2 h-100 bg-white rounded">
              <a href="inner-page.php">
                <img src="images/product3.webp" alt="Product" class="w-75 d-block m-auto">

                <div class="product-label text-center font-weight-bold">
                  <span class="sale-product-icon">-10%</span>
                </div>

                <h6 class="full_desc text-dark text-center text-capitalize">Apple iPhone 11, 128GB, 4GB RAM, 4G LTE, Green</h6>
              </a>

              <div class="rating_list_product">
                <i class="fas fa-star colorstar"></i>
                <i class="fas fa-star colorstar"></i>
                <i class="fas fa-star colorstar"></i>
                <i class="fas fa-star colorstar"></i>
                <i class="fas fa-star colorstar"></i>
              </div>

              <div class="price-description text-uppercase">Cash Price</div>

              <div class="price-box">
                <span class="regular-price">
                  <span class="price font-weight-bold">16,999 EGP</span>
                </span>

                <p class="old-price">
                  <span class="price font-weight-bold">506 EGP </span>
                </p>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-6 mb-3">
            <div class="content_view hvr-bob px-2 h-100 bg-white rounded">
              <a href="#0">
                <img src="images/product3.webp" alt="Product" class="w-75 d-block m-auto">

                <h6 class="full_desc text-dark text-center text-capitalize">Apple iPhone XS, 256GB, 4GB RAM, 4G LTE, Gold</h6>
              </a>

              <div class="rating_list_product">
                <i class="fas fa-star colorstar"></i>
                <i class="fas fa-star colorstar"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
              </div>

              <div class="price-description text-uppercase">Cash Price</div>

              <div class="price-box">
                <span class="regular-price">
                  <span class="price font-weight-bold">27,500 EGP</span>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End row product -->
    </div>
    <!-- end row -->
  </div>
</div>
<!-- end container -->


<!-- Start Footer -->
<?php include 'footer.php'; ?>
<!-- End Footer -->