@extends("admin/master")

@section("title")
الطلبيات
@endsection
@section("styles")
<link href="{{asset('assets/admin/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}" 
      rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" /> 

@endsection
@section("content-title")
<h3 class="page-title">الطلبيات</h3>  
@endsection

@section("content-navigat")
<ul class="page-breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="{{url('/admin')}}">الصفحة الرئيسية</a>
        <i class="fa fa-angle-left"></i>
    </li>
    <li>
        <a href="#">الطلبيات</a>


    </li>

</ul>
@endsection

@section('content')

@if(isset($errors)&&count($errors)>0)
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>
            {{$error}}
        </li>
        @endforeach
    </ul>
</div>
@endif
@if(session()->has('success'))
<?php
$a = [];
$a = session()->pull('success');
?>
<div class="alert alert-success alert-dismissable">
    <button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
    {{$a[0]}}

</div>
@endif
@if(session()->has('danger'))
<?php
$a = [];
$a = session()->pull('danger');
?>
<div class="alert alert-warrning alert-dismissable">
    <button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
    {{$a[0]}}

</div>
@endif



<div class="portlet box blue ">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-eye"></i> عرض الطلبيات</div>
    </div>

    <div class="portlet-body" >
        <table class="table table-striped table-bordered table-hover table-checkable order-column"  data-url="{{ url('orders/search/order') }}" id="search">
            <thead>
                <tr> 
                    <th class="text-center"> رقم الطلبيه</th>
                    <th class="text-center"> رقم الدفتر</th>
                    <th class="text-center"> تاريخ الطلبية</th>
                    <th class="text-center"> مستلم الطلبية</th>
                    <th class="text-center"> طريقه الدفع</th>
                    <th class="text-center"> العمليات</th>
                </tr>
            </thead>

            <tbody>
                
            </tbody>
        </table>

    </div> 
</div>

@endsection

@section("layoutscripts")
><script src="{{asset('assets/admin/global/scripts/datatable.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>

@endsection

@section("levelscripts")
<script src="{{asset('assets/admin/pages/scripts/table-datatables-managed.min.js')}}" type="text/javascript">

</script>
@endsection

