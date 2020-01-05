<!-- header -->
<?php include 'header.php'; ?>
<!-- end header-->
<div class="main mt-2">
  <section class="my_profile">
    <div class="mobile_views">
      <div class="my_profile_bg rounded">
        <div class="row m-0">
          <div class="col-md-12 col-lg-12 col-xl-12 col-12">
            <div class="my_profile_title text-center my-2">
              <h3 class="border-bottom border-secondary text-dark text-capitalize">My Address</h3>
            </div>
          </div>

          <div class="col-md-12 col-lg-12 col-xl-12 col-12 no_padding_mobile">
            <form class="address_accordion w-100 my-2" action="">
              <div class="accordion_add" id="accordionExample">
                <!-- Start My Address 1 -->
                <div class="card z-depth-0 bordered">
                  <div class="card-header" id="headingOne">
                    <h5 class="mb-0 d-flex">
                      <button class="btn btn-link text-center w-100" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        My Address 1
                      </button>

                      <a type="button" href="#0" class="btn btn-labeled btn-danger">
                        <span class="btn-label">
                          <i class="fas fa-times"></i>
                        </span>
                      </a>
                    </h5>
                  </div>

                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                      <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0 mb-4">
                        <div class="input-group mb-2 m-auto w-75">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
                          </div>
                          <select class="form-control .dropdown-dark">
                            <option value="Governorate">Governorate</option>
                            <option value="Cairo">Cairo</option>
                            <option value="Giza">Giza</option>
                            <option value="Alexandria">Alexandria</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0 mb-4">
                        <div class="input-group mb-2 m-auto w-75">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
                          </div>
                          <select class="form-control .dropdown-dark">
                            <option value="Governorate">City</option>
                            <option value="Nasrcity">Nasrcity</option>
                            <option value="Masr El Gdida">Masr El Gdida</option>
                            <option value="6 Octobar">6 Octobar</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0 mb-4">
                        <div class="input-group mb-2 w-75 m-auto">
                          <div class="input-group-prepend ">
                            <div class="input-group-text"><i class="fas fa-keyboard"></i></div>
                            <textarea class="p-3 w-100" placeholder="My Address" cols="150" rows="2"></textarea>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0">
                        <button type="submit" class="btn_save btn btn-secondary text-secondary bg-light mb-2 m-auto d-block w-75 text-capitalize">Save</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End My Address 1 -->

                <!-- Start Add New Address -->
                <div class="card z-depth-0 bordered">
                  <div class="card-header" id="headingThree">
                    <h5 class="mb-0 d-flex">
                      <button class="btn btn-link collapsed text-center w-100" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Add New Address
                      </button>
                    </h5>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                    <div class="card-body">
                      <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0 mb-4">
                        <div class="input-group mb-2 m-auto w-75">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
                          </div>
                          <select class="form-control .dropdown-dark">
                            <option value="Governorate">Governorate</option>
                            <option value="Cairo">Cairo</option>
                            <option value="Giza">Giza</option>
                            <option value="Alexandria">Alexandria</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0 mb-4">
                        <div class="input-group mb-2 m-auto w-75">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-map-marker-alt"></i></div>
                          </div>
                          <select class="form-control .dropdown-dark">
                            <option value="Governorate">City</option>
                            <option value="Nasrcity">Nasrcity</option>
                            <option value="Masr El Gdida">Masr El Gdida</option>
                            <option value="6 Octobar">6 Octobar</option>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0 mb-4">
                        <div class="input-group mb-2 w-75 m-auto">
                          <div class="input-group-prepend ">
                            <div class="input-group-text"><i class="fas fa-keyboard"></i></div>
                            <textarea class="p-3 w-100" placeholder="My Address" cols="150" rows="2"></textarea>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0">
                        <button type="submit" class="btn_save btn btn-secondary text-secondary bg-light mb-2 m-auto d-block w-75 text-capitalize">Save</button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Add New Address -->
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- footer -->
<?php include 'footer.php'; ?>
<!-- end footer-->