@extends("admin/master")

@section("title")
رسائل الاعضاء
@endsection
@section("styles")
<link href="{{asset('assets/admin/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}" 
    rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />              
@endsection
@section("content-title")
 <h3 class="page-title">رسائل الاعضاء</h3>  
@endsection

@section("content-navigat")
<ul class="page-breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="{{url('/admin')}}">الصفحة الرئيسية</a>
    <i class="fa fa-angle-left"></i>
  </li>
  <li>
   <a href="#">رسائل الاعضاء</a>


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
          <i class="fa fa-eye"></i> عرض رسائل الاعضاء</div>
    </div>

    <div class="portlet-body" >
        <div class="table-toolbar">
         <div class="row">
            <div class="col-md-6">
              <div class="btn-group">
                <a  href="#addmsg" data-toggle="modal" class="btn btn yellow" ><i class="fa fa-plus"></i>  ارسال رسالة
                </a>
              </div>
            </div>
          </div>
        </div>  

      
         <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
            <thead>
              <tr>
                <th class="text-center"> رقم الرسالة </th>
                <th class="text-center"> اسم المرسل</th>
                <th class="text-center"> المحتوى</th>
                <th class="text-center">العمليات</th>
              </tr>
            </thead>
             
            <tbody>
            @foreach($msg as $msg)
              <tr>
                   
                    <td class="text-center"> {{ $msg->id }}</td>

                    <td class="text-center"> {{ $msg->admin->name }}</td>
                    <td class="text-center"> {{ $msg->content }} </td>
                  
                
                    <td class="text-center">
               
                      <a data-url="{{URL('msgs/'.'delete/'.$msg->id)}}" class="btn btn-danger btndelet"  >
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


<!-- Modal -->
<div id="addmsg" class="modal fade" role="dialog">
  <div class="modal-dialog">
 <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title bold">رسالة جديدة</h4>
      </div>
        
          <form method="post"  action="{{url('msgs/add-msg')}}" class="horizontal-form">
            <input type="hidden"  name="_token" value="{{ csrf_token() }}">
              <div class="modal-body">
                               <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">الى</label>
                                        <input type="text" id="name" name="name" class="form-control " >
                                      </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">المحتوى</label>
                                        <textarea id="content" name="content" class="form-control " ></textarea>
                                      </div>
                                  </div>
                                </div>
                                
              </div>
    
      <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn green"><li class="fa fa-check"></li> ارسال</button>  
        <button type="button" class="btn btn dafault" data-dismiss="modal"><li class="fa fa-times"></li> الغاء</button>
    
      </div>
    </form> 
    </div>
  </div>
</div>
<!-- endModal -->

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

