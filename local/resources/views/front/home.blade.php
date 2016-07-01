@extends('front/layouts/master')

@section('content')
<section id="main">

  <div class="slide" class="grid-1">
   <div>
     <img src="{{asset('assets/front/img/slideshow/01.jpg')}}"/>
     <h3>شركة سهل للأدوات الصحية
     <br/>
     (شعارنا (الاتقان-الجودة-النظافة الصحية</h3>
   </div>
   <div>
     <img src="{{asset('assets/front/img/slideshow/02.jpeg')}}"/>
      <h3>شركة سهل للأدوات الصحية
     <br/>
     (شعارنا (الاتقان-الجودة-النظافة الصحية</h3>
   </div>
   <div>
     <img src="{{asset('assets/front/img/slideshow/03.jpeg')}}"/>
      <h3>شركة سهل للأدوات الصحية
     <br/>
     (شعارنا (الاتقان-الجودة-النظافة الصحية</h3>
   </div>
   <div>
     <img src="{{asset('assets/front/img/slideshow/04.jpg')}}"/>
      <h3>شركة سهل للأدوات الصحية
     <br/>
     (شعارنا (الاتقان-الجودة-النظافة الصحية</h3>
   </div>
  </div>
</section>

<section id="description" class="grid-1 wow  fadeIn">


	<div class="line"></div>
    <br/>
	<h2>شركة سهل للأدوات الصحية</h2>
	<h3>هى شركة متخصصة فى تجارة الادوات الصحية</h3>
    <button class="btn">المزيد</button>
    <br /><br /><br />
    <div class="line"></div>
    <div class="line"></div>
</section>

<div class="clear" style="clear:both;"></div>

<section id="features" class="parallax wow zoomIn" class="grid-1">

  <h3>
  جميع الادوات الصحية التى تحتاجها
  <br/><br/><br/>
  (جودة عالية - اسعار فى متناول اليد)
  </h3>
</section>

<section id="services" class="grid-1">
	<h2>الخدمات</h2>
@foreach($products as $pro)	
	<div class="grid-3 wow slideInLeft">
    <div class="card">
      <img src="{{url('uploads/products/' . $pro->image . '')}}" alt="" /> 
      <h1> اسم المنتج : {{$pro->name}}   
      <br /><br />السعر : {{$pro->b_price}} جنية</h1>
      <p>{{$pro->desc}}</p>
    </div>
  </div>
@endforeach

  <button class="btn">المزيد</button>
</section>

<div class="clear" style="clear:both;"></div>

<br/>
<section id="contact" class="grid-1">
   
   <div class="main">
		<div class="accordion">
        	<a class="accordion-section-title" href="#accordion-1"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></a>
			<div class="accordion-section">
				<div id="accordion-1" class="accordion-section-content">
					
               
                    
                    
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6854.566023342393!2d31.001038875233384!3d30.794696788333898!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14f7c97a42a78c35%3A0xdee8e6c0b8e8fbb3!2z2K_ZhNiq2Kcg2LPZitiq2Yog2YXZiNmE!5e0!3m2!1sar!2seg!4v1466781572914" class="map" frameborder="0" style="border:0" allowfullscreen></iframe>
                    
                    
				</div><!--end .accordion-section-content-->
			</div><!--end .accordion-section-->

				<a class="accordion-section-title" href="#accordion-2"><i class="fa fa-map-marker" aria-hidden="true"></i></a>
			<div class="accordion-section">
				<div id="accordion-2" class="accordion-section-content">
				     <div class="form-contact" >
                <form>
                       <h2>تواصل معنا</h2>
                    
                    الاسم
                    
                    <input type="text" name="code" placeholder="الاسم">
                    الايميل 
                    <input type="text" name="name" placeholder="الايميل">
                    محتوى الرسالة
                    <input type="text" name="message" placeholder="محتوى الرسالة">
                    
                    
                    <input type="button" value="اضف" />
                    
                </form>
              </div>
        </div><!--end .accordion-section-content-->
			</div><!--end .accordion-section-->
  	</div>
</section>


<section id="last" class="parallax grid-1 wow bounceIn">

  <h3>
    اجود الخامات
    </br><br/><br/>
    اعلى المواصفات 
    <br/><br/><br/>
    فقط فى شركة سهل للادوات الصحية
  </h3>
</section>

<div class="clear" style="clear:both;"></div>
    
@endsection