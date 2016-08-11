<!-- Modal -->
<div id="addagent" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title bold">اضافة عميل</h4>
      </div>
        
          <form method="post"  action="{{url('agents/add')}}" class=" horizontal-form"  files="true" enctype="multipart/form-data">
            <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                <div class="modal-body">
                                <div class="row">
                                   <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">اسم العميل</label>
                                        <input type="text" id="name" name="name" class="form-control" required >
                                      </div>
                                    </div>

                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">الصورة</label>
                                        <input type="file" id="image" name="image"  class="form-control" required>
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
                                        <label class="control-label">نقاط البيع</label>
                                        <input type="number" id="buy_points" name="buy_points"  class="form-control" >
                                      </div>
                                  </div>  
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">نقاط المرتجع</label>
                                        <input type="number" id="back_points" name="back_points"  class="form-control">
                                      </div>
                                  </div>   
                                </div>  
                                <div class="row">
                                  <div class="col-md-9">
                                      <div class="form-group">
                                        <label class="control-label">رقم البطاقة</label>
                                        <input type="number" id="credit" name="credit"  class="form-control">
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