<!-- Modal -->
<div id="addseed" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title bold">اضافة اصل جديد</h4>
      </div>
        
          <form method="post" name="productform" action="{{url('seeds/add')}}" class=" horizontal-form">
            <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">الاصل</label>
                                        <input type="text" id="seed" name="seed" class="form-control "  class="form-control " required>
                                      </div>
                                  </div>
                               
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">القيمة</label>
                                        <input type="number" id="value" name="value" class="form-control " >
                                      </div>
                                    </div>
                                </div>  
                                    
                                <div class="row" style="margin-left:40px;">
                                    <div class="col-md-4">
                                      <div class="form-group">
                                        <label class="control-label">معدل الاهلاك السنوى</label>
                                        <div class="input-group">
                                            <input type="text" id="cons_rate" name="cons_rate"  class="form-control ">
                                            <span class="input-group-addon">
                                           <i>%</i>   
                                        </span>
                                        </div>
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