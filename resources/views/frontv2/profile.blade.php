<!-- header -->
<?php include 'header.php'; ?>
<!-- end header-->

<div class="main mt-2">
  <section class="my_profile">
    <div class="mobile_views">
      <div class="my_profile_bg rounded">
        <div class="row m-0">
          <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0 mt-3">
            <div class="my_profile_title text-center">
              <h3 class="border-bottom border-secondary text-dark">My Profile</h3>
            </div>
          </div>

          <div class="col-md-12 col-lg-12 col-xl-12 col-12 px-0 mt-3">
            <!-- Start Upload Image -->
            <?php include 'upload_img.php'; ?>
            <!-- End Upload Image -->
          </div>

          <form class="profile_accordion w-100 my-5" action="">
            <div class="col-md-12 col-lg-12 col-xl-12 col-12 mb-4">
              <label class="sr-only" for="inlineFormInputGroupNameProfile">Name</label>
              <div class="input-group mb-2 m-auto w-75">
                <div class="input-group-prepend d-none d-sm-block">
                  <div class="input-group-text ">Name</div>
                </div>
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-user"></i></div>
                </div>
                <input type="text" class="form-control text-center" id="inlineFormInputGroupNameProfile" placeholder="Name">
              </div>
            </div>

            <div class="col-md-12 col-lg-12 col-xl-12 col-12 mb-4">
              <label class="sr-only" for="inlineFormInputGroupEmailProfile">Email</label>
              <div class="input-group mb-2 m-auto w-75">
                <div class="input-group-prepend d-none d-sm-block">
                  <div class="input-group-text">Email</div>
                </div>
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-at"></i></div>
                </div>
                <input type="text" class="form-control text-center" id="inlineFormInputGroupEmailProfile" placeholder="Email">
              </div>
            </div>

            <div class="col-md-12 col-lg-12 col-xl-12 col-12 mb-4">
              <label class="sr-only" for="inlineFormInputGroupMobileProfile">Mobile</label>
              <div class="input-group mb-2 m-auto w-75">
                <div class="input-group-prepend d-none d-sm-block">
                  <div class="input-group-text">Mobile</div>
                </div>
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-mobile-alt"></i></div>
                </div>
                <input type="text" class="form-control text-center" id="inlineFormInputGroupMobileProfile" placeholder="Mobile">
              </div>
            </div>

            <div class="col-md-12 col-lg-12 col-xl-12 col-12 mb-4">
              <label class="sr-only" for="inlineFormInputGroupPhoneProfile">Phone</label>
              <div class="input-group mb-2 m-auto w-75">
                <div class="input-group-prepend d-none d-sm-block">
                  <div class="input-group-text">Phone</div>
                </div>
                <div class="input-group-prepend">
                  <div class="input-group-text"><i class="fas fa-tty"></i></div>
                </div>
                <input type="text" class="form-control text-center" id="inlineFormInputGroupPhoneProfile" placeholder="Phone">
              </div>
            </div>

            <div class="col-md-12 col-lg-12 col-xl-12 col-12">
              <button type="submit" class="btn_save btn btn-secondary text-white mb-2 m-auto d-block w-75 text-capitalize">Save</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- footer -->
<?php include 'footer.php'; ?>
<!-- end footer-->