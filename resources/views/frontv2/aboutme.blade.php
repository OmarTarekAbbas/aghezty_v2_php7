@extends('frontv2.master')
@section('content')

<!-- main content -->
<div class="main">
	<div class="mobile_views">
		<section class="service_center mt-3">
			@if (\Session::get('applocale') == 'ar')
			{!! setting('about_me') !!}
			@else
			{!! setting('about_us_en') !!}
			@endif
		</section>
	</div>
</div>
@endsection
