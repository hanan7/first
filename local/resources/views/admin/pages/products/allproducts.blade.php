@extends("admin/master")

@section("title")
المنتجات
@endsection
@section("styles")
<link href="{{asset('assets/admin/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/style.css')}}" rel="stylesheet" type="text/css" />

@endsection
@section("content-title")
<h3 class="page-title">المنتجات</h3>  
@endsection

@section("content-navigat")
<ul class="page-breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="{{url('/admin')}}">الصفحة الرئيسية</a>
        <i class="fa fa-angle-left"></i>
    </li>
    <li>
        <a href="#">المنتجات</a>


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
<div class="alert alert-warning alert-dismissable">
    <button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
    {{$a[0]}}

</div>
@endif

<div class="portlet box blue ">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-eye"></i> عرض المنتجات</div>
    </div>

    <div class="portlet-body" >
        <div class="table-toolbar">
            <div class="row">
                <div class="col-md-6">
                    <div class="btn-group">
                        @if(Auth::guard('admins')->user()->flag==0 || Auth::guard('admins')->user()->flag==1)
                        <a href="#addmodal" class="btn btn blue"  data-toggle="modal"><i class="fa fa-plus"></i>  اضافة منتج
                        </a>
                        <a href="#cat-modal" class="btn btn green"  data-toggle="modal"><i class="fa fa-plus"></i>  اضافة صنف
                        </a>
                        @endif
                    </div>
                </div>

            </div>
        </div>  


        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
            <thead>
                <tr>
                    <th class="text-center"> كود المنتج </th>
                    <th class="text-center"> اسم المنتج</th>
                    <th class="text-center"> نقاط مبيعات</th>
                    <th class="text-center"> سعر البيع </th>
                    <th class="text-center"> الصورة</th>
                    @if(Auth::guard('admins')->user()->flag==0 || Auth::guard('admins')->user()->flag==1)
                    <th class="text-center"> الكمية</th>
                    <th class="text-center"> سعر الشراء </th>
                    <th class="text-center"> الشركة الموردة</th>
                    <th class="text-center"> المخزن</th>
                    <th class="text-center">العمليات</th>
                    @endif
                </tr>
            </thead>

            <tbody>
                @foreach($products as $pro)
                <tr>

                    <td class="text-center"> {{ $pro->code }}</td>
                    <td class="text-center"> {{ $pro->name }} </td>
                    <td class="text-center"> {{ $pro->points }} </td>
                    <td class="text-center"> {{ $pro->s_price }} </td>
                    <td class="text-center"> <img src="{{url('uploads/products/'.$pro->image)  }}" style="width:100px; height:100px; "/></td>
                    @if(Auth::guard('admins')->user()->flag==0 || Auth::guard('admins')->user()->flag==1)
                    <td class="text-center"> {{ $pro->quantity }} </td>
                    <td class="text-center"> {{ $pro->b_price }} </td>
                    <td class="text-center"> {{ $pro->company}}</td>
                    <td class="text-center"> {{ $pro->store}}</td>
                    <td class="text-center">
                        @if(Auth::guard('admins')->user()->flag==0 || Auth::guard('admins')->user()->flag==1)
                        <a href="{{URL('products/'.'edit/'.$pro->id)}}"  class="btn green btnedit" data-original="">
                            <li class="fa fa-pencil"> تعديل</li>
                        </a>
                        <a data-url="{{URL('products/'.'delete/'.$pro->id)}}" class="btn btn-danger btndelet"  >
                          <li class="fa fa-trash">  مسح</li>
                      </a>
                        <button type="button" class="btn-details btn btn-dafault" data-product-id="{{$pro->id }}" >تفاصيل</button>
                        @endif
                    </td>
                    @endif  
                </tr>
                @endforeach 
            </tbody>
        </table>

    </div> 
</div>

<!--Model's for processing-->
@include('admin.pages.products.add-product')
@include('admin.pages.products.add-category')
@include('admin.pages.products.product-details')
@include('admin.pages.products.product-delete')
 <!--End of modal for processing-->

@endsection
@section("layoutscripts")
<script src="{{asset('assets/admin/global/scripts/datatable.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
<script id="product-details-template">
    @include('admin.templates.product-details')
</script>
<script id="category-template">
    @include('admin.templates.category')
</script>
@endsection

@section("levelscripts")
<script src="{{asset('assets/admin/pages/scripts/table-datatables-managed.min.js')}}" type="text/javascript">

</script>
@endsection

