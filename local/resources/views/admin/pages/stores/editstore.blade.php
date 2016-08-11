<script src="{{asset('assets/admin/global/plugins/jquery.min.js')}}" type="text/javascript">
</script>

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
                                        <label class="control-label">نوع المخزن</label>

                                        @if(!empty($storesType))
                                        <select class="form-control" name="store_type" 
                                        id="storetype">
                                          <option>اختر نوع المخزن</option>
                                         @foreach($storesType as $t)
                                         <option 
                                         @if($old->store_type === $t->id)
                                          selected="selected"
                                         @endif
                                          value="{{$t->id}}">{{$t->type}}</option>
                                         @endforeach
                                         </select>
                                         @endif

                                      </div>
                                    </div>
                                    <!-- style="display:none"-->
                                     <div class="col-md-6" >
                                      <div class="form-group"  id="x" style="display:none">
                                        <label class="control-label">الحد الائتمانى</label>
                                        <input type="text"
                                         name="range" 
                                          value="{{$old->range}}"
                                         class="form-control" >
                                      </div>
                                    </div>
                                   
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">نوع المحتوى</label>
                                        <input type="text" id="content_type" 
                                        name="content_type" class="form-control" 
                                        value="{{$old->content_type}}">
                                      </div>
                                    </div>
                                    
                                </div> 
                               
                              
                            </div>  
                          <div class="form-actions">
                            <div class="col-md-12 text-center" >
                              <button type="submit"  name="submit" class="btn green btn_save">
                              <i class="fa fa-pencil"></i> تعديل</button>
                              <a href="{{url('stores/all-stores')}}" type="button" class="btn default btn_save">
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
<script>

jQuery(document).ready(function()
{
  var rang={{$old->store_type}};
  //alert(rang);
  if(rang==6)
  {

  $('#x').css('display','block');

  }else
  {
    $('#x').css('display','none');

  }
  

//display input if store type =wakeil
$('#storetype').change(function(){
  var x=$(this);
  if(x.val()==6)
  {
    $('#x').css('display','block');

  }else
  {
    $('#x').css('display','none');

  }
})

})

</script>