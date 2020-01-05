<!-- header -->
<?php include 'header.php'; ?>
<!-- end header-->

<style>
  .padding_right_oldPassword {
    padding-right: 44px;
  }

  .padding_right_newPassword {
    padding-right: 35px;
  }

  .product_image {
    width: 15%;
  }
</style>

<div class="main mt-2">
  <section class="my_profile">
    <div class="mobile_views">
      <div class="my_profile_bg rounded">
        <div class="row m-0">
          <div class="col-md-12 col-lg-12 col-xl-12 col-12">
            <div class="my_profile_title text-center my-2">
              <h3 class="border-bottom border-secondary text-dark text-capitalize">My Orders</h3>
            </div>
          </div>

          <div class="col-md-12 col-lg-12 col-xl-12 col-12 no_padding_mobile">
            <div class="accordion_add w-100 my-3" id="accordionExample_2">
              <!-- Start My Order 1 -->
              <div class="card z-depth-0 bordered">
                <div class="card-header" id="headingTwo">
                  <h5 class="mb-0">
                    <button class="btn btn-link text-center w-100" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                      Order 1
                    </button>
                  </h5>
                </div>

                <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample_2">
                  <div class="card-body">
                    <div class='table-responsive'>
                      <!--Table 1-->
                      <table id="tablePreview" class="table table-sm table-hover">
                        <!--Table body-->
                        <div class="table_title">
                          <h3>Item 1</h3>
                        </div>

                        <tbody>
                          <tr>
                            <th>Product Name</th>
                            <td>fridge-LG-The classic Cascade 220 Wool is the perfect combination of affordability, quality and versatility that can be used for a wide range of projects. Each hank of this worsted weight 100</td>
                          </tr>

                          <tr>
                            <th>Product Image</th>
                            <td>
                              <img class="product_image" src="images/products/fridge_1.jpg" alt="fridge">
                            </td>
                          </tr>

                          <tr>
                            <th>Quantity</th>
                            <td>1</td>
                          </tr>

                          <tr>
                            <th>Price</th>
                            <td>1450 <span class="currency_shortcuts"> LE</span></td>
                          </tr>

                          <tr>
                            <th>Discount</th>
                            <td>10 <span class="currency_shortcuts"> %</span></td>
                          </tr>

                          <tr>
                            <th>Total Price</th>
                            <td>1450 <span class="currency_shortcuts"> LE</span></td>
                          </tr>
                        </tbody>
                        <!--Table body-->
                      </table>
                      <!--Table 1-->

                      <div class="w-100 border-bottom border-dark mt-4"></div>

                      <!--Table 2-->
                      <table id="tablePreview" class="table table-sm table-hover">
                        <!--Table body-->
                        <div class="table_title">
                          <h3>Item 2</h3>
                        </div>

                        <tbody>
                          <tr>
                            <th>Product Name</th>
                            <td>fridge-LG-The classic Cascade 220 Wool is the perfect combination of affordability, quality and versatility that can be used for a wide range of projects</td>
                          </tr>

                          <tr>
                            <th>Product Image</th>
                            <td>
                              <img class="product_image" src="images/products/fridge_2.jpg" alt="fridge">
                            </td>
                          </tr>

                          <tr>
                            <th>Quantity</th>
                            <td>3</td>
                          </tr>

                          <tr>
                            <th>Price</th>
                            <td>1450 <span class="currency_shortcuts"> LE</span></td>
                          </tr>

                          <tr>
                            <th>Discount</th>
                            <td>10 <span class="currency_shortcuts"> %</span></td>
                          </tr>

                          <tr>
                            <th>Total Price</th>
                            <td>4350 <span class="currency_shortcuts"> LE</span></td>
                          </tr>
                        </tbody>
                        <!--Table body-->
                      </table>
                      <!--Table 2-->
                    </div>

                    <div class="row">
                      <div class="col-xl-12">
                        <aside class="cart-aside w-100">
                          <div class="summary w-100 p-3 my-3 border border-secondary bg-light text-dark">
                            <div class="summary-total-items text-center">
                              <span class="total-items"></span> Order 1
                            </div>

                            <div class="summary-subtotal">
                              <div class="subtotal-title text-left w-50 float-left">Total Price</div>
                              <div class="subtotal-value final-value text-right w-50 float-right item-price">1450</div>
                            </div>

                            <div class="summary-subtotal">
                              <div class="subtotal-title text-left w-50 float-left">Shipping Amount</div>
                              <div class="subtotal-value final-value text-right w-50 float-right">50</div>
                            </div>
                            <div class="summary-subtotal">
                              <div class="subtotal-title text-left w-50 float-left"> Total Price After Shipping</div>
                              <div class="subtotal-value final-value text-right w-50 float-right item-total">1500</div>
                            </div>
                            <div class="summary-subtotal">
                              <div class="subtotal-title text-left w-50 float-left">My Addresses</div>
                              <div class="final-value text-right w-50 float-right">Nasrcity, Cairo, Egypt</div>
                            </div>
                            <div class="summary-subtotal">
                              <div class="subtotal-title text-left w-50 float-left">Status</div>
                              <div class="final-value text-right w-50 float-right">Pending</div>
                            </div>
                          </div>
                        </aside>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End My Order 1 -->

              <!-- Start My Order 2 -->
              <div class="card z-depth-0 bordered">
                <div class="card-header" id="headingFour">
                  <h5 class="mb-0">
                    <button class="btn btn-link text-center w-100" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                      Order 2
                    </button>
                  </h5>
                </div>

                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample_2">
                  <div class="card-body">
                    <div class='table-responsive'>
                      <!--Table 1-->
                      <table id="tablePreview" class="table table-sm table-hover">
                        <!--Table body-->
                        <div class="table_title">
                          <h3>Item 1</h3>
                        </div>

                        <tbody>
                          <tr>
                            <th>Product Name</th>
                            <td>Apple iPhone XS Max, 256GB, 4GB RAM, 4G LTE, Space Grey</td>
                          </tr>

                          <tr>
                            <th>Product Image</th>
                            <td>
                              <img class="product_image" src="images/product8.jfif" alt="Mobile">
                            </td>
                          </tr>

                          <tr>
                            <th>Quantity</th>
                            <td>2</td>
                          </tr>

                          <tr>
                            <th>Price</th>
                            <td>30,200 <span>LE</span></td>
                          </tr>

                          <tr>
                            <th>Discount</th>
                            <td>15 <span>%</span></td>
                          </tr>

                          <tr>
                            <th>Total Price</th>
                            <td>60,400 <span>LE</span></td>
                          </tr>
                        </tbody>
                        <!--Table body-->
                      </table>
                      <!--Table 1-->

                      <div class="w-100 border-bottom border-dark mt-4"></div>

                      <!--Table 2-->
                      <table id="tablePreview" class="table table-sm table-hover">
                        <!--Table body-->
                        <div class="table_title">
                          <h3>Item 2</h3>
                        </div>

                        <tbody>
                          <tr>
                            <th>Product Name</th>
                            <td>Beko Front Loading Digital Washing Machine</td>
                          </tr>

                          <tr>
                            <th>Product Image</th>
                            <td>
                              <img class="product_image" src="images/products/4.jpg" alt="fridge">
                            </td>
                          </tr>

                          <tr>
                            <th>Quantity</th>
                            <td>1</td>
                          </tr>

                          <tr>
                            <th>Price</th>
                            <td>6,680 <span>LE</span></td>
                          </tr>

                          <tr>
                            <th>Discount</th>
                            <td>0 <span>%</span></td>
                          </tr>

                          <tr>
                            <th>Total Price</th>
                            <td>6,680 <span>LE</span></td>
                          </tr>
                        </tbody>
                        <!--Table body-->
                      </table>
                      <!--Table 2-->

                      <div class="w-100 border-bottom border-dark mt-4"></div>

                      <!--Table 3-->
                      <table id="tablePreview" class="table table-sm table-hover">
                        <!--Table body-->
                        <div class="table_title">
                          <h3>Item 3</h3>
                        </div>

                        <tbody>
                          <tr>
                            <th>Product Name</th>
                            <td>Sony PlayStation 4 Slim, 1TB, 2 Controller, Black</td>
                          </tr>

                          <tr>
                            <th>Product Image</th>
                            <td>
                              <img class="product_image" src="images/products/3.jpg" alt="fridge">
                            </td>
                          </tr>

                          <tr>
                            <th>Quantity</th>
                            <td>4</td>
                          </tr>

                          <tr>
                            <th>Price</th>
                            <td>7,100 <span>LE</span></td>
                          </tr>

                          <tr>
                            <th>Discount</th>
                            <td>10 <span>%</span></td>
                          </tr>

                          <tr>
                            <th>Total Price</th>
                            <td>28,400 <span>LE</span></td>
                          </tr>
                        </tbody>
                        <!--Table body-->
                      </table>
                      <!--Table 3-->
                    </div>

                    <div class="row">
                      <div class="col-xl-12">
                        <aside class="cart-aside w-100">
                          <div class="summary w-100 p-3 my-3 border border-secondary bg-light text-dark">
                            <div class="summary-total-items text-center">
                              <span class="total-items"></span> Order 2
                            </div>

                            <div class="summary-subtotal">
                              <div class="subtotal-title text-left w-50 float-left">Total Price</div>
                              <div class="subtotal-value final-value text-right w-50 float-right item-price">95,480</div>
                            </div>

                            <div class="summary-subtotal">
                              <div class="subtotal-title text-left w-50 float-left">Shipping Amount</div>
                              <div class="subtotal-value final-value text-right w-50 float-right">50</div>
                            </div>
                            <div class="summary-subtotal">
                              <div class="subtotal-title text-left w-50 float-left"> Total Price After Shipping</div>
                              <div class="subtotal-value final-value text-right w-50 float-right item-total">10,0000</div>
                            </div>
                            <div class="summary-subtotal">
                              <div class="subtotal-title text-left w-50 float-left">My Addresses</div>
                              <div class="final-value text-right w-50 float-right">Mohandsen, Giza, Egypt</div>
                            </div>
                            <div class="summary-subtotal">
                              <div class="subtotal-title text-left w-50 float-left">Status</div>
                              <div class="final-value text-right w-50 float-right">Arrive</div>
                            </div>
                          </div>
                        </aside>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End My Order 2 -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- footer -->
<?php include 'footer.php'; ?>
<!-- end footer-->