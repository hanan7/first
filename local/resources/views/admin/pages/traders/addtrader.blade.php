<!-- Modal -->
<div id="addtrader" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title">اضافة تاجر</h4>
      </div>
        
          <form method="post" action="{{url('traders/add')}}"  class=" horizontal-form">
            <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">كود التاجر</label>
                                        <input type="text" id="code" name="code" class="form-control "  class="form-control " >
                                      </div>
                                  </div>
                                
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">اسم التاجر</label>
                                        <input type="text" id="name" name="name" class="form-control "  class="form-control " required>
                                      </div>
                                  </div>
                                </div>

                                <div class="row">
 
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">العنوان</label>
                                        <input type="text" id="address" name="address" class="form-control "  class="form-control " >
                                      </div>
                                  </div>
                                
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">التليفون</label>
                                        <input type="text" id="phone" name="phone" class="form-control "  class="form-control " >
                                      </div>
                                  </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label"> النقاط</label>
                                        <input type="number" id="points" name="points" class="form-control" placeholder="نقاط التاجر" >
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">المندوب المرسل</label>
                                        <select class="form-control" name="sender">
                                        @foreach($delegate as $dele)
                                          <option value="{{$dele->name}}">{{$dele->name}}</option>
                                        @endforeach  
                                        </select>
                                      </div>
                                    </div>
                                </div> 

                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                       <label class="control-label">طرق الدفع</label>
                                        <select class="form-control" name="deal_type">
                                        <option value="نقدى"> نقدى </option>
                                        <option value="تحويل"> تحويل </option>
                                        <option value="أجل"> أجل </option>
                                        <option value="بنكى"> بنكى </option>
                                        </select>
                                      </div>
                                    </div>
                                 
                                    <div class="col-md-6">
                                      <div class="form-group">
                                       <label class="control-label">نوع التاجر</label>
                                        <select class="form-control" name="trader_type">
                                        <option value="تاجر جملة"> تاجر جملة </option>
                                        <option value="تاجر قطاعى"> تاجر قطاعى </option>
                                        </select>
                                      </div>
                                    </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-9">
                                      <div class="form-group">
                                        <label class="control-label">الديون / المستحقات</label>
                                        <input type="text" id="debt" name="debt" class="form-control "  class="form-control " >
                                      </div>
                                  </div>
                                </div>  


                                             
                </div>
    
      <div class="modal-footer">

        <button type="submit" name="submit" class="btn btn green btn1_edit"><li class="fa fa-check"></li> اضافة</button>
     
        <button type="button" class="btn btn dafault" data-dismiss="modal"><li class="fa fa-times"></li> الغاء</button>
    
      </div>
    </form> 
    </div>
  </div>
</div>
<!-- endModal -->
                     
                                  
                        