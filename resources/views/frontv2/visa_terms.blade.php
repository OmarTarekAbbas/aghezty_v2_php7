@extends('frontv2.master')
@section('content')

<!-- main content -->
<div class="main">
	<div class="mobile_views">
		<section class="service_center mt-3">
			@if (\Session::get('applocale') == 'ar')
			{!! setting('visa_terms_ar') !!}
			@else
			{!! setting('visa_terms') !!}
			@endif
		</section>
	</div>
</div>
@endsection
