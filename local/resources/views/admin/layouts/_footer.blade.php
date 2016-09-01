    <div class="page-footer">
            <div class="page-footer-inner"> 2016 © ذكاء للبرمجيات.
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>

            <!-- Modal -->
<div id="allStore" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title bold">اضافة وكيل </h4>
         <div class="allStore">

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
        </div>
 <script src="{{asset('assets/admin/global/plugins/jquery.min.js')}}" type="text/javascript"></script>
<SCRIPT TYPE="text/javascript">
$(document).ready(function(){

	$('.displayStore').click(function(){

		var type =$(this).attr('data-type');
		var id =$(this).attr('data-id');
		//alert(id);
		$.ajax({
			url:"http://localhost/first/admin/delegates/getStore",
			method:"POST",
			data:
			{
				'type':type,
				'id':id,
				'_token':'<?php echo csrf_token(); ?>'
			},
			success:function(result){
				console.log(result);
				html="<ul>";
				for (var i = 0; i < result.length; i++) 
				{
					html+="<tr><td>"+result[i];
					html+="</td></tr>";
				};
				html+="</ul>";
				$('.allStore').html(html);
				$('#allStore').modal('show');
			}
		});
	    

});

});


</SCRIPT>