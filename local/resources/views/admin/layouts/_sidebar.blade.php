    <div class="page-sidebar-wrapper">
                <div class="page-sidebar navbar-collapse collapse">
                    <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu  page-sidebar-menu-compact" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200"> 
                        <li class="nav-item start">
                            <a href="{{URL('admin')}}" class="nav-link ">
                                <i class="icon-home"></i>
                                <span class="title">الرئيسية</span>
                               
                                <span class="arrow"></span>
                            </a>
                            
                        </li>
                        @if(Auth::guard('admins')->user()->flag==0 )
                        <li class="nav-item  ">
                            <a href="{{URL('settings/general-settings')}}" class="nav-link">
                            
                               <i class="icon-settings"></i>
                                <span class="title">الاعدادات العامة</span>
                                <span class="arrow"></span>
                            </a>
                           
                        </li>
                        @endif

                        @if(Auth::guard('admins')->user()->flag==0 )
                        <li class="nav-item  ">
                            <a href="{{URL('owners/all-owners')}}" class="nav-link">
                            
                               <i class="icon-users"></i>
                                <span class="title">المساهمين</span>
                                <span class="arrow"></span>
                            </a>
                           
                        </li>
                        @endif

                        @if(Auth::guard('admins')->user()->flag==0 )
                        <li class="nav-item  ">
                            <a href="{{URL('seeds/all-seeds')}}" class="nav-link">
                            
                               <i class="icon-layers"></i>
                                <span class="title">الأصول</span>
                                <span class="arrow"></span>
                            </a>
                           
                        </li>
                        @endif

                        @if(Auth::guard('admins')->user()->flag==0 || Auth::guard('admins')->user()->flag==1 || Auth::guard('admins')->user()->flag==3 || Auth::guard('admins')->user()->flag==2 || Auth::guard('admins')->user()->flag==4)
                        <li class="nav-item  ">
                            <a href="{{URL('products/all-products')}}" class="nav-link nav-toggle">
                                <i class="icon-layers"></i>
                                <span class="title">البضائع</span>
                            </a>
                        </li>
                        @endif

                        @if(Auth::guard('admins')->user()->flag==0 || Auth::guard('admins')->user()->flag==1  )
                        <li class="nav-item  ">
                            <a href="{{URL('stores/all-stores')}}" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">المخازن</span>
                            </a>
                        </li>
                        @endif

                        @if(Auth::guard('admins')->user()->flag==0 || Auth::guard('admins')->user()->flag==1  )
                        <li class="nav-item  ">
                            <a href="{{URL('admin/inventory')}}" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">جرد</span>
                            </a>
                        </li>
                        @endif


                        @if(Auth::guard('admins')->user()->flag==0)
                        <li class="nav-item  ">
                            <a href="{{URL('delegates/all-delegates')}}" class="nav-link nav-toggle">
                                <i class="icon-layers"></i>
                                <span class="title"> الوكلاء الرئيسين</span>
                            </a>
                        </li>
                        @endif

                         @if(Auth::guard('admins')->user()->flag==0)
                        <li class="nav-item  ">
                            <a href="{{URL('subDelegates/all-delegates')}}" class="nav-link nav-toggle">
                                <i class="icon-layers"></i>
                                <span class="title"> الوكلاء الفرعيين</span>
                            </a>
                        </li>
                        @endif

                        @if(Auth::guard('admins')->user()->flag==0  )
                        <li class="nav-item  ">
                            <a href="{{URL('agents/all-agents')}}" class="nav-link nav-toggle">
                                <i class="icon-layers"></i>
                                <span class="title">العملاء</span>
                            </a>
                        </li>
                        @endif
                        
                        
                        @if(Auth::guard('admins')->user()->flag==0  )
                        <li class="nav-item  ">
                            <a href="{{URL('suppliers/all-suppliers')}}" class="nav-link nav-toggle">
                                <i class="icon-layers"></i>
                                <span class="title">الموردين</span>
                            </a>
                        </li>
                        @endif

                        @if(Auth::guard('admins')->user()->flag==0 )
                        <li class="nav-item  ">
                            <a href="{{URL('traders/all-traders')}}" class="nav-link nav-toggle">
                                <i class="icon-layers"></i>
                                <span class="title">التجار</span>
                            </a>
                        </li> 
                        @endif   
                        
                        @if(Auth::guard('admins')->user()->flag==0 || Auth::guard('admins')->user()->flag==2  || Auth::guard('admins')->user()->flag==4 || Auth::guard('admins')->user()->flag==3)
                        <li class="nav-item  ">
                            <a href="{{URL('orders/all-orders')}}" class="nav-link nav-toggle">
                                <i class="icon-layers"></i>
                                <span class="title">الطلبيات</span>
                            </a>
                        </li>
                        @endif

                        @if(Auth::guard('admins')->user()->flag==3  )
                        <li class="nav-item  ">
                            <a href="{{URL('agents/all-places')}}" class="nav-link nav-toggle">
                                <i class="icon-layers"></i>
                                <span class="title">طلبات المعاينة</span>
                            </a>
                        </li>

