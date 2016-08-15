@extends("admin/master")

@section("title")
الموردين
@endsection
@section("styles")
<link href="{{asset('assets/admin/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}" 
    rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />              
@endsection
@section("content-title")
 <h3 class="page-title">الموردين</h3>  
@endsection

@section("content-navigat")
<ul class="page-breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="index.html">الصفحة الرئيسية</a>
    <i class="fa fa-angle-left"></i>
  </li>
  <li>
   <a href="#">الموردين</a>


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
 @if(session()->has('sucess'))
 <?php $a=[];
 $a = session()->pull('sucess');
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
<div class="portlet box blue ">
    <div class="portlet-title">
        <div class="caption">
          <i class="fa fa-eye"></i> عرض الموردين</div>
    </div>

    <div class="portlet-body" >
        <div class="table-toolbar">
          <div class="row">
            <div class="col-md-6">
              <div class="btn-group">
                <a  href="#addsupplier" data-toggle="modal" class="btn btn blue" ><i class="fa fa-plus"></i>  اضافة مورد
                </a>
              </div>
            </div>
            
          </div>
        </div>  

      
         <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
            <thead>
              <tr> 
                <th class="text-center"> كود المورد </th>
                <th class="text-center"> اسم المورد</th>
                <th class="text-center"> العنوان</th>
                <th class="text-center"> التليفون </th>
                <th class="text-center"> نوع التوريد </th>
                <th class="text-center"> المخازن المستلمة </th>
                <th class="text-center"> الاصناف الموردة </th>
                <th class="text-center"> الديون / المستحقات </th>
                <th class="text-center"> العمليات </th>

              </tr>
            </thead>
             
            <tbody>
            @foreach($suppliers as $supplier)
            
              <tr>
		    
                    <td class="text-center"> {{ $supplier->code }}</td>                   
                    <td class="text-center"> {{ $supplier->name }} </td>
                    <td class="text-center"> {{ $supplier->address }} </td>
                    <td class="text-center"> {{ $supplier->phone }} </td>
                    <td class="text-center"> {{ $supplier->type }} </td>
                    <td class="text-center"> {{ $supplier->recipient_stores }} </td>
                    <td class="text-center"> {{ $supplier->varieties }} </td>
                    <td class="text-center"> {{ $supplier->debt }} </td>
                    <td class="text-center">
                      <a href="{{URL('suppliers/'.'edit/'.$supplier->id)}}"  class="btn green btnedit" data-original="">
                        <li class="fa fa-pencil"> تعديل</li>
                      </a>
                      @if(Auth::guard('admins')->user()->flag==0)
                        <a data-url="{{URL('suppliers/'.'delete/'.$supplier->id)}}" class="btn btn-danger btndelet"  >
                          <li class="fa fa-trash">  مسح</li>
                      </a>
                      @endif
                    </td>
              </tr>
              
            @endforeach 
            </tbody>
          </table>
       
    </div> 
</div>
 @include('admin.pages.suppliers.addsupplier')
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

