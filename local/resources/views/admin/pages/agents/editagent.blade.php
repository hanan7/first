@extends("admin/master")

@section("title")
العملاء
@endsection
@section("styles")
<link href="{{asset('assets/admin/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}" 
    rel="stylesheet" type="text/css" />
            
@endsection
@section("content-title")
 <h3 class="page-title">العملاء</h3>  
@endsection

@section("content-navigat")
<ul class="page-breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="index.html{{url('/admin')}}"fa fa-angle-left"></i>
  </li>
  <li>
   <a href="#">العملاء</a>


 </li>
                         
</ul>
@endsection
                
@section('content')
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
 
  <div class="row">
    <div class="col-md-12">
      <div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed">
        <div class="portlet box blue">
                    <div class="portlet-title">
                      <div class="caption">
                        <i class="icon-pencil"></i>
                           تعديل عميل
                      </div>
                    </div>

                    <div  class="portlet-body form">
                       <form method="post" name="settingform" action="{{URL('agents/edit/'.$old->id)}}"  id="settingform" class="horizontal-form"  files="true" enctype="multipart/form-data">
                           <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                           
                            <div class="form-body">
                              <h3 class="form-section">تعديل عميل</h3>
                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">كود العميل</label>
                                        <input type="number" id="code" name="code" class="form-control "  class="form-control" value="{{$old->code}}">
                                      </div>
                                  </div>
                                
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">اسم العميل</label>
                                        <input type="text" id="name" name="name" class="form-control" 
                                        value="{{$old->name}}">
                                      </div>
                                    </div>
                                </div>  
                                  
                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">العنوان</label>
                                        <input type="text" id="address" name="address" class="form-control" 
                                        value="{{$old->address}}">
                                      </div>
                                  </div>
                                
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">التليفون</label>
                                        <input type="text" id="phone" name="phone" class="form-control"
                                        value="{{$old->phone}}" >
                                      </div>
                                  </div>
                                </div>

                                 <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">نقاط البيع</label>
                                        <input type="number" id="buy_points" name="buy_points"  class="form-control" value="{{$old->buy_points}}">
                                      </div>
                                  </div>  
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">نقاط المرتجع</label>
                                        <input type="number" id="back_points" name="back_points"  class="form-control" value ="{{$old->back_points}}">
                                      </div>
                                  </div>   
                                </div>  
                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">الصورة</label>
                                        <input type="file" id="image" name="image"  class="form-control" >
                                      </div>
                                  </div>  
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">رقم البطاقة</label>
                                        <input type="number" id="credit" name="credit"  class="form-control" value="{{$old->credit}}">
                                      </div>
                                  </div>   
                                </div>
                              
                            </div>  
                          <div class="form-actions">
                            <div class="col-md-12 text-center" >
                              <button type="submit"  name="submit" class="btn green btn_save">
                              <i class="fa fa-pencil"></i> تعديل</button>
                              <a href="{{url('agents/all-agents')}}" type="button" class="btn default btn_save">
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