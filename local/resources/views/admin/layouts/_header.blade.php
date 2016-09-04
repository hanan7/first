   <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="index.html">
                        </a>
                    <div class="menu-toggler sidebar-toggler">
                        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
          
                <div class="page-top">
                 <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                         
                            <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-bell"></i>
                                    <span class="badge badge-default">{{-- $order_num --}}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="external">
                                        <h3>لديك
                                            <span class="bold"> {{-- $order_num --}} </span>من الطلبيات</h3>
                                        <a href="{{url('orders/all-orders')}}">شاهد الكل</a>
                                    </li>
                                    <li>
                                        <div style="position: relative; overflow: hidden; width: auto; height: 250px;" class="slimScrollDiv">
                                            <ul data-initialized="1" class="dropdown-menu-list scroller" style="height: 250px; overflow: hidden; width: auto;" data-handle-color="#637283">
                                        {{--    @foreach($orders as $order)
                                            @if($order->flag==1)
                                            <li>
                                                <a href="javascript:;">
                                                    <span class="time">{{$order->check_date}}</span>
                                                    <span class="details">
                                                        <span class="label label-sm label-icon label-success">
                                                            <i class="fa fa-plus"></i>
                                                        </span> طلبية جديدة : {{$order->name}}</span>
                                                </a>
                                            </li>
                                             @endif
                                            @endforeach --}}
                                           
                                        </ul><div style="background: rgb(99, 114, 131) none repeat scroll 0% 0%; width: 7px; position: absolute;
                                         top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; left: 1px;" class="slimScrollBar"></div><div style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; left: 1px;" class="slimScrollRail"></div></div>
                                    </li>
                                </ul>
                            </li>
                       
                            <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <i class="icon-envelope-open"></i>
                                    <span class="badge badge-default"> {{$msg_num}} </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="external">
                                        <h3>لديك
                                            <span class="bold"> {{$msg_num}} </span>من رسايل</h3>
                                        <a href="{{URL('msgs/admin-msgs')}}">مشاهدة الكل</a>
                                    </li>
                                    <li>
                                        <div style="position: relative; overflow: hidden; width: auto; height: 275px;" class="slimScrollDiv"><ul data-initialized="1" class="dropdown-menu-list scroller" style="height: 275px; overflow: hidden; width: auto;" data-handle-color="#637283">
                                        @foreach($msgs as $msg)
                                        @if($msg->flag=='0')
                                            <li>
                                                <a href="#">
                                                    <span class="photo">
                                                       
                                                    <span class="subject">
                                                        <span class="from"> اسم الرمرسل اليه: {{$msg->name }} </span>
                                                       
                                                    </span>
                                                    <span class="message"> محتوى الرسالة :{{$msg->content }} ... </span>
                                                </a>
                                            </li>
                                            @endif
                                        @endforeach 
                                        <div style="background: rgb(99, 114, 131) none repeat scroll 0% 0%; width: 7px; position: absolute; top: 0px; opacity: 0.4; display: block; border-radius: 7px; z-index: 99; left: 1px;" class="slimScrollBar"></div><div style="width: 7px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 7px; background: rgb(234, 234, 234) none repeat scroll 0% 0%; opacity: 0.2; z-index: 90; left: 1px;" class="slimScrollRail"></div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                  
                                    <span class="username username-hide-on-mobile"> {{Auth::guard('admins')->user()->name}}</span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="{{URL('settings/profile')}}">
                                            <i class="icon-user"></i> بيانات المستخدم </a>
                                    </li>
                                    <li>
                                        <a href="{{URL('admin/logout')}}">
                                            <i class="icon-key"></i> تسجيل الخروج </a>
                                    </li>

                                   
                                </ul>
                            </li>
                         
                        
                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                </div>
                <!-- END PAGE TOP -->
            </div>
          
        </div>
