<div id="addmodal"  class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title bold">اضافة منتج</h4>

            </div>

            <form method="post" name="productform" action="{{url('products/add')}}" class=" horizontal-form" files="true" enctype="multipart/form-data">
                <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                <div class="modal-body">
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
                                <label class="control-label">نقاط المبيعات</label>
                                <input type="number" id="points" min='0' value="0" name="points" class="form-control " >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">نقاط مرتجع</label>
                                <input type="number" id="points" min='0' value="0" name="dmg_points" class="form-control " >
                            </div>
                        </div>                        
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">اسم المخزن</label>
                                <select class="form-control" name="store">
                                    @foreach($store as $store)
                                    <option value="{{$store->id}}">{{$store->name}}</option>
                                    @endforeach  
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">اسم الصنف</label>
                                <select class="form-control text-capitalize" name="sub_cat_id">
                                    @foreach($sub_cats as $sub_cat)
                                    <option value="{{$sub_cat->id}}">{{$sub_cat->category->name . ' >>> ' . $sub_cat->name }}</option>
                                    @endforeach  
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">سعر الشراء</label>
                                <input type="number" id="b_price" min='0' value="1" name="b_price" class="form-control " >
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">سعر البيع</label>
                                <input type="number" id="s_price" min='0' value="1" name="s_price" class="form-control " >
                            </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label">عدد الكراتين</label>
                                <input type="number" id="box-count" min='1' value="1" name="box_count" class="form-control " >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="control-label ">عدد القطع داخل كل كرتونه</label>
                                <input type="number" id="box-items-count" min='1' value="1" name="box_items_count" class="form-control " >
                            </div>
                        </div>
                        <div class="col-md-4 text-left">
                                <div class="form-group" style="line-height: 85px;">
                                    = <span id="box-total" min=0 ></span>&nbsp;قطعه
                                </div>
                        </div>
                    </div> 
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">الشركة الموردة</label>
                                <input type="text" id="company" name="company" class="form-control " >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">الصورة</label>
                                <input type="file" id="image" name="image"  class="form-control " >
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

                </div>

                <div class="modal-footer">

                    <button type="submit" name="submit" class="btn btn green"><li class="fa fa-check"></li> اضافة</button>

                    <button type="button" class="btn btn dafault" data-dismiss="modal"><li class="fa fa-times"></li> الغاء</button>

                </div>
            </form> 
        </div>
    </div>
</div>