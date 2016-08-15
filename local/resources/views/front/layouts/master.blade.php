<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>شركة سهل للأدوات الصحية</title>
    <link rel='stylesheet' href="{{asset('assets/front/css/bootstrap.min.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/front/css/bootstrap-rtl.css')}}" />
    <link rel='stylesheet' href="{{asset('assets/front/css/font-awesome.min.css')}}"/>
    <link rel='stylesheet' href="{{asset('assets/front/css/style.css')}}"/>
    <link rel='stylesheet' href="{{asset('assets/front/css/media.css')}}"/>
    <link rel='stylesheet' href="{{asset('assets/front/css/defult-theme.css')}}"/>
    <link rel='stylesheet' href="{{asset('assets/front/css/animate.css')}}"/>
    <!--<link href='https://fonts.googleapis.com/css?family=Amiri:400,700&subset=arabic,latin' rel='stylesheet'>-->
    <!--<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,700italic' >-->

</head>
    
<body>
 @if(Session::has('info'))
    <script>alert("تم ارسال الرسالة بنجاح")</script>
    @endif
  <!--Start Color Box-->
  <section class="color-box hidden-xs">
    <div class="colors">
        <div class="color-head">
            <h4>Color Option</h4>
        </div>
         <ul class="list-unstyled">
            <li data-value="css/defult-theme.css"></li>
            <li data-value="css/theme1.css"></li>
            <li data-value="css/theme2.css"></li>
            <li data-value="css/theme3.css"></li>
            <li data-value="css/theme4.css"></li>
            <li data-value="css/theme5.css"></li>
            <li data-value="css/theme6.css"></li>
            <li data-value="css/theme7.css"></li>
            <li data-value="css/theme8.css"></li>
            <li data-value="css/theme9.css"></li>
            <li data-value="css/theme10.css"></li>
        </ul>
    </div>
    <div class="gear-check">
            <i class="fa fa-spin fa-cog fa-2x"></i>
    </div>
  </section>
  <!-- Start Header -->
@include('front.layouts.header')
<!-- End Header -->
<div class="clear"></div>
<!-- Start Wrap -->
    @yield('content')
<!-- End Wrap -->
<div class="clear"></div>

<!-- Start Footer -->
@include('front.layouts.footer')
<!-- End Footer -->

 <div id="scroll-top">
         <i class="fa fa-chevron-up fa-2x"></i>
    </div>
    <!-- LOADING PAGE-->
            <section class="load-page">
                <div class="sk-circle">
                    <div class="sk-circle1 sk-child"></div>
                    <div class="sk-circle2 sk-child"></div>
                    <div class="sk-circle3 sk-child"></div>
                    <div class="sk-circle4 sk-child"></div>
                    <div class="sk-circle5 sk-child"></div>
                    <div class="sk-circle6 sk-child"></div>
                    <div class="sk-circle7 sk-child"></div>
                    <div class="sk-circle8 sk-child"></div>
                    <div class="sk-circle9 sk-child"></div>
                    <div class="sk-circle10 sk-child"></div>
                    <div class="sk-circle11 sk-child"></div>
                    <div class="sk-circle12 sk-child"></div>
                </div>
            </section>
    
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
     <script src="{{asset('assets/front/js/jquery-1.12.1.min.js')}}"></script>
     <script src="{{asset('assets/front/js/bootstrap.min.js')}}"></script>
     <script src="{{asset('assets/front/js/plugins.js')}}"></script>
     <script src="{{asset('assets/front/js/wow.min.js')}}"></script>
     <script>new WOW().init();</script>
     <script src="{{asset('assets/front/js/jquery.nicescroll.js')}}"></script>
</body>
</html>
