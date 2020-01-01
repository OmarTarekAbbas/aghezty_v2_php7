@foreach ($products as $product)
<div class="item col-xs-4 col-sm-12 col-lg-12 list-group-item">
        <div class="row">
            <div class="col-6">
                <a href="{{url('clients/product/'.$product->id)}}" class="thumbnail">
                    <img class="group list-group-image" src="{{url($product->main_image)}}" height="150px"
                        alt="" />
                    <div class="ribbon">
                        @if ($product->discount)
                        <span>{{$product->discount}}%</span>
                        @endif
                    </div>
                </a>
            </div>
            <div class="col-6">
                <div class="caption text-right">
                    <h5 class="group inner list-group-item-heading">
                        {{$product->getTranslation('title',getCode())}}</h5>
                    <!-- <div>3/9/2019</div> -->
                    @if ($product->discount)
                    <span style="color: #00daff; font-weight: 700;">{{$product->price_after_discount}}<span
                        class="money-sign" style="position: relative; left: 1%;">LE</span></span>
                    <del style="color: #CCC; margin-left: 7px;">{{$product->price}}<span class="money-sign"
                            style="position: relative; left: 1%;">LE</span></del>
                    @else
                    <span style="color: #00daff; font-weight: 700;">{{$product->price}}<span
                        class="money-sign" style="position: relative; left: 1%;">LE</span></span>
                    @endif
                    <div class="star">
                        @for ($i = 0; $i < $product->rate(); $i++)
                            <i class="far fa-star active-rate"></i>
                        @endfor
                        @for ($i = 0; $i < 5-$product->rate(); $i++)
                            <i class="far fa-star"></i>
                        @endfor
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
