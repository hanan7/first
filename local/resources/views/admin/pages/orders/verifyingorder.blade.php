<!-- Modal -->
<div id="adddelegate" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">تعديل الطلبية</h4>
      </div>
        
          <form method="post" name="productform" action="{{url('delegates/add')}}" class=" horizontal-form" files="true">
            <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                <div class="modal-body">
                             
                                
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">اسم التاجر</label>
                                        <input type="number" id="name" name="name" value="{{ $old->name }}" class="form-control " >
                                      </div>
                                    </div>
                                </div>  
                                
                                    
                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">العنوان</label>
                                        <input type="text" id="address" name="address" value="{{ $old->address }}" class="form-control " >
                                      </div>
                                  </div>
                                
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">التليفون</label>
                                        <input type="text" id="telephone" name="telephone" value="{{ $old->phone }}" class="form-control " >
                                      </div>
                                  </div>
                                </div>   

				 <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">مندوب المبيعات المرسل</label>
                                        <input type="text" id="delegate_sender" name="delegate_sender" value="{{ $old->delegate_sender }}"
   				        class="form-control " >
                                      </div>
                                  </div>
                                </div>   

				 <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">السباك المرسل </label>
                                        <input type="text" id="delegate_sender" name="delegate_sender" value="{{ $old->plumber_sender }}"
   				        class="form-control " >
                                      </div>
                                  </div>
                                </div> 

                               <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">التاريخ</label>
                                        <input type="number" id="date" name="date" value="{{ $old->date }}" class="form-control " >
                                      </div>
                                    </div>
				</div>
				<div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">الأصناف</label>
                                        <input type="number" id="goods" name="goods" value="{{ $old->goods }}"  class="form-control " >
                                      </div>
                                    </div>
				</div>
				<div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">الكمية</label>
                                        <input type="number" id="quantities" name="quantities" value="{{ $old->quantities }}"
                                         class="form-control " >
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
