<!-- Modal -->
<div id="addsupplier" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">اضافة مورد</h4>
      </div>
        
          <form method="post" action="{{url('suppliers/add')}}" class=" horizontal-form" files="true">
            <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">كود المورد</label>
                                        <input type="text" id="code" name="code" class="form-control "  class="form-control " >
                                      </div>
                                  </div>
                                
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">اسم المورد</label>
                                        <input type="text" id="name" name="name" class="form-control " >
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
                                        <input type="number" id="phone" name="phone"  class="form-control " >
                                      </div>
                                  </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">نوع التوريد</label>
                                        <select class="form-control" name="type">
                                        <option value="يومى"> يومى </option>
                                        <option value="اسبوعى"> اسبوعى </option>
                                        <option value="شهرى"> شهرى </option>
                                        <option value="سنوى"> سنوى </option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">المخازن المستلمة</label>
                                        <input type="text" id="recipient_stores" name="recipient_stores" class="form-control " >
                                      </div>
                                    </div>
                                </div> 
                                
                                <div class="row">
  				                          <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">الاصناف الموردة</label>
                                        <textarea id="varieties" name="varieties" class="form-control "></textarea>
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
