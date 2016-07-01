<!-- Modal -->
<div id="addorder" class="modal fade" role="dialog"> 
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">اضافة طلبية</h4> 
      </div>
        
          <form method="post" action="{{url('orders/add')}}" class=" horizontal-form" files="true">
            <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                <div class="modal-body">
                    <input type="hidden" name="trader_id" value="trader_id">

                                <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">اسم التاجر</label>
                                        <input type="text" id="trader_name" name="trader_name" class="form-control " > 
                                      </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">رقم التليفون</label>
                                        <input type="number" id="phone" name="phone" class="form-control " > 
                                      </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">العنوان</label>
                                        <input type="text" id="address" name="address" class="form-control " > 
                                      </div>
                                    </div>
                                </div>

				                        <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">اسم الصنف</label>
                                        <input type="text" id="goods" name="goods" class="form-control " > 
                                      </div>
                                    </div>
				                        </div>

				                        <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">الكمية</label>
                                        <input type="number" id="qty" name="qty" class="form-control " >
                                      </div>
                                    </div>
				                        </div>

                                <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">تاريخ المعاينة</label>
                                        <input type="date" id="check_date" name="check_date" class="form-control " >
                                      </div>
                                    </div>
                                </div>
                </div>
    
            <div class="modal-footer">
              <button type="submit" name="submit" class="btn btn green"><li class="fa fa-check"></li> اضافة</button>
              <button type="button" class="btn btn dafault" data-dismiss="modal">
              <li class="fa fa-times"></li> الغاء</button>
            </div>
          </form> 
    </div>
  </div>
</div>
<!-- endModal -->
