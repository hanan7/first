<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>شركة سهل للادوات الصحية</title>
<link href="{{asset('assets/front/css/reset.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/front/css/grid.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/front/css/style.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/front/css/animate.css')}}" rel="stylesheet" type="text/css" />
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css'>
<script>
    
$(document).scroll(function(){  
if ($(document).scrollTop() >= 550) {
       $('header').css('background','#2C3E50');
       $('header').css('transition','0.4s all ease-in-out');
    }else{  
       $('header').css('background','rgba(255,255,255,0)');
    }
 
});  


$(document).ready(function(){
        $("#nav-mobile").html($("#nav-main").html());
        $("#nav-trigger span").click(function(){
            if ($("nav#nav-mobile ul").hasClass("expanded")) {
                $("nav#nav-mobile ul.expanded").removeClass("expanded").slideUp(250);
                $(this).removeClass("open");
            } else {
                $("nav#nav-mobile ul").addClass("expanded").slideDown(250);
                $(this).addClass("open");
            }
        });
    });
    

    $(function() {
      $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {

          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top
            }, 1000);
            return false;
          }
        }
      });
    });
</script>

</head>
<body>
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
   
 <script>
  $(".slide > div:gt(0)").hide();

  setInterval(function() { 
  $('.slide > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('.slide');
  },  3000);


  new WOW().init();



</script>
</body>

</html>     