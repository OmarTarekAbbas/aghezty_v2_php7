<section class="carsoul_ads my-2">
  <div class="mobile_views">
    <div class="row">
      <div class="col-md-8 col-xl-8">
        <div class="owl-one fadeOut owl-carousel owl-theme" >
          @foreach ($slides as $slide)
              
          <div class="item">
            <a href="{{$slide->ads_url}}">
              <img class="d-block w-100 rounded" src="{{$slide->image}}" alt="{{$slide->image}}">
            </a>
          </div>
          
          @endforeach
        </div>
      </div>

      <div class="col-md-4 col-xl-4 ads">
        <div class="row">
          @if (count($ads) > 1)
              
          <div class="col-md-12 col-xl-12 col-6 top_banner">
            <a href="{{$ads[0]->ads_url}}">
              <img class="rounded w-100" src="{{$ads[0]->image}}" alt="{{$ads[0]->ads_url}}">
            </a>
          </div>
          
          @endif

          @if (count($ads) > 2)

          <div class="col-md-12 col-xl-12 col-6 top_banner bottom_banner mt-3">
            <a href="{{$ads[1]->ads_url}}">
              <img class="rounded w-100" src="{{$ads[1]->image}}" alt="{{$ads[1]->ads_url}}">
            </a>
          </div>

          @endif

        </div>
      </div>
    </div>
  </div>
</section>