@extends("admin/master")

@section("title")
الطلبيات
@endsection
@section("styles")
<link href="{{asset('assets/admin/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}" 
    rel="stylesheet" type="text/css" />
            
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
                           تعديل طلبية
                      </div>
                    </div>

                    <div  class="portlet-body form">
                       <form method="post" name="settingform" action="{{URL('orders/edit/'.$old->id)}}"  id="settingform" class="horizontal-form"  files="true" enctype="multipart/form-data">
                           <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                           
                            <div class="form-body">
                              <h3 class="form-section">تأكيد طلبية</h3>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">كود الصنف</label>
                                        <input type="text" id="code" name="code" class="form-control" 
                                        value="{{$old->code}}"> 
                                      </div>
                                    </div>
                                </div>

                               

                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">اسم الصنف</label>
                                        <input type="text" id="name" name="name" class="form-control " value="{{$old->name}}">
                                      </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">الكمية</label>
                                        <input type="number" id="qty" name="qty" value="{{$old->qty}}"
                                         class="form-control " >
                                      </div>
                                    </div>
                                </div> 

                               
                            </div>  
                          <div class="form-actions">
                            <div class="col-md-12 text-center" >
                              <button type="submit"  name="submit" class="btn green btn_save">
                              <i class="fa fa-pencil"></i> تعديل</button>
                             <a href="{{url('orders/all-orders')}}" type="button" class="btn default btn_save">
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