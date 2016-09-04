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
<div class="alert alert-warning alert-dismissable">
    <button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
    {{$a[0]}}

</div>
@endif

<div class="portlet box blue ">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-eye"></i> تقرير الطلبيات</div>
    </div>

    @include('admin.pages.products.product-details')
    @include('admin.pages.products.product-delete')
    <script id="row-template">
        @include('admin.pages.reports.templates.order-row')
    </script>
    <div class="portlet-body" >
        <div class="table-toolbar">
            <form class="report-form" onsubmit="return false;" action="{{ url('reports/explore/orders') }}" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">من</label>
                            <input type="date" name="from"  class="form-control " >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">الي</label>
                            <input type="date"  name="to" class="form-control " >
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">البحث عن طريق <span class="caret"></span></button>
                                <ul class="dropdown-menu filter-drop-down">
                                    <li data-filter="name"><a href="#">الاسم</a></li>
                                    <li data-filter="number"><a href="#">رقم الطلبيه</a></li>
                                    <li data-filter="note_book"><a href="#">رقم الدفتر</a></li>
                                    <li data-filter="sub_total"><a href="#">الاجمالي</a></li>
                                    <li data-filter="discount"><a href="#">الخصم</a></li>
                                    <li data-filter="extra_money"><a href="#">الاضافي</a></li>
                                    <li data-filter="paid_amount"><a href="#">المدفوع</a></li>
                                    <li data-filter="paid_rest"><a href="#">الباقي</a></li>
                                    <li data-filter="store" class="filter-other"><a href="#">المخزن</a></li>
                                    <li data-filter="payment_method" class="filter-other"><a href="#">طريق الدفع</a></li>
                                    <li data-filter="type" class="filter-other"><a href="#">نقدا ام اجل</a></li>
                                    <li role="separator" class="divider"> اخري</li>
                                    <li data-filter="_all"><a href="#" >الكل</a></li>
                                </ul>
                            </div><!-- /btn-group -->
                            <input type="text" class="form-control" id="search-query" aria-label="..." name="query">
                            <input type="hidden" id="filter-hidden" name="filter" value="_all">
                        </div><!-- /input-group -->
                    </div><!-- /.col-lg-6 -->

                    <div class="col-md-6">
                        <div class="btn-group">
                            <a href="#" class="report-submit btn btn green"><i class="fa fa-search"></i>  استكشاف
                            </a>
                        </div>
                    </div>

                </div>
            </form>
        </div>  
        <!--<table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">-->
        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample">
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

