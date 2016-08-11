@extends("admin/master")

@section("title")
الموظفين
@endsection
@section("page-style")
<link href="{{asset('assets/admin/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}" 
              rel="stylesheet" type="text/css" />
@endsection
@section("content-title")
 <h3 class="page-title">الموظفين</h3>  
@endsection

@section("content-navigat")
<ul class="page-breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="{{url('/admin')}}">الصفحة الرئيسية</a>
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
 <?php $a=[];
 $a = session()->pull('success');
 ?>
    <div class="alert alert-success alert-dismissable">
      <button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
     {{$a[0]}}
    
    </div>
 @endif
  @if(session()->has('danger'))
    <div class="alert alert-warrning alert-dismissable">
      <button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
      <p>{{session()->get('danger')}} </p>
    
    </div>
  @endif 
  <div class="row">
    <div class="col-md-12">
      <div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed">
        <div class="portlet box green">
                    <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-plus"></i>
                                    تعديل الموظفين
                                </div>
                            </div>

                    <div  class="portlet-body form">
                       <form method="post" name="settingform" action="{{URL('employees/edit/'.$old->id)}}"  id="settingform" class="horizontal-form"  files="true" enctype="multipart/form-data">
                           <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                           
                        <div class="form-body">
                              <h3 class="form-section">تعديل موظف</h3>
                            
                               <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">كود الموظف</label>
                                        <input type="number" id="code" name="code" class="form-control" 
                                        value="{{$old->code}}">
                                      </div>
                                  </div>
                                
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">اسم الموظف</label>
                                        <input type="text" id="name" name="name" class="form-control" 
                                        value="{{$old->name}}">
                                      </div>
                                    </div>
                                </div>  
                                
                                    
                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">العنوان</label>
                                        <input type="text" id="address" name="address"  class="form-control" 
                                        value="{{$old->address}}">
                                      </div>
                                  </div>
                                
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">التليفون</label>
                                        <input type="text" id="phone" name="phone"  class="form-control" value="{{$old->phone}}">
                                      </div>
                                  </div>
                                </div>

                                 <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">الوظيفة</label>
                                        <input type="" id="job" name="job" class="form-control"
                                        value="{{$old->job}}">
                                      </div>
                                    </div>

                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">الراتب</label>
                                        <input type="number" id="salary" name="salary" class="form-control" value="{{$old->salary}}">
                                      </div>
                                    </div> 
                                </div>  

                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">تاريخ التعاقد</label>
                                        <input type="date" id="contract_date" name="contract_date" 
                                         class="form-control" value="{{$old->contract_date}}">
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">تاريخ الانتهاء</label>
                                        <input type="date" id="end_date" name="end_date" 
                                         class="form-control" value="{{$old->end_date}}">
                                      </div>
                                  </div>
                                </div> 
                        </div>
                          <div class="form-actions">
                            <div class="col-md-12 text-center" >
                              <button type="submit"  name="submit" class="btn green btn_save">
                              <i class="fa fa-pencil"></i> تعديل</button>
                             <a href="{{url('employees/all-employees')}}" type="button" class="btn default btn_save">
                              <i class="fa fa-times"></i> الغاء</a> 
                            </div>      
                          </div>
                       </form>
                    </div>
                 </div>
                    
                    
                </div>
            </div>
        </div>
@endsection