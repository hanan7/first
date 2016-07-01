@extends("admin/master")

@section("title")
السباكين
@endsection
@section("styles")
<link href="{{asset('assets/admin/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}" 
    rel="stylesheet" type="text/css" />
            
@endsection
@section("content-title")
 <h3 class="page-title">السباكين</h3>  
@endsection

@section("content-navigat")
<ul class="page-breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="index.html">الصفحة الرئيسية</a>
    <i class="fa fa-angle-left"></i>
  </li>
  <li>
   <a href="#">السباكين</a>


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
                           تعديل سباك
                      </div>
                    </div>

                    <div  class="portlet-body form">
                       <form method="post" name="settingform" action="{{URL('plumbers/edit/'.$old->id)}}"  id="settingform" class="horizontal-form"  files="true" enctype="multipart/form-data">
                           <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                           
                            <div class="form-body">
                              <h3 class="form-section">تعديل سباك</h3>
                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">كود السباك</label>
                                        <input type="number" id="code" name="code" class="form-control "  class="form-control" value="{{$old->code}}">
                                      </div>
                                  </div>
                                
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">اسم السباك</label>
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
                                        <label class="control-label">تاريخ التعاقد</label>
                                        <input type="date" id="contract_date" name="contract_date" class="form-control" value="{{$old->contract_date}}">
                                      </div>
                                    </div>

                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">نوع التعاقد</label>
                                        <select class="form-control" name="contract_type">
                                        <option value="يومى"> يومى </option>
                                        <option value="شهرى"> شهرى </option>
                                        <option value="بالساعة"> بالساعة </option>
                                        </select>
                                      </div>
                                    </div>
                                </div> 
                                
                            <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">الراتب</label>
                                        <input type="number" id="salary" name="salary" class="form-control" 
                                        value="{{$old->salary}}">
                                      </div>
                                    </div>
                                
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">التقييم</label>
                                        <input type="number" id="numberpoint" name="numberpoint" class="form-control" placeholder="التقييم من 1 ل 5" value="{{$old->numberpoint}}">
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