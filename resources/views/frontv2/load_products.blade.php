@foreach ($products as $product)

<div class="col-md-3 col-6 mb-3">
  <div class="content_view hvr-bob px-2 h-100 bg-white rounded">
    <a href="inner-page.php">
      <img src="{{$product->main_image}}" alt="Product" class="w-75 d-block m-auto">

      <h6 class="full_desc text-dark text-center text-capitalize">{{$product->title}}</h6>
    </a>

    <div class="rating_list_product">
        @for ($i = 1; $i <= 5; $i++)
          @if(round($product->rate() - .25) >= $i)
            <i class="fas fa-star colorstar"></i>
          @elseif(round($product->rate() + .25) >= $i)
            <i class="fas fa-star-half-alt colorstar"></i>
          @else
            <i class="fas fa-star"></i>
          @endif
        @endfor
    </div>

    <div class="price-description text-uppercase">Cash Price</div>
    <div class="price-box">
      <span class="regular-price">
        <span class="price font-weight-bold">{{$product->discount?$product->price_after_discount:$product->price}}</span>
      </span>
    </div>
  </div>
</div>

@endforeach