`                       @endif

                        @if(Auth::guard('admins')->user()->flag==2 )
                        <li class="nav-item  ">
                            <a href="{{URL('traders/all-debt')}}" class="nav-link nav-toggle">
                                <i class="icon-layers"></i>
                                <span class="title">المديونات</span>
                            </a>
                        </li> 
                        @endif  

                        @if(Auth::guard('admins')->user()->flag==2 )
                        <li class="nav-item  ">
                            <a href="{{URL('traders/points')}}" class="nav-link nav-toggle">
                                <i class="icon-layers"></i>
                                <span class="title">النقاط</span>
                            </a>
                        </li> 
                        @endif  
                         @if(Auth::guard('admins')->user()->flag==3 )
                        <li class="nav-item  ">
                            <a href="{{URL('agents/points')}}" class="nav-link nav-toggle">
                                <i class="icon-layers"></i>
                                <span class="title">النقاط</span>
                            </a>
                        </li> 
                        @endif  
                        @if(Auth::guard('admins')->user()->flag==4 )
                        <li class="nav-item  ">
                            <a href="{{URL('delegates/points')}}" class="nav-link nav-toggle">
                                <i class="icon-layers"></i>
                                <span class="title">النقاط</span>
                            </a>
                        </li> 
                        @endif  

                        @if(Auth::guard('admins')->user()->flag==4 )
                        <li class="nav-item  ">
                            <a href="{{URL('delegates/custody')}}" class="nav-link nav-toggle">
                                <i class="icon-layers"></i>
                                <span class="title">العهدة</span>
                            </a>
                        </li> 
                        @endif  

                        
                        <li class="nav-item  ">
                            <a href="#" class="nav-link nav-toggle">
                                <i class="icon-layers"></i>
                                <span class="title">الرسائل</span>
                            </a>
                            <ul class="sub-menu">
                                <li class="nav-item ">
                                    <a href="{{URL('msgs/admin-msgs')}}" class="nav-link ">
                                        <span class="title ">رسائل الاعضاء</span>

                                    </a>
                                </li>
                            @if(Auth::guard('admins')->user()->flag==0 || Auth::guard('admins')->user()->flag==1)
                                <li class="nav-item ">
                                    <a href="{{URL('msgs/all-msgs')}}" class="nav-link ">

                                        <span class="title ">رسائل الزوار</span>
                                    </a>
                                </li>
                            @endif    
                            </ul>
                        </li> 
                      

                        @if(Auth::guard('admins')->user()->flag==0 )
                        <li class="nav-item  ">
                            <a href="{{URL('employees/all-employees')}}" class="nav-link nav-toggle">
                                <i class="icon-users"></i>
                                <span class="title">الموظفين</span>
                            </a>
                        </li>
                        @endif
                        @if(Auth::guard('admins')->user()->flag==0)
                        <li class="nav-item  ">
                            <a href="{{URL('users/all')}}" class="nav-link nav-toggle">
                                <i class="icon-users"></i>
                                <span class="title">المستخدمين</span>
                            </a>
                        </li>
                        @endif
                       
                     
                     
                     
               
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
    </div>