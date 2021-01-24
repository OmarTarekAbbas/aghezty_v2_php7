<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Template Login</title>
        <meta name="keywords" content="Buy Online, Buy in Egypt, Shop in Egypt, Online Shop, Online Store, Aghezty, Aghezty.com, Electronics, Mobiles, Tablets, Laptops, Computers, TVs, Home Appliance, Personal Care, Refrigerators, Cookers, Heaters, Accessories. Electronics Brands, Cash On Delivery, Installment, Premium Card, Ahly Visa Installment, Credit Card, Free Delivery, Agent Warranty, شراء عبر الإنترنت ، شراء في مصر ، متجر في مصر ، متجر على الإنترنت ، متجر على شبكة الإنترنت ، إلكترونيات ، هواتف محمولة ، أجهزة لوحية ، أجهزة الكمبيوتر المحمولة ، أجهزة الكمبيوتر ، تلفزيونات ، الأجهزة المنزلية ، العناية الشخصية ، ثلاجات ، طباخات ، سخانات ، اكسسوارات. العلامات التجارية الإلكترونية ، الدفع عند الاستلام ، القسط ، البطاقة المميزة ، تقسيط بطاقة التأشيرة من الأهلي ، بطاقة الائتمان ، التوصيل المجاني ، ضمان الوكيل">
        <meta name="description" content="Aghezty is the is the first and largest e-commerce website in Egypt dedicated for all types of consumer electronics, أجهزتى هو أول وأكبر موقع للتجارة الإلكترونية في مصر مخصص لجميع أنواع الإلكترونيات الاستهلاكية">
        <meta name="title" content="Buy Online, Buy in Egypt, Shop in Egypt, Online Shop, Online Store, Aghezty, Aghezty.com, Electronics, Mobiles, Tablets, Laptops, Computers, TVs, Home Appliance, Personal Care, Refrigerators, Cookers, Heaters, Accessories. Electronics Brands, Cash On Delivery, Installment, Premium Card, Ahly Visa Installment, Credit Card, Free Delivery, Agent Warranty, شراء عبر الإنترنت ، شراء في مصر ، متجر في مصر ، متجر على الإنترنت ، متجر على شبكة الإنترنت ، إلكترونيات ، هواتف محمولة ، أجهزة لوحية ، أجهزة الكمبيوتر المحمولة ، أجهزة الكمبيوتر ، تلفزيونات ، الأجهزة المنزلية ، العناية الشخصية ، ثلاجات ، طباخات ، سخانات ، اكسسوارات. العلامات التجارية الإلكترونية ، الدفع عند الاستلام ، القسط ، البطاقة المميزة ، تقسيط بطاقة التأشيرة من الأهلي ، بطاقة الائتمان ، التوصيل المجاني ، ضمان الوكيل" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <!--base css styles-->
        <link rel="stylesheet" href="{{url('assets/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{url('assets/font-awesome/css/font-awesome.min.css')}}">

        <!--page specific css styles-->

        <!--flaty css styles-->
        <link rel="stylesheet" href="{{url('css/flaty.css')}}">
        <link rel="stylesheet" href="{{url('css/flaty-responsive.css')}}">

        <link rel="shortcut icon" href="{{url('img/favicon.png')}}">
    </head>
    <body class="login-page">

        <!-- BEGIN Main Content -->
        <div class="login-wrapper">

            <!-- BEGIN Login Form -->
                {!! Form::open(['url'=>'login']) !!}
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <h3>Login to your account</h3>
                    @include('errors')
                    <hr/>
                    <div class="form-group">
                        <div class="controls">
                            {!! Form::email("email",null ,['class'=>'form-control','placeholder'=>'Email']) !!}<br>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="controls">
                            {!! Form::password('password' ,['class'=>'form-control','placeholder'=>'password']) !!}<br>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="controls">
                            {!! Form::submit('Login',['class'=>'btn btn-primary form-control']) !!}
                        </div>
                    </div>
                    <hr/>
                    <p class="clearfix">
                        <a href="{{ url('password/reset') }}" class="goto-forgot pull-left">Forgot Password?</a>
                        <!--a href="#" class="goto-register pull-right">Sign up now</a-->
                    </p>
                {!! Form::close() !!}
            <!-- END Login Form -->

        </div>
        <!-- END Main Content -->


        <!--basic scripts-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

        <script>window.jQuery || document.write('<script src="{{url('assets/jquery/jquery-2.1.4.min.js')}}"><\/script>')</script>
        <script src="{{url('assets/bootstrap/js/bootstrap.min.js')}}"></script>

        <script type="text/javascript">
            function goToForm(form)
            {
                $('.login-wrapper > form:visible').fadeOut(500, function(){
                    $('#form-' + form).fadeIn(500);
                });
            }
            $(function() {
                $('.goto-login').click(function(){
                    goToForm('login');
                });
                $('.goto-forgot').click(function(){
                    goToForm('forgot');
                });
                $('.goto-register').click(function(){
                    goToForm('register');
                });
            });
        </script>
    </body>
</html>
