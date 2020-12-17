@extends('frontv2.master')
@section('content')

<!-- main content -->
<div class="main">
    <div class="mobile_views">
        <section class="service_center mt-3">
            <div style="text-align: center;">
                <h3 >@lang("front.visa_online")</h3>
                <hr style="border-top: 1px solid rgb(248, 170, 77);">
                <video width="400" controls style="width: 70%;">
                    <source src="{{url(setting('visa_online') )}}" type="video/mp4">
                    <source src="{{url(setting('visa_online') )}}" type="video/ogg">
                </video>
            </div>
        </section>
    </div>
</div>
@endsection
