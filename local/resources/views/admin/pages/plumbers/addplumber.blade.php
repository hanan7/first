<!-- Modal -->
<div id="addplumber" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">اضافة سباك</h4>
      </div>
        
          <form method="post"  action="{{url('plumbers/add')}}" class=" horizontal-form" >
            <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                <div class="modal-body">
                               <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">كود السباك</label>
                                        <input type="number" id="code" name="code" class="form-control " >
                                      </div>
                                  </div>
                                
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">اسم السباك</label>
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
                                        <input type="text" id="phone" name="phone"  class="form-control " >
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
                                        <label class="control-label">نوع التعاقد</label>
                                        <select class="form-control" name="contract_type">
                                          <option value="يومى"> يومى  </option>
                                          <option value="شهرى"> شهرى  </option>
                                          <option value="بالساعة">  بالساعة </option>
                                        </select>
                                      </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">الراتب</label>
                                        <input type="number" id="salary" name="salary" class="form-control " >
                                      </div>
                                    </div>
                                
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">التقييم</label>
                                        <input type="number" id="numberpoint" name="numberpoint" class="form-control" placeholder="التقييم من 1 ل 5">
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