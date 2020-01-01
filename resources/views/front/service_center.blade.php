@extends('front.layout')
@section('page_title')
    @lang('front.service_center')
@stop
@section('content')
  <!-- main content -->
<div class="main">
    <div class="container">
        <section class="service_center">
           {!! setting('service_center') !!}
        </section>
    </div>
</div>
@stop
@section('script')
<script>

</script>
@endsection
