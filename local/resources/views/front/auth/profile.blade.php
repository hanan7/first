@extends('front.layouts.master')
<!--//******************************************************************************************************** \\
////////////////////////////////////////// TITLE/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->
@section('title')
profile
@endsection
<!--//******************************************************************************************************** \\
////////////////////////////////////////// style/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->
@section('style')
<link rel="stylesheet" type="text/css" href="{{URL('assets/front/css/pages-style.css')}}" />
@endsection
<!--//******************************************************************************************************** \\
////////////////////////////////////////// scripts/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->
@section('scripts')
  <script src="{{URL('assets/front/js/custom.js')}}"></script>
@endsection
<!--//******************************************************************************************************** \\
////////////////////////////////////////// slider/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->
@section('slider')
@endsection
<!--//******************************************************************************************************** \\
////////////////////////////////////////// content/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->

@section('content')
<div class="page-title">
    <a href="index.html"><span class="fa fa-home"></span></a> > <i>حسـابى</i>
    </div>
<div class="profile">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 prof-sid-menu">
                <div class="img">
                    @if(auth()->check())
                    <img src="uploads/{{auth()->user()->image}}">
                    @endif
                </div>
                <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-pills nav-stacked well">
                    <li class="active">
                        <a href="#vtab1" data-toggle="tab">
                            <span class="fa fa-user"></span>البيانات الشخصية
                        </a>
                    </li>
                    <li>
                        <a href="#vtab2" data-toggle="tab">
                            <span class="fa fa-home"></span>دكاكينى
                        </a>
                    </li>
                    <li>
                        <a href="#vtab3" data-toggle="tab">
                            <span class="fa fa-bullhorn"></span>إعلاناتى
                        </a>
                    </li>
                    <li>
                        <a href="#vtab4" data-toggle="tab">
                            <span class="fa fa-heart"></span>المفضلـة
                        </a>
                    </li>
                    <li>
                        <a href="#vtab5" data-toggle="tab">
                            <span class="fa fa-gear"></span>إعدادت الحساب
                        </a>
                    </li>    
                </ul>
            </div>
            <div class="col-lg-9 prof-sid-con"> 
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="vtab1">
                        <h3>البيانات الشخصية</h3>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="vtab2">
                        <div class="doca">
                                <div class="img">
                                    <img src="uploads/">
                                    <div class="img-over">
                                        <a href="docaan.html" data-toggle="tooltip" data-placement="top" title="مشاهدة الدكان">            <span class="fa fa-eye"></span>  
                                        </a> 
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="مسح الدكــان">
                                            <span class="fa fa-trash-o"></span>
                                        </a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="تعديل الدكــان">
                                            <span class="fa fa-pencil"></span>
                                        </a>                        
                                    </div>
                                </div>
                                <div class="con">
                                    <a href="docaan.html"><h1> دكــان Shop</h1></a>
                                    <div class="follow">
                                        <span class="fa fa-users"></span>
                                        150 متابع
                                    </div> 
                                    <p>أزيــاء  وموضــة</p>
                                    <div class="star">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star-o"></span>
                                    </div> 
                                </div>
                            </div>   
                        <div class="doca">
                                <div class="img">
                                    <img src="images/1.jpg">
                                    <div class="img-over">
                                        <a href="docaan.html" data-toggle="tooltip" data-placement="top" title="مشاهدة الدكان">            <span class="fa fa-eye"></span>  
                                        </a> 
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="مسح الدكــان">
                                            <span class="fa fa-trash-o"></span>
                                        </a>
                                        <a href="#" data-toggle="tooltip" data-placement="top" title="تعديل الدكــان">
                                            <span class="fa fa-pencil"></span>
                                        </a>                        
                                    </div>
                                </div>
                                <div class="con">
                                    <a href="docaan.html"><h1> دكــان Shop</h1></a>
                                    <div class="follow">
                                        <span class="fa fa-users"></span>
                                        150 متابع
                                    </div> 
                                    <p>أزيــاء  وموضــة</p>
                                    <div class="star">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star-o"></span>
                                    </div> 
                                </div>
                            </div>
                        <div class="add-docan">
                                <span class="fa fa-plus"></span>
                            </div>   
                    </div>
                    <div role="tabpanel" class="tab-pane fade in" id="vtab3">
                        <div class="prod-type-3">
                                <img src="images/off-1.jpg" class="on">
                                <img src="images/off-c-1.jpg" class="off">
                                <div class="offer-prod-det">            
                                    <a href="product.html"><h1>هاتف سامسونج</h1></a>
                                    <p>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star-o"></span>
                                    </p>     
                                    <div class="price">
                                        <h3>2000$</h3>
                                    </div>
                                </div> 
                                <div class="img-over">
                                    <a href="#">
                                        <button class="btn btn-default">
                                             <span class="fa fa-trash-o"></span>مسـح الأعـلان
                                        </button>
                                    </a>
                                    <a href="#">
                                        <button class="btn btn-default">
                                            <span class="fa fa-pencil"></span>تعديل الأعــلان
                                        </button>
                                    </a>

                                </div>
                            </div>
                        <div class="prod-type-3">
                                <img src="images/off-2.jpg" class="on">
                                <img src="images/off-c-2.jpg" class="off">
                                <div class="offer-prod-det">            
                                    <a href="product.html"><h1>هاتف سامسونج</h1></a>
                                    <p>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star-o"></span>
                                    </p>     
                                    <div class="price">
                                        <h3>2000$</h3>
                                    </div>
                                </div> 
                                <div class="img-over">
                                <a href="#">
                                        <button class="btn btn-default">
                                             <span class="fa fa-trash-o"></span>مسـح الأعـلان
                                        </button>
                                    </a>
                                    <a href="#">
                                        <button class="btn btn-default">
                                            <span class="fa fa-pencil"></span>تعديل الأعــلان
                                        </button>
                                    </a>
                                </div>
                            </div>
                        <div class="add-n-offer">
                                <a href="add-offer.html">
                                    <span class="fa fa-plus"></span>
                                </a>
                            </div> 
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="vtab4">
                        <div class="doca">
                                <div class="img">
                                    <img src="images/1.jpg">
           <div class="img-over">
                        <a href="docaan.html" data-toggle="tooltip" data-placement="top" title="مشاهدة الدكان">                             <span class="fa fa-eye"></span>                         </a> 
                        <a href="#" data-toggle="tooltip" data-placement="top" title="إضافة إلى المفضلة">
                            <span class="fa fa-heart"></span>
                        </a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="متابعة الدكان">
                            <span class="fa fa-bell-o"></span>
                        </a>                        
                    </div>
                                </div>
                                <div class="con">
                                    <a href="docaan.html"><h1> دكــان Shop</h1></a>
                                    <div class="follow">
                                        <span class="fa fa-users"></span>
                                        150 متابع
                                    </div> 
                                    <p>أزيــاء  وموضــة</p>
                                    <div class="star">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star-o"></span>
                                    </div> 
                                </div>
                            </div>   
                        <div class="doca">
                                <div class="img">
                                    <img src="images/1.jpg">
     <div class="img-over">
                        <a href="docaan.html" data-toggle="tooltip" data-placement="top" title="مشاهدة الدكان">                             <span class="fa fa-eye"></span>                         </a> 
                        <a href="#" data-toggle="tooltip" data-placement="top" title="إضافة إلى المفضلة">
                            <span class="fa fa-heart"></span>
                        </a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="متابعة الدكان">
                            <span class="fa fa-bell-o"></span>
                        </a>                        
                    </div>
                                </div>
                                <div class="con">
                                    <a href="docaan.html"><h1> دكــان Shop</h1></a>
                                    <div class="follow">
                                        <span class="fa fa-users"></span>
                                        150 متابع
                                    </div> 
                                    <p>أزيــاء  وموضــة</p>
                                    <div class="star">
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star-o"></span>
                                    </div> 
                                </div>
                            </div>  
                        <div class="prod-type-3" id="sp-pro">
                                <img src="images/off-1.jpg" class="on">
                                <img src="images/off-c-1.jpg" class="off">
                                <div class="offer-prod-det">            
                                    <a href="product.html"><h1>هاتف سامسونج</h1></a>
                                    <p>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star-o"></span>
                                    </p>     
                                    <div class="price">
                                        <h3>2000$</h3>
                                    </div>
                                </div> 
                              
                            </div>
                        <div class="prod-type-3" id="sp-pro">
                                <img src="images/off-2.jpg" class="on">
                                <img src="images/off-c-2.jpg" class="off">
                                <div class="offer-prod-det">            
                                    <a href="product.html"><h1>هاتف سامسونج</h1></a>
                                    <p>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star-o"></span>
                                    </p>     
                                    <div class="price">
                                        <h3>2000$</h3>
                                    </div>
                                </div> 
                            
                            </div>  
                    </div>
                    <div role="tabpanel" class="tab-pane fade in" id="vtab5">
                    <h3>إعدادت الحساب</h3>
              
                </div>    
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection