@extends("admin/master")

@section("title")
التجار
@endsection
@section("styles")
<link href="{{asset('assets/admin/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}" 
    rel="stylesheet" type="text/css" />
            
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
                           تعديل تاجر
                      </div>
                    </div>

                    <div  class="portlet-body form">
                       <form method="post" name="settingform" action="{{URL('traders/edit/'.$old->id)}}"  id="settingform" class="horizontal-form"  files="true" enctype="multipart/form-data">
                           <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                           
                            <div class="form-body">
                              <h3 class="form-section">تعديل تاجر</h3>

                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">كود التاجر</label>
                                        <input type="text" id="code" name="code" class="form-control "  class="form-control" value="{{$old->code}}" >
                                      </div>
                                  </div>
                                
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">اسم التاجر</label>
                                        <input type="text" id="name" name="name" class="form-control "  class="form-control" value="{{$old->name}}">
                                      </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">العنوان</label>
                                        <input type="text" id="address" name="address" class="form-control "  class="form-control" value="{{$old->address}}">
                                      </div>
                                  </div>
                                
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">التليفون</label>
                                        <input type="text" id="phone" name="phone" class="form-control "  class="form-control" value="{{$old->phone}}">
                                      </div>
                                  </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">النقاط</label>
                                        <input type="number" id="points" name="points" class="form-control" value="{{$old->points}}" placeholder="نقاط التاجر">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">المندوب المرسل</label>
                                        <select class="form-control" name="sender">
                                        @foreach($delegate as $dele)
                                          <option value="{{$dele->name}}">{{$dele->name}}</option>
                                        @endforeach  
                                        </select>
                                      </div>
                                    </div>
                                </div> 

                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                       <label class="control-label">طرق الدفع</label>
                                        <select class="form-control" name="deal_type">
                                        <option value="{{ $old->deal_type }}"> {{ $old->deal_type }} </option>
                                        <option value="نقدى"> نقدى </option>
                                        <option value="تحويل"> تحويل </option>
                                        <option value="أجل"> أجل </option>
                                        <option value="بنكى"> بنكى </option>
                                        </select>
                                      </div>
                                    </div>
                                 
                                  <div class="col-md-6">
                                      <div class="form-group">
                                       <label class="control-label">نوع التاجر</label>
                                        <select class="form-control" name="trader_type">
                                        <option value="{{ $old->trader_type }}"> {{ $old->trader_type }} </option>
                                        <option value="تاجر جملة"> تاجر جملة </option>
                                        <option value="تاجر قطاعى"> تاجر قطاعى </option>
                                        </select>
                                      </div>
                                    </div>
                                </div>
                                 <div class="row">
                                  <div class="col-md-9">
                                      <div class="form-group">
                                        <label class="control-label">الديون / المستحقات</label>
                                        <input type="text" id="debt" name="debt" class="form-control "  class="form-control " value="{{$old->debt}}">
                                      </div>
                                  </div>
                                </div>  

                               
                            </div>  
                          <div class="form-actions">
                            <div class="col-md-12 text-center" >
                              <button type="submit"  name="submit" class="btn green btn_save">
                              <i class="fa fa-pencil"></i> تعديل</button>
                              <a href="{{url('traders/all-traders')}}" type="button" class="btn default btn_save">
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