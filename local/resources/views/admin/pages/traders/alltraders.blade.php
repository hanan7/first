@extends("admin/master")

@section("title")
التجار
@endsection
@section("styles")
<link href="{{asset('assets/admin/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}" 
    rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />              
@endsection
@section("content-title")
 <h3 class="page-title">التجار</h3>  
@endsection

@section("content-navigat")
<ul class="page-breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="index.html">الصفحة الرئيسية</a>
    <i class="fa fa-angle-left"></i>
  </li>
  <li>
   <a href="#">التجار</a>


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

  	<div class="portlet box blue ">
    <div class="portlet-title">
        <div class="caption">
          <i class="fa fa-eye"></i> عرض التجار</div>
    </div>

    <div class="portlet-body" >
        <div class="table-toolbar">
          <div class="row">
            <div class="col-md-6">
              <div class="btn-group">
                <a href="#addtrader" data-toggle="modal" class="btn btn blue" ><i class="fa fa-plus"></i>  اضافة تاجر
                </a>
              </div>
            </div>
           
          
          </div>
        </div>  

      
         <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
            <thead>
              <tr>
                <th class="text-center"> كود التاجر </th>
                <th class="text-center"> اسم التاجر</th>
                <th class="text-center"> العنوان</th>
                <th class="text-center"> التليفون </th>
                <th class="text-center"> طرق الدفع </th>
                <th class="text-center"> نوع التاجر</th>
                <th class="text-center"> المندوب المرسل </th>
		            <th class="text-center"> النقاط </th>
                <th class="text-center"> الديون </th>
                <th class="text-center"> العمليات </th>

              </tr>  
            </thead>
             
            <tbody>
            @foreach($traders as $trd)
              <tr>
                   
                    <td class="text-center"> {{ $trd->code }}</td>
                    <td class="text-center"> {{ $trd->name }} </td>
                    <td class="text-center"> {{ $trd->address }} </td>
                    <td class="text-center"> {{ $trd->phone }} </td>
                    <td class="text-center"> {{ $trd->deal_type }} </td>
                    <td class="text-center"> {{ $trd->trader_type }} </td>
                    <td class="text-center"> {{ $trd->sender }} </td>
                    <td class="text-center"> {{ $trd->points}}</td>
                    <td class="text-center"> {{ $trd->debt}}</td>

                    <td class="text-center">
                      <a href="{{URL('traders/'.'edit/'.$trd->id)}}"  class="btn green btnedit" data-original="">
                        <li class="fa fa-pencil"> تعديل</li>
                      </a>
                      @if(Auth::guard('admins')->user()->flag==0)
                       <a data-url="{{URL('traders/'.'delete/'.$trd->id)}}" class="btn btn-danger btndelet"  >
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
@include('admin.pages.traders.addtrader')

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

