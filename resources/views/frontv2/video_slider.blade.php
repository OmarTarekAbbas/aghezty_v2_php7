<section class="carsoul_ads my-2">
	<div class="mobile_views">
		<div class="row">
			<div class="col-md-8 col-xl-8">
				<div class="owl-one fadeOut owl-carousel owl-theme">
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

          @if(advertisements(1))
					<div class="col-md-12 col-xl-12 col-6 top_banner">
						<a href="{{advertisements(1)->ads_url}}">
							<img class="rounded w-100" src="{{advertisements(1)->image}}" alt="{{advertisements(1)->ads_url}}">
						</a>
					</div>
          @endif

          @if(advertisements(2))
					<div class="col-md-12 col-xl-12 col-6 top_banner bottom_banner mt-3">
						<a href="{{advertisements(2)->ads_url}}">
							<img class="rounded w-100" src="{{advertisements(2)->image}}" alt="{{advertisements(2)->ads_url}}">
						</a>
					</div>

					@endif
				</div>
			</div>
		</div>
	</div>
</section>
