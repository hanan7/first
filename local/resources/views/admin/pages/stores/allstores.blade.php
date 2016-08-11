@extends("admin/master")

@section("title")
المخازن
@endsection
@section("styles")
<link href="{{asset('assets/admin/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}" 
    rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />              
@endsection
@section("content-title")
 <h3 class="page-title">المخازن</h3>  
@endsection

@section("content-navigat")
<ul class="page-breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="index.html">الصفحة الرئيسية</a>
    <i class="fa fa-angle-left"></i>
  </li>
  <li>
   <a href="#">المخازن</a>


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
 <?php $a=[];
 $a = session()->pull('success');
 ?>
    <div class="alert alert-success alert-dismissable">
      <button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
     {{$a[0]}}
    
    </div>
 @endif
 @if(session()->has('danger'))
 <?php $a=[];
 $a = session()->pull('danger');
 ?>
    <div class="alert alert-warrning alert-dismissable">
      <button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
     {{$a[0]}}
    
    </div>
 @endif
  	<div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption">
          <i class="fa fa-eye"></i> عرض المخازن</div>
    </div>

    <div class="portlet-body" >
        <div class="table-toolbar">
          <div class="row">
            <div class="col-md-6">
              <div class="btn-group">
                <a  href="#addstore" data-toggle="modal" class="btn btn blue" ><i class="fa fa-plus"></i>  اضافة مخزن
                </a>
              </div>
            </div>
           
          </div>
        </div>  

      
         <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
            <thead>
              <tr>
                <th class="text-center"> رقم المخزن </th>
                <th class="text-center"> اسم المخزن</th>
                <th class="text-center"> العنوان</th>
                <th class="text-center"> التليفون </th>
                <th class="text-center"> امين المخزن </th>
                <th class="text-center"> عدد العمال </th>
                <th class="text-center"> المحتوى</th>
                <th class="text-center">العمليات</th>
              </tr>
            </thead>
             
            <tbody>
            @foreach($stores as $str)
              <tr>
                   
                    <td class="text-center"> {{ $str->number }} </td>
                    <td class="text-center"> {{ $str->name }} </td>
                    <td class="text-center"> {{ $str->address }}  </td>
                    <td class="text-center"> {{ $str->phone }}  </td>
                    <td class="text-center"> {{ $str->storekeeper}} </td>
                    <td class="text-center"> {{ $str->workers_no }} </td>
                    <td class="text-center"> {{ $str->content_type }} </td>
                   
                    <td class="text-center">
                      <a href="{{URL('stores/'.'edit/'.$str->id)}}" 
                       class="btn green btnedit" data-original="">
                        <li class="fa fa-pencil"> تعديل</li>
                      </a>
                      @if(Auth::guard('admins')->user()->flag==0 || Auth::guard('admins')->user()->flag==1)
                       <a data-url="{{URL('stores/'.'delete/'.$str->id)}}" class="btn btn-danger btndelet"  >
                          <li class="fa fa-trash">  مسح</li>
                      </a>
                      <a href="{{URL('stores/inventory/'.$str->id)}}"
                        data-toggle="modal" class="btn btn-warning 
                        "  >
                          <li class="fa "> جرد </li>
                      </a>
                      <a href="{{URL('stores/goods/'.$str->id)}}" 
                        data-toggle="modal" class="btn btn-danger 
                        "  >
                          <li class="fa "> بضائع </li>
                      </a>
                       <a href="{{URL('/stores/all-inventory/'.$str->id)}}" 
                        data-toggle="modal" class="btn btn-danger 
                        "  >
                          <li class="fa "> كل الجرد </li>
                      </a>
                      @endif
                    </td>
              </tr>
              @endforeach 
            </tbody>
          </table>
       
    </div>
  
</div>
   @include('admin.pages.stores.addstore') 
<!-- Modal -->

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

