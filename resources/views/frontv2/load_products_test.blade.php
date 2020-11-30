@foreach ($products as $product)

<div class="col-md-4 col-lg-4 col-xl-4 col-6 mb-3 content_view_mobile_col6">
            <div class="card-group">
              <div class="card" style='height:500px'>
                <a href="{{route('front.home.inner',['id' => $product->product_id]) }}">
                  <img class="lazy card-img-top" style="width: auto; height: 292px; text-align:center; margin: 10px auto; display:block;" src="{{$product->main_image}}" alt="Product" class="d-block m-auto">
                  <!-- @if($product->discount > 0)
                  <div class="product-label text-center font-weight-bold">
                    <span class="sale-product-icon">{{$product->discount}} %</span>
                  </div>
                  @endif -->
                  <div class="card-body">
                    <p class="card-text text-dark text-left text-capitalize">{{$product->getTranslation('title',getCode())}}</p>
                  </div>
                </a>

                <div class="card-footer">
                  <div class="rating_list_product">
                    @for ($i = 1; $i <= 5; $i++) @if(round($product->rate() - .25) >= $i)
                      <i class="fas fa-star colorstar"></i>
                      @elseif(round($product->rate() + .25) >= $i)
                      <i class="fas fa-star-half-alt colorstar"></i>
                      @else
                      <i class="far fa-star"></i>
                      @endif
                      @endfor
                  </div>

                  <div class="price-description text-uppercase">Cash Price</div>

                  <div class="price-box">
                    <span class="regular-price">
                      <span class="price font-weight-bold">{{number_format(($product->price_after_discount > 0)?$product->price_after_discount:$product->price)}}
                        @lang('front.egp') </span>
                    </span>
                    @if($product->price_after_discount > 0)
                    <span class="old-price">
                      <span class="price font-weight-bold float-right">{{number_format($product->price)}} @lang('front.egp') </span>
                    </span>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          </div>

@endforeach
