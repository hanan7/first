<!-- Modal -->
<div id="addmodal" class="modal fade" role="dialog" style="overflow:scroll;">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title bold">اضافة منتج</h4>

      </div>
        
          <form method="post" name="productform" action="{{url('products/add')}}" class=" horizontal-form"
           files="true" enctype="multipart/form-data">
            <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                <div class="modal-body"  style="overflow-y:scroll;">
                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">كود المنتج</label>
                                        <input type="number" id="code" name="code"  class="form-control " >
                                      </div>
                                  </div>
                                   <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">اسم المنتج</label>
                                        <input type="text" id="name" name="name" class="form-control " required>
                                      </div>
                                    </div>
                                </div>  
                                <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">النقاط</label>
                                        <input type="number" id="points" name="points" class="form-control " >
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">الكمية</label>
                                        <input type="number" id="quantity" name="quantity" class="form-control " >
                                      </div>
                                    </div>
                                </div>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">اسم المخزن</label>
                                         <select class="form-control" name="store">
                                        @foreach($store as $store)
                                          <option value="{{$store->name}}">{{$store->name}}</option>
                                        @endforeach  
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">الشركة الموردة</label>
                                        <input type="text" id="company" name="company" class="form-control " >
                                      </div>
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">سعر الشراء</label>
                                        <input type="text" id="b_price" name="b_price" class="form-control " >
                                      </div>
                                    </div>
                                
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">سعر البيع</label>
                                        <input type="text" id="s_price" name="s_price" class="form-control " >
                                      </div>
                                    </div>
                                  </div> 
                                
                                <div class="row">
                                  <div class="col-md-9">
                                      <div class="form-group">
                                        <label class="control-label">الوصف</label>
                                        <textarea id="desc" name="desc"  class="form-control " ></textarea>
                                      </div>
                                  </div>
                                </div>  

                                <div class="row">
                                  <div class="col-md-9">
                                      <div class="form-group">
                                        <label class="control-label">الصورة</label>
                                        <input type="file" id="image" name="image"  class="form-control " >
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
 
 
