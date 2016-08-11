<!-- Modal -->
<style>

  .page
  {

  display:block;
  text-align:center;
  width:100%;
  }
  .inputs
  {
      display:block;
    padding-bottom:30px;
    transition: 0.3ms all ease-in-out; 
  }

</style>
<div id="addorder" class="modal fade" role="dialog"> 
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title bold">اضافة طلبية</h4> 
      </div>
        
<form method="post" action="{{url('orders/add')}}" class=" horizontal-form" files="true">
  <input type= "hidden"  name="_token" value="{{ csrf_token() }}">
  <div class="modal-body">
                   
  
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <input type="text" id="code" name="code" class="form-control" placeholder="كود الطلبية">
        </div>
      </div>
    </div>  
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <textarea id="name" name="name" class="form-control" placeholder="محتوى الطلبية" required></textarea>
        </div>
      </div>
    </div>  
  
     
  </div>
    

            <div class="modal-footer">
              <button type="submit" name="submit" class="btn btn green"><li class="fa fa-check"></li> اضافة</button>
              <button type="button" class="btn btn dafault" data-dismiss="modal">
              <li class="fa fa-times"></li> الغاء</button>
            </div>
</form> 
    </div>
  </div>
</div>
<!-- endModal -->

