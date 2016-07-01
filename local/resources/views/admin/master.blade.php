<!DOCTYPE html>

<html lang="en" dir="rtl" >
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>@yield('title')</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />  
        <link href="{{asset('assets/admin/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/global/plugins/simple-line-icons/simple-line-icons.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/global/plugins/bootstrap/css/bootstrap-rtl.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/global/plugins/uniform/css/uniform.default.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/global/plugins/bootstrap-switch/css/bootstrap-switch-rtl.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="{{asset('assets/admin/global/css/components-rtl.min.css')}}" rel="stylesheet" id="style_components" type="text/css" />
        <link href="{{asset('assets/admin/global/css/plugins-rtl.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="{{asset('assets/admin/layouts/layout2/css/layout-rtl.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('assets/admin/layouts/layout2/css/themes/blue-rtl.min.css')}}" rel="stylesheet" type="text/css" id="style_color" />
        <link href="{{asset('assets/admin/layouts/layout2/css/custom-rtl.min.css')}}" rel="stylesheet" type="text/css" />
        @yield('styles')
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /><style type="text/css">
            .jqstooltip { 
                position: absolute;left: 
                    0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style></head>
    <!-- END HEAD --> </head>
    <!-- END HEAD -->

    <body  class="page-sidebar-closed-hide-logo page-container-bg-solid page-md page-header-fixed">
        <!-- BEGIN HEADER -->
        @include('admin.layouts._header')
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container" >
            <!-- BEGIN SIDEBAR -->
            @include('admin.layouts._sidebar')
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
     
            <!-- BEGIN SIDEBAR -->
           
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
            
                <div style="min-height:1434px" class="page-content">
                 @yield("content-title")
                    <div class="page-bar">
                        @yield("content-navigat")
                    </div>
                 @yield('content')
                    
                </div>
                
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
       
            <!-- END QUICK SIDEBAR -->
       
          
    
        
            <!-- END QUICK SIDEBAR -->
       
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
    </div>
       @include('admin.layouts._footer')
        <!-- END FOOTER -->
        <!--[if lt IE 9]>
<script src="{{asset('assets/global/plugins/respond.min.js')}}"></script>
<script src="{{asset('assets/global/plugins/excanvas.min.js')}}"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
         
        <script src="{{asset('assets/admin/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/global/plugins/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/global/plugins/js.cookie.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/global/plugins/jquery.blockui.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/global/plugins/uniform/jquery.uniform.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
     @yield('layoutscripts')
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="{{asset('assets/admin/layouts/layout2/scripts/layout.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/layouts/layout2/scripts/demo.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/layouts/global/scripts/quick-sidebar.min.js')}}" type="text/javascript"></script>
        @yield('levelscripts')
        <!-- END THEME LAYOUT SCRIPTS -->
        <script type="text/javascript">
    $(document).ready(function() {
        var d = window.location.href;
        var menucoun = 1;
        $('ul li').each(function() {
            var t = $(this);
            var x = t.find('a').attr('href');
           
           /* if (x == d && $(this).attr('class') == 'start') {
                $('.active').removeClass('active');
                $(this).addClass('active');
                return false;
            }*/
			
			
            if (x==d || x!="" && (d.indexOf(x+"/edit") > -1 || d.indexOf(x+"/create") > -1)) {
            	
            	if(!$(this).parent("ul").hasClass('sub-menu')){
            		
            		 $(this).addClass('active open');
            		 $(this).find('a').append('<span class="selected"></span>');
            		 return false;
            	}else{
            		 $(this).parent('ul').parent('li').addClass('active open');
                    $(this).parent('ul').parent('li').children('a').children('span.arrow').addClass('open');
                     $(this).parent('ul').parent('li').find('a').append('<span class="selected"></span>');
                    return false;
            	}
               
                
            }
        });
    });
</script>

    </body>

</html>