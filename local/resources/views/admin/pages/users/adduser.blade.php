<!-- Modal -->
<div id="addmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title bold">اضافة مستخدم</h4>
      </div>
        <form method="post"  action="{{url('users/add')}}" class=" horizontal-form" files="true" enctype="multipart/form-data">
            <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">الاسم</label>
                                        <input type="text" id="name" name="name"  class="form-control " >
                                      </div>
                                  </div>
                                
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">اسم المستخدم</label>
                                        <input type="text" id="username" name="username"  class="form-control " placeholder="المستخدم فى تسجيل الدخول">
                                      </div>
                                  </div>
                                </div> 
                                <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">كلمة السر</label>
                                        <input type="password" id="password" name="password" class="form-control " >
                                      </div>
                                    </div>
                                
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">نوع المستخدم</label>
                                        <select name="roles_select"  class="form-control select2_sample1">
                                          <option value="0">مدير</option> 
                                          <option value="1">ادارى</option>
                                          <option value="2">تاجر</option> 
                                          <option value="3">عميل</option> 
                                          <option value="4">وكيل</option> 
                                          
                                        </select> 
                                      </div>
                                    </div>
                                </div> 
                                <div class="row"> 
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">الايميل</label>
                                        <input type="email" id="email" name="email" class="form-control " >
                                      </div>
                                    </div>
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
                                        <label class="control-label">التليفون</label>
                                        <input type="number" id="phone" name="phone" class="form-control " >
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">الصورة</label>
                                        <input type="file" id="photo" name="photo" class="form-control " >
                                      </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-9">
                                      <div class="form-group">
                                        <label class="control-label">بيانات اخرى</label>
                                        <textarea id="other" name="other" class="form-control "></textarea>
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



