@extends("admin/master")

@section("title")
المندوبين
@endsection
@section("styles")
<link href="{{asset('assets/admin/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}" 
    rel="stylesheet" type="text/css" />
            
@endsection
@section("content-title")
 <h3 class="page-title">المندوبين</h3>  
@endsection

@section("content-navigat")
<ul class="page-breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="index.html">الصفحة الرئيسية</a>
    <i class="fa fa-angle-left"></i>
  </li>
  <li>
   <a href="#">المندوبين</a>


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
                           تعديل مندوب
                      </div>
                    </div>

                    <div  class="portlet-body form">
                       <form method="post" name="settingform" action="{{URL('delegates/edit/'.$old->id)}}"  id="settingform" class="horizontal-form"  files="true" enctype="multipart/form-data">
                           <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                            
                            <div class="form-body">
                              <h3 class="form-section">تعديل مندوب</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">كود المندوب</label>
                                        <input type="text" id="code" name="code" class="form-control" 
                                        value="{{$old->code}}">
                                      </div>
                                    </div>
                                
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">اسم المندوب</label>
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
                                        value="{{$old->address}}" >
                                      </div>
                                  </div>
                                
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">التليفون</label>
                                        <input type="number" id="phone" name="phone"  class="form-control"
                                        value="{{$old->phone}}" >
                                      </div>
                                  </div>
                                </div>   
                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">خط السير</label>
                                        <input type="text" id="traffic" name="traffic" class="form-control"
                                        value="{{$old->traffic}}">
                                      </div>
                                  </div>
                                
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">رقم السيارة</label>
                                        <input type="number" id="carnumber" name="carnumber" class="form-control" 
                                        value="{{$old->carnumber}}">
                                      </div>
                                    </div>
                                </div> 
                               <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">نوع العمل</label>
                                        <select class="form-control" name="sortwork">
                                        <option value="يومى"> يومى </option>
                                        <option value="شهرى"> شهرى </option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">نوع المندوب</label>
                                        <select class="form-control" name="type">
                                        <option value="مندوب تسليم"> مندوب تسليم </option>
                                        <option value="مندوب مبيعات"> مندوب مبيعات </option>
                                        </select>
                                      </div>
                                    </div>
                                </div>

                                <div class="row">   
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">التقييم</label>
                                        <input type="text" id="numberpoint" name="numberpoint" class="form-control" 
                                        value="{{$old->numberpoint}}" placeholder="التقييم من 1 ل 5">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">الراتب</label>
                                        <input type="text" id="salary" name="salary" class="form-control" 
                                        value="{{$old->salary}}">
                                      </div>
                                    </div>
                                </div>
                                
                                <h5>العهدة</h5>
                                <div class="row">   
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <input type="text" id="money" name="money" class="form-control" 
                                        placeholder="عهدة مالية" value="{{$old->money}}">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <input type="text" id="properties" name="properties" class="form-control" placeholder="اشياء اخرى" value="{{$old->properties}}">
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