@extends("admin/master")

@section("title")
المستخدمين
@endsection

@section("styles")
<link href="{{asset('assets/admin/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}" 
    rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />              
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
                                    <a href="{{url('/admins/edit/'.$user->id)}}" class="btn btn green">
                                        <i class="fa fa-pencil"></i> تعديل 
                                    </a>
									<a class="btn btn red" href="#deletemodal" data-toggle="modal">
                                        <i class="fa fa-trash"></i> حذف 
                                    </a>
                                </td>                              
                            </tr>    
                            @endforeach

                        </tbody>
        </table>
    </div>
@include('admin.pages.users.adduser')    
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

        <a href="{{URL('users/'.'delete/'.$user->id)}}" id="delete" class="btn btn red"><li class="fa fa-trash"></li> مسح</a>
     
        <button type="button" class="btn btn dafault" data-dismiss="modal"><li class="fa fa-times"></li> الغاء</button>
    
      </div>
      </form>
    </div>

  </div>
</div    
@endsection        