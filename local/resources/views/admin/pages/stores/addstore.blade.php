<!-- Modal -->
<div id="addstore" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">اضافة مخزن</h4>
      </div>
        
          <form method="post" name="productform" action="{{url('stores/add')}}" class=" horizontal-form">
            <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">اسم المخزن</label>
                                        <input type="text" id="name" name="name" class="form-control "  class="form-control " >
                                      </div>
                                  </div>
                                
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">رقم المخزن</label>
                                        <input type="number" id="number" name="number" class="form-control " >
                                      </div>
                                    </div>
                                </div>  
                                    
                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">العنوان</label>
                                        <input type="text" id="address" name="address"  class="form-control " >
                                      </div>
                                  </div>
                                
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">التليفون</label>
                                        <input type="text" id="phone" name="phone"  class="form-control " >
                                      </div>
                                  </div>
                                </div> 

                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">امين المخزن</label>
                                        <input type="text" id="storekeeper" name="storekeeper" class="form-control">
                                      </div>
                                  </div>
                                
                                   <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">عدد العمال الموجودين</label>
                                        <input type="text" id="workers_no" name="workers_no" class="form-control " >
                                      </div>
                                    </div>
                                </div> 

                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">رقم الفاتورة</label>
                                        <input type="text" id="invoice_no" name="invoice_no" class="form-control">
                                      </div>
                                  </div>
                                
                                   <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">عدد ادوار المخزن</label>
                                        <input type="text" id="laborers" name="laborers" class="form-control " >
                                      </div>
                                    </div>
                                </div> 

                                <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">نوع المحتوى</label>
                                        <input type="text" id="content_type" name="content_type" class="form-control" >
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">البضائع الموجودة</label>
                                        <textarea id="goods" name="goods" class="form-control"></textarea>
                                      </div>
                                    </div>
                                </div>                
                </div>
    
      <div class="modal-footer">

        <button type="submit" name="submit" class="btn btn green"><li class="fa fa-check"></li> اضافة</button>
     
        <button type="button" class="btn btn dafault" data-dismiss="modal"><li class="fa fa-times"></li> الغاء</button>
    
      </div>
    </form> 
    </div>
  </div>
</div>
<!-- endModal -->