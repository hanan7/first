@extends("admin/master")
 
@section("title")
المستخدمين
@endsection

@section("styles")
<link href="{{asset('assets/admin/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css"/>
<link href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}" rel="stylesheet" type="text/css" />
         
@endsection

@section("content-title")
 <h3 class="page-title">المستخدمين</h3>  
@endsection

@section("content-navigat")
<ul class="page-breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="index.html">الصفحة الرئيسية</a>
    <i class="fa fa-angle-left"></i>
  </li>
  <li>
   <a href="#">المستخدمين</a>
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
          <i class="fa fa-eye"></i> عرض المستخدمين</div>
    </div>

    <div class="portlet-body" >
        <div class="table-toolbar">
         	<div class="row">
            	<div class="col-md-6">
              		<div class="btn-group">
               			<a  href="#addmodal" class="btn btn blue" data-toggle="modal"><i class="fa fa-plus"></i>  اضافة مستخدم
                		</a>
             		</div>
                </div>
            </div>
        </div>  

        <table id="table" class="table table-striped table-bordered table-hover table-checkable order-column">
                        <thead>
                            <tr> 
                                <th scope="col" class="text-center">
                                    الاسم
                                </th>
                                <th scope="col" class="text-center">
                                    اسم المستخدم
                                </th>
                                <th scope="col" class="text-center">
                                    الايميل
                                </th>
                                <th scope="col" class="text-center">
                                    التليفون
                                </th>
                                <th scope="col" class="text-center">
                                    العنوان
                                </th>
                                
                                <th scope="col" class="text-center">
                                    الصورة
                                </th> 
                                <th scope="col" class="text-center">
                                    معلومات اخرى
                                </th>   
                                <th scope="col" class="text-center">
                                    الادوات
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($users as $user)

                            <tr>
                               
                                <td class="text-center">
                                    {{$user->name}}
                                </td>
                                <td class="text-center">
                                    {{$user->username}}
                                </td>
                                
                                <td class="text-center">
                                    {{$user->email}}
                                </td>
                                <td class="text-center">
                                    {{$user->phone}}
                                </td>
                                <td class="text-center">
                                    {{$user->address}}
                                </td>
                                <td class="text-center">
                                  <img src="{{url('uploads/admins/'.$user->photo)  }}" style="width:100px; height:100px; "/>
                                </td>
                                <td class="text-center">
                                    {{$user->other}}
                                </td>
                                
                                <td class="text-center">
                                   
									                  <a data-url="{{URL('users/'.'delete/'.$user->id)}}" class="btn btn-danger btndelet"  >
                                      <li class="fa fa-trash">  مسح</li>
                                    </a>
                                </td>                              
                            </tr>    
                            @endforeach

                        </tbody>
        </table>
    </div>
@include('admin.pages.users.adduser')    
    <!-- Modal -->   
@endsection        


@section("layoutscripts")
        <script src="{{asset('assets/admin/global/scripts/datatable.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>

@endsection

@section("levelscripts")
 <script src="{{asset('assets/admin/pages/scripts/table-datatables-managed.min.js')}}" type="text/javascript">
  
 </script>
@endsection

