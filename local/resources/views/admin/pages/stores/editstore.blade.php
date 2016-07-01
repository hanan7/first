@extends("admin/master")

@section("title")
المخازن
@endsection
@section("styles")
<link href="{{asset('assets/admin/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}" 
    rel="stylesheet" type="text/css" />
            
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
  <div class="row">
    <div class="col-md-12">
      <div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed">
        <div class="portlet box blue">
                    <div class="portlet-title">
                      <div class="caption">
                        <i class="icon-pencil"></i>
                           تعديل مخزن
                      </div>
                    </div>

                    <div  class="portlet-body form">
                       <form method="post" name="settingform" action="{{URL('stores/edit/'.$old->id)}}"  id="settingform" class="horizontal-form"  files="true" enctype="multipart/form-data">
                           <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                           
                            <div class="form-body">
                              <h3 class="form-section">تعديل مخزن</h3>
                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">اسم المخزن</label>
                                        <input type="text" id="name" name="name" class="form-control "  class="form-control " value="{{$old->name}}">
                                      </div>
                                  </div>
                                
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">رقم المخزن</label>
                                        <input type="number" id="number" name="number" class="form-control"
                                        value="{{$old->number}}" >
                                      </div>
                                    </div>
                                </div>  
                                
                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">العنوان</label>
                                        <input type="text" id="address" name="address"  class="form-control"
                                        value="{{$old->address}}" >
                                      </div>
                                  </div>
                                
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">التليفون</label>
                                        <input type="text" id="phone" name="phone"  class="form-control"
                                        value="{{$old->phone}}" >
                                      </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">امين المخزن</label>
                                        <input type="text" id="storekeeper" name="storekeeper" class="form-control"
                                        value="{{$old->storekeeper}}">
                                      </div>
                                  </div>
                                
                                   <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">عدد العمال الموجودين</label>
                                        <input type="text" id="workers_no" name="workers_no" class="form-control"
                                        value="{{$old->workers_no}}" >
                                      </div>
                                    </div>
                                </div>

                                 <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">رقم الفاتورة</label>
                                        <input type="text" id="invoice_no" name="invoice_no" class="form-control"
                                        value="{{$old->invoice_no}}">
                                      </div>
                                  </div>
                                
                                   <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">عدد ادوار المخزن</label>
                                        <input type="text" id="laborers" name="laborers" class="form-control"
                                        value="{{$old->laborers}}" >
                                      </div>
                                    </div>
                                </div> 

                                <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">نوع المحتوى</label>
                                        <input type="text" id="content_type" name="content_type" class="form-control" value="{{$old->content_type}}">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">البضائع الموجودة</label>
                                        <textarea id="goods" name="goods" class="form-control" value="{{$old->goods}}"></textarea>
                                      </div>
                                    </div>
                                </div> 
                               
                              
                            </div>  
                          <div class="form-actions">
                            <div class="col-md-12 text-center" >
                              <button type="submit"  name="submit" class="btn green btn_save">
                              <i class="fa fa-pencil"></i> تعديل</button>
                              <button type="button" class="btn default btn_save">
                              <i class="fa fa-times"></i> الغاء</button> 
                            </div>      
                          </div>
                        </form>
                    </div>
        </div>
      </div>
    </div>
  </div>
@endsection                     