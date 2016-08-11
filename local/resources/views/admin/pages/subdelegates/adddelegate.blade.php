<!-- Modal -->
<div id="adddelegate" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title bold">اضافة وكيل </h4>

      </div>
        
          <form method="post" action="{{url('subDelegates/add')}}" class=" horizontal-form" files="true" enctype="multipart/form-data">
            <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">كود الوكيل </label>
                                        <input type="number" id="code" name="code" class="form-control "  class="form-control " >
                                      </div>
                                    </div>
                                
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">اسم الوكيل </label>
                                        <input type="text" id="name" name="name" class="form-control" required>
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
                                        <label class="control-label">خط السير</label>
                                        <input type="text" id="traffic" name="traffic"  class="form-control ">
                                      </div>
                                  </div>
                                
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">رقم السيارة</label>
                                        <input type="text" id="carnumber" name="carnumber" class="form-control " >
                                      </div>
                                    </div>
                                </div> 

                                 


                                <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">نوع العمل</label>
                                        <select class="form-control" name="sortwork">
                                        <option value="يومى"> يومى </option>
                                        <option value="شهرى"> شهرى </option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">نوع الوكيل </label>
                                        <select class="form-control" name="type">
                                        <option value="وكيل  تسليم"> وكيل  تسليم </option>
                                        <option value="وكيل  مبيعات"> وكيل  مبيعات </option>
                                        </select>
                                      </div>
                                    </div>
                                </div>

                                <div class="row">   
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">التقييم</label>
                                        <input type="text" id="numberpoint" name="numberpoint" class="form-control" placeholder="التقييم من 1 ل 5">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">الراتب</label>
                                        <input type="text" id="salary" name="salary" class="form-control " >
                                      </div>
                                    </div>
                                </div>
                                
                                <h5>العهدة</h5>
                                <div class="row">   
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <input type="text" id="money" name="money" class="form-control" 
                                        placeholder="عهدة مالية">
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <input type="text" id="properties" name="properties" class="form-control" placeholder="اشياء اخرى" >
                                      </div>
                                    </div>
                                </div>  
                                 <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">نقاط رئسية</label>
                                         <input type="text" id="properties" name="main_point"
                                          class="form-control" placeholder="" >
                                       
                                      </div>
                                    </div>
                                    <div class="col-md-6">

                                     
                                      
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
 
 
