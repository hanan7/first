@extends('admin/master')

@section('title')
  الصفحة الرئيسية
@endsection

@section('styles')

@endsection

@section('layoutscripts')

@endsection

@section('levelscripts')
@endsection

@section("content-title")
    <h3 class="page-title"> الصفحة الرئيسية
   
    </h3>  
@endsection
@section("content-navigat")
<ul class="page-breadcrumb">
   
                    
</ul>
@endsection
@section('content')
    <div class="row">
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-light blue-soft" href="{{url('users/all-users')}}">
        <div class="visual">
            <i class="fa fa-users"></i>
        </div>
        <div class="details">
            <div class="number">
             {{$admin_num}}
            </div>
            <div class="desc">
                عدد المستخدمين
            </div>
        </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-light red-soft" href="{{url('admin/member/view-all')}}">
        <div class="visual">
            <i class="fa fa-shopping-cart"></i>
        </div>
        <div class="details">
            <div class="number">
                  {{$order_num}}
            </div>
            <div class="desc">
                 عدد الطلبيات
            </div>
        </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-light green-soft" href="{{url('admin/course/view-all')}}">
        <div class="visual">
            <i class="fa fa-users"></i>
        </div>
        <div class="details">
            <div class="number">
               {{$emp_num}}
            </div>
            <div class="desc">
                عدد الموظفين
            </div>
        </div>
        </a>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-light purple-soft" href="{{url('admin/team-work/view-all')}}">
        <div class="visual">
            <i class="fa fa-home"></i>
        </div>
        <div class="details">
            <div class="number">
             {{$store_num}}
            </div>
            <div class="desc">
                 عدد المخازن
            </div>
        </div>
        </a>
    </div>
</div> 
                
<div class="clearfix">
</div>

@endsection

