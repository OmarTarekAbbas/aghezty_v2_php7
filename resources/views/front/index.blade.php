<!DOCTYPE html>
<html lang="en" style="height:100%;">
<head>
    <meta charset="utf-8">
    <!--IE Compatibility Meta-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile Meta-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aghezty</title>
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/main-style.css')}}">
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
      <![endif]-->

</head>
<style>
    body {
    /* background-image: linear-gradient(rgba(255, 255, 255, 0) ,#4c4a4a); */
    background-image: linear-gradient(rgb(243, 229, 184) ,#2c1b4ad9);
    }
</style>

<body>
    <div class="welcome_page">
        <div class="logo">
            <img src="{{asset('front/img/logo_3.png')}}" alt="اجهزتى">
        </div>
        <!--<h2>اجهزتى</h2>-->
        <a href="{{url('clients/homev2')}}" class="wow pulse" data-wow-delay="300ms" data-wow-iteration="infinite" data-wow-duration="1.5s">
            <i class="fas fa-angle-double-right fa-2x"></i>
        </a>

        <a class="aghezty_domain" href="{{url('clients/home')}}">
            <h6>www.aghezty.me</h6>
        </a>

        <h6>تصميم وتطوير</h6>
        <img src="{{asset('front/img/ivas.png')}}" alt="ivas">
    </div>

    <script src="{{asset('front/js/wow.min.js')}}"></script>
    <script>
        new WOW().init();

    </script>
