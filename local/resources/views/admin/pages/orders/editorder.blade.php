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
    <a href="index.html">الصفحة الرئيسية</a>
    <i class="fa fa-angle-left"></i>
  </li>
  <li>
   <a href="#">الطلبيات</a>


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
                                        <label class="control-label">اسم التاجر</label>
                                        <input type="text" id="trader_name" name="trader_name" class="form-control" 
                                        value="{{$old->trader_name}}"> 
                                      </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">رقم التليفون</label>
                                        <input type="number" id="phone" name="phone" class="form-control" 
                                        value="{{$old->phone}}"> 
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
                                </div>

                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">اسم الصنف</label>
                                        <input type="text" id="goods" name="goods" value="{{$old->goods}}"
                                          class="form-control " >
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

                                <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">المندوب المرسل</label>
                                         <select class="form-control" name="delegate_sender">
                                        @foreach($delegates as $dele)
                                          <option value="{{$dele->name}}">{{$dele->name}}</option>
                                        @endforeach  
                                        </select>
                                      </div>
                                    </div>
                                </div> 

                                <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">السباك المرسل</label>
                                        <select class="form-control" name="plumber_sender">
                                        @foreach($plumbers as $plum)
                                          <option value="{{$plum->name}}">{{$plum->name}}</option>
                                        @endforeach  
                                        </select>
                                      </div>
                                    </div>
                                </div> 

                                 <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">تاريخ المعاينة</label>
                                        <input type="date" id="check_date" name="check_date" 
                                        value="{{$old->check_date}}" class="form-control " >
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