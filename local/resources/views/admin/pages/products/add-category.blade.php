<!-- Modal -->
<div id="cat-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title bold">اضافة صنف</h4>

            </div>

            <form method="post" name="productform" action="{{ url('products/add-category') }}" class=" horizontal-form" files="true" enctype="multipart/form-data">
                <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="cat" class="control-label">اسم الصنف</label>
                                <input type="text" id="cat" name="cat"  class="form-control " required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="sub_cat" class="control-label">اضافة صنف فرعي</label>
                                <input type="text" id="sub_cat" name="sub_cat[]" class="form-control " >
                                <button type="button" class="new-sub-cat btn btn blue-soft"><li class="fa fa-plus-circle"></li></button>
                            </div>
                        </div>
                    </div>  

                    <div class="modal-footer">

                        <button type="submit"  class="btn btn green"><li class="fa fa-check"></li> تاكيد</button>

                        <button type="button" class="btn btn dafault" data-dismiss="modal"><li class="fa fa-times"></li> الغاء</button>

                    </div>
            </form> 
        </div>
    </div>
    </div>
</div>