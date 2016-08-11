<!-- Modal -->
<div id="addemployee" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title bold">اضافة موظف</h4>
      </div>
        
          <form method="post" name="productform" action="{{url('employees/add')}}" class="horizontal-form">
            <input type="hidden"  name="_token" value="{{ csrf_token() }}">
              <div class="modal-body">
                               <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">كود الموظف</label>
                                        <input type="number" id="code" name="code" class="form-control " >
                                      </div>
                                  </div>
                                
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">اسم الموظف</label>
                                        <input type="text" id="name" name="name" class="form-control "required
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
                                        <label class="control-label">الوظيفة</label>
                                        <input type="" id="job" name="job" class="form-control">
                                      </div>
                                    </div>

                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">الراتب</label>
                                        <input type="number" id="salary" name="salary" class="form-control " >
                                      </div>
                                    </div> 
                                </div>  

                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">تاريخ التعاقد</label>
                                        <input type="date" id="contract_date" name="contract_date" 
                                         class="form-control ">
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">تاريخ الانتهاء</label>
                                        <input type="date" id="end_date" name="end_date" 
                                         class="form-control ">
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