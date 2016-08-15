@extends("admin/master")

@section("title")
الاعدادات العامة
@endsection

@section('styles')
 <link type="text/css" rel="stylesheet" href="{{asset('assets/admin/style.css')}}">
@endsection
@section("content-title")
 <h3 class="page-title">الاعدادات العامة</h3>  
@endsection

@section("content-navigat")
<ul class="page-breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="index.html">الصفحة الرئيسية</a>
    <i class="fa fa-angle-left"></i>
  </li>
  <li>
   <a href="#">الاعدادات العامة</a>


 </li>
                         
</ul>
@endsection
                 
@section('content')
 
<div id="profile" class="instaFade">
	<div class="mainDetails"> 
		<div id="headshot" class="quickFade">
			<img src="{{url('uploads/admins/'.$admin->photo)  }}" alt="{{$admin->name}}" />
		</div>
		
		<div id="name">
			<h1 class="quickFade delayTwo">{{$admin->name}}</h1>
			
		</div>
		
		
		<div class="clear"></div>
	</div>
	
	<div id="mainArea" class="quickFade delayFive">
		<section>
			<article>
				<div class="sectionTitle">
					<h1>الاسم</h1>
				</div>
				
				<div class="sectionContent">
					<p>{{$admin->name}}</p>
				</div>
			</article>
			<div class="clear"></div>
		</section>
		
		 <section>
			<article>
				<div class="sectionTitle">
					<h1>الاسم المستخدم</h1>
				</div>
				
				<div class="sectionContent">
					<p>{{$admin->username}}</p>
				</div>
			</article>
			<div class="clear"></div>
		</section>

		 <section>
			<article>
				<div class="sectionTitle">
					<h1>الايميل</h1>
				</div>
				
				<div class="sectionContent">
					<p>{{$admin->email}}</p>
				</div>
			</article>
			<div class="clear"></div>
		</section>

        
        
         <section>
			<article>
				<div class="sectionTitle">
					<h1>العنوان</h1>
				</div>
				
				<div class="sectionContent">
					<p>{{$admin->address}}</p>
				</div>
			</article>
			<div class="clear"></div>
		</section>
		
        
        <section>
			<article>
				<div class="sectionTitle">
					<h1>التليفون</h1>
				</div>
				
				<div class="sectionContent">
					<p>{{$admin->address}}</p>
				</div>
			</article>
			<div class="clear"></div>
		</section>
        
        
		<section>
			<div class="sectionTitle">
				<h1>معلومات اضافية</h1>
			</div>
			
			<div class="sectionContent">
				<article>
					{{$admin->other}}
				</article>
				
			</div>
			<div class="clear"></div>
		</section>
		
		
		
		
		
		
	</div>
</div>
@endsection