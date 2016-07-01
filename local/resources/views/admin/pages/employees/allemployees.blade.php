@extends("admin/master")

@section("title")
الموظفين
@endsection
@section("styles")
<link href="{{asset('assets/admin/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}" 
    rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />              
@endsection
@section("content-title")
 <h3 class="page-title">الموظفين</h3>  
@endsection

@section("content-navigat")
<ul class="page-breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="index.html">الصفحة الرئيسية</a>
    <i class="fa fa-angle-left"></i>
  </li>
  <li>
   <a href="#">الموظفين</a>


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
    <div class="alert alert-success alert-dismissable">
      <button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
      <p>{{session()->get('success')}} </p>
    
    </div>
 @endif
  @if(session()->has('danger'))
    <div class="alert alert-warrning alert-dismissable">
      <button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
      <p>{{session()->get('danger')}} </p>
    
    </div>
  @endif 

  	<div class="portlet box blue ">
    <div class="portlet-title">
        <div class="caption">
          <i class="fa fa-eye"></i> عرض الموظفين</div>
    </div>
 @include('admin.pages.employees.addemployee')
    <div class="portlet-body" >
        <div class="table-toolbar">
          <div class="row">
            <div class="col-md-6">
              <div class="btn-group">
                <a  href="#addemployee" data-toggle="modal" class="btn btn blue" ><i class="fa fa-plus"></i>  اضافة موظف
                </a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="btn-group pull-right">
                  <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">الادوات
                    <i class="fa fa-angle-down"></i>
                  </button>
                  <ul class="dropdown-menu pull-right">
                    <li>
                      <a href="javascript:;">
                      <i class="fa fa-print"></i> طباعه  </a>
                    </li>
                    <li>
                      <a href="javascript:;">
                      <i class="fa fa-file-pdf-o"></i> حفظ ك  PDF </a>
                    </li>
                    <li>
                      <a href="javascript:;">
                      <i class="fa fa-file-excel-o"></i> تصدير الى  Excel </a>
                    </li>
                  </ul>
              </div>
            </div>
          </div>
        </div>  

      
         <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
            <thead>
              <tr>
                <th class="text-center"> كود الموظف </th>
                <th class="text-center"> اسم الموظف</th>
                <th class="text-center"> العنوان</th>
                <th class="text-center"> التليفون </th>
                <th class="text-center"> الوظيفة </th>
                <th class="text-center"> الراتب </th>
                <th class="text-center"> تاريخ التعاقد </th>
                <th class="text-center"> تاريخ الانتهاء </th>
                <th class="text-center">العمليات</th>
              </tr>
            </thead>
             
            <tbody>
            @foreach($emp as $emp)
              <tr>
                   
                    <td class="text-center"> {{ $emp->code }}</td>
                    <td class="text-center"> {{ $emp->name }} </td>
                    <td class="text-center"> {{ $emp->address }} </td>
                    <td class="text-center"> {{ $emp->phone }} </td>
                    <td class="text-center"> {{ $emp-> job}} </td>
                    <td class="text-center"> {{ $emp->salary }} </td>
                    <td class="text-center"> {{ $emp->contract_date }} </td>
                    <td class="text-center"> {{ $emp->end_date }} </td>
                
                    <td class="text-center">
                      <a href="{{URL('employees/'.'edit/'.$emp->id)}}"  class="btn green btnedit" data-original="">
                        <li class="fa fa-pencil"> تعديل</li>
                      </a>
                      <a href="#deletemodal" data-toggle="modal" class="btn btn-danger btndelet"  >
                          <li class="fa fa-trash">  مسح</li>
                      </a>
                    </td>
              </tr>
              @endforeach 
            </tbody>
          </table>
       
    </div> 
</div>

<!-- Modal -->
<div id="deletemodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">مسح عنصر</h4>
      </div>
      <div class="modal-body">
        <p>هل تريد تأكيد عملية المسح ؟</p>
      </div>
      <div class="modal-footer">

        <a href="{{URL('employees/'.'delete/'.$emp->id)}}" id="delete" class="btn btn red"><li class="fa fa-trash"></li> مسح</a>
     
        <button type="button" class="btn btn dafault" data-dismiss="modal"><li class="fa fa-times"></li> الغاء</button>
    
      </div>
      </form>
    </div>

  </div>
</div
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

