@extends('frontv2.master')
@section('content')

<!-- main content -->
<div class="main">
	<div class="mobile_views">
    <!-- Start Image Cover -->
    <div>
            <div class="list_cover">
              @if(setting('contact_offer'))
              <img class="w-100 rounded" src="{{url(setting('service_offer'))}}" alt="Cover" title="Apple" style="height: auto !important">
              @else
              <img class="w-100 rounded" src="{{url(setting('list_banner'))}}" alt="Cover" title="Apple" style="height: auto !important">
              @endif
            </div>
      </div>
    <!-- End Image Cover -->
		<section class="service_center mt-3">
			{!! setting('service_center') !!}
		</section>
	</div>
</div>
@endsection
