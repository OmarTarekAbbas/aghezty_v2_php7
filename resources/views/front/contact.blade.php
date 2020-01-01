@extends('front.layout')
@section('page_title')
    @lang('front.contact')
@stop
@section('content')
<style>
    body {overflow: hidden;}

.page_title h4 {
    display: none;
}

.mapouter {
    position: relative;
    text-align: right;
    height: auto;
    width: 100%;
}

.gmap_canvas {
    overflow: hidden;
    background: none !important;
    height: auto;
    width: 100%;
}
.call-center{
    width: 90%;
}

</style>
<!-- main content -->
<div class="main">
        <div class="container">
            <div class="call-center">
                <a href="tel:{{ setting('phone') }}">
                    <span>{{ setting('phone') }}</span>
                    <i class="fas fa-phone fa-2x"></i>
                </a>
            </div>

            <div class="call-center {{ar_en()}}">
                <a href="mailto:{{ setting('mail') }}">
                    <span>{!! setting_2('address') !!}</span>
                    <i class="far fa-envelope fa-2x"></i>
                </a>
            </div>
            <div class="contact-border"></div>

            <div class="mapouter">
                <h2 class="text-center">@lang('front.found')</h2>
                <div class="gmap_canvas">
                    {{-- <iframe src="https://www.google.com/maps?q={{explode(',',setting('location'))[0]}},{{explode(',',setting('location'))[1]}}&hl=es;z=20;&amp;output=embed" width="100%" frameborder="0" style="border:0;margin-bottom:30px;height:600px" allowfullscreen></iframe>
                    <a href="https://www.embedgooglemap.net/blog/best-wordpress-themes/"></a> --}}
                    <div id="map"  style="height: 500px;overflow:hidden"></div>
                </div>
            </div>

            <div class="contact-border"></div>
            @if(Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>@lang('front.success')!</strong> {{Session::get('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @include('errors')
            <form action="{{url('clients/contact')}}" method="post">
                {{ csrf_field() }}
                <div class="wrapper centered" style="width:100%">
                    <article class="letter">
                        <div class="side">
                            <h1 class="text-center">@lang('front.contact')</h1>
                            <p>
                                <textarea class="contact-desc text-right" name="message" placeholder="@lang('front.auth.message')" ></textarea>
                            </p>
                        </div>
                        <div class="side">
                            <p>
                                <input class="contact-input" name="phone" type="tel" placeholder="@lang('front.auth.phone')" required>
                            </p>
                            <p>
                                <input class="contact-input" name="email" type="email" placeholder=" @lang('front.auth.email')" required>
                            </p>
                            <p>
                                <button class="contact-btn" id="">@lang('front.send')</button>
                            </p>
                        </div>
                    </article>
                    <div class="envelope front"></div>
                    <div class="envelope back"></div>
                </div>
                <p class="result-message centered">شكرا لرسالتك</p>
            </form>
        </div>
    </div>
@stop

@section('script')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCVMkBopYgU1husR7s-iO2ngqirxVSZdw8"></script>
<script type="text/javascript" src="{{url('js/map.js')}}"></script>
<script>
google.maps.event.addDomListener(window, 'load', initMap('{{explode(',',setting('location'))[0]}}' , '{{explode(',',setting('location'))[0]}}'));
</script>
@endsection
