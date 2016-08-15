@extends('front.layouts.master')
<!--//******************************************************************************************************** \\
////////////////////////////////////////// TITLE/////////////////////////////////////////////////// \\
//******************************************************************************************************** \\-->
@section('title')
REGISTRATION
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
 <section class="register-form" id="register-new"> 
   <div class="container">
	<div class="row text-center">
        <div class="wizard">
            <form role="form" name="myform" action="register" enctype="multipart/form-data" method="POST" novalidate>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="tab-content">
                    <div class="tab-pane active" role="tabpanel" id="step1">
                        <div class="left-det"> 
                            <div class="step-des">
                                <h1>البيانات الشخصية</h1>
                               
                                <p>
                                    هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال               
                                </p>
                            </div>
                            <div class="upload-img">
                                <p>الصوره الشخصية</p>
                                <span class="fa fa-picture-o"></span>
                               
                                <input name="image"   type="file" value="">
                              
                            </div>
                            <div class="caption">
                            سيتم وضع هنا ال caption
                            
                            </div>
                            <label>
                                <input type="checkbox" value="remember-me" required>
                                أوافق على  شروط وسياسات الموقع
                            </label>  
                        </div>
                        <div class="right-det">
                            <p>إملئ البيانـات التالية لإتمام عملية التسجيل :</p> @if(count($errors)>0)
                                @foreach($errors->all() as $error)
                                <p>{{$error}}</p>
                                @endforeach
                                @endif
          
                                <div class="form-group">
                                    <span class="fa fa-user"></span>
                                    <input class="form-control" type="text" name="name" ng-model="name" ng-minlength="3"
        ng-maxlength="7"      required placeholder="الإسـم بالكامل" >
                                 
                                    <i ng-messages="myform.name.$error" class="false"> 
                                        <div ng-message="required">خطأ</div>
                                        <div ng-message="maxlength">خطأ</div>
                                        <div ng-message="minlength">خطأ</div>
                                    </i>
                                    
                                </div> 
                                <div class="form-group">
                                    <span class="fa fa-phone"></span>
                                    <input class="form-control" type="text" name="phone" ng-pattern="/^[0-9]{0,10}$/" ng-model="phone" value="" required placeholder="رقم التليفون" >
                                    <i ng-messages="myform.phone.$error" class="false"> 
                                        <div ng-message="required">خطأ</div>
                                           <div ng-message="pattern">خطأ</div>
                                    </i>
                                </div>
                                 <div class="form-group">
                                     <span class="fa fa-globe"></span>
                                     <input class="form-control" type="text" ng-model="country" ng-minlength="3"
        ng-maxlength="7" name='country'value="" required placeholder="االدولـة" >
                                 <i ng-messages="myform.country.$error" class="false"> 
                                     <div ng-message="required">خطأ</div>
                                  <div ng-message="maxlength">خطأ</div>
                                        <div ng-message="minlength">خطأ</div>
                                 </i>
                                </div>
                                <div class="form-group">
                                     <span class="fa fa-map-marker"></span>
                                     <input class="form-control" ng-model="address" ng-minlength="3"
        ng-maxlength="7" name='address' type="text" value="" required placeholder="االعنوان" >
                                     <i ng-messages="myform.address.$error" class="false"> 
                                        <div ng-message="required">خطأ</div>
                                         <div ng-message="maxlength">خطأ</div>
                                         <div ng-message="minlength">خطأ</div></i>
                                </div>
                                 <div class="form-group">
                                     <span class="fa fa-envelope-o"></span>
                                     <input class="form-control" name="email" ng-model="email" type="email" value="" required placeholder="البريد الإلكترونى" >
                                      <i ng-messages="myform.email.$error" class="false"> 
                                        <div ng-message="required">خطأ</div>
                                      </i>
                                                                                                      @if(Session::has('n'))
        <?php $a=[];  $a=session()->pull('n');?>
        <i>{{$a[0]}}</i>
        @endif
               
                                </div>
                                 <div class="form-group">
                                     <span class="fa fa-lock"></span>
                                     <input class="form-control" name="password" ng-minlength="6"  ng-model="password"type="password" value="" required placeholder="كلمـة المرور" >
                                     <i ng-messages="myform.password.$error" class="false"> 
                                        <div ng-message="required">خطأ</div>
                                         <div ng-message="minlength">خطأ</div>
                                     </i>
                 </div>
                                 <div class="form-group">
                                     <span class="fa fa-lock"></span>
                                     <input class="form-control" name="repeat" ng-model="repeat" type="password" value="" required placeholder="تاكيد كلمة المرور" >
                                  <i ng-messages="myform.repeat.$error" class="false"> 
                                      <div ng-message="required">خطأ</div>
                                  </i>
                                </div> 
         
                        
                        </div>
                        <ul class="list-inline pull-right">
                            <li><button type="submit" ng-disabled="myform.$invalid" class="btn btn-primary ">حفظ </button></li>
                            <li><button   id="close" type="button" class="btn btn-primary ">إغلاق</button></li>                    
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
   </div>
</div>
</section> 
@endsection