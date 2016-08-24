
<script 
src="{{asset('assets/admin/global/plugins/jquery.min.js')}}" type="text/javascript">
</script>
<script 
src="{{asset('assets/admin/jqueryui/jquery-ui.js')}}" type="text/javascript">
</script>
<script 
src="{{asset('assets/admin/dist/js/select2.min.js')}}" type="text/javascript">
</script>
<script
src="{{asset('assets/admin/dist/js/select2.full.min.js')}}" type="text/javascript">
</script>




@extends("admin/master")

@section("title")
الجرد
@endsection
@section("styles")


 

<link href="{{asset('assets/admin/jqueryui/jquery-ui.css')}}" rel="stylesheet" type="text/css" />


<link href="{{asset('assets/admin/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}" 
    rel="stylesheet" type="text/css" />
<link href="{{asset('assets/admin/global/plugins/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css" />              
 <link
  href="{{asset('assets/admin/dist/css/select2.css')}}"
   rel="stylesheet" 
   type="text/css" />
   <link
  href="{{asset('assets/admin/dist/css/select2.min.css')}}"
   rel="stylesheet" 
   type="text/css" />
@endsection
@section("content-title")
 <h3 class="page-title">الجرد</h3>  
@endsection

@section("content-navigat")
<!--<ul class="page-breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="index.html">الصفحة الرئيسية</a>
    <i class="fa fa-angle-left"></i>
  </li>
  <li>
   <a href="#">جرد</a>


 </li>
                         
</ul>
-->
@endsection
                
@section('content')

 @if(isset($errors)&&count($errors)>0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
                @endforeach
            </ul>
        </div>
 @endif
 @if(session()->has('success'))
 <?php $a=[];
 $a = session()->pull('success');
 ?>
    <div class="alert alert-success alert-dismissable">
      <button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
     {{$a[0]}}
    
    </div>
 @endif
 @if(session()->has('error'))
 <?php $a=[];
 $a = session()->pull('error');
 ?>
    <div class="alert alert-warrning alert-dismissable">
      <button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
     {{$a[0]}}
    
    </div>
 @endif



 <form method="post" name="productform" action="{{url('admin/inventory/editInventory/'.$inventory->id)}}" class=" horizontal-form">
           
            <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                <div>
                                <div class="row">
                                  <div class="col-md-12">
                                      <div class="form-group">
                                        <label class="control-label">من</label>
                                        <input type="date" id="datepicker" 
                                         name="from" 
                                         value="{{$inventory->from}}"
                                         min="1" max="5"
                                        class="form-control datepicker" 
                                        required>
                                      </div>
                                  </div>
                                </div>
                                 <div class="row">
                                
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label class="control-label">إلى</label>
                                        <input type="date"
                                        value="{{$inventory->to}}" 
                                        
                                         name="to" class=" datepicker form-control " >
                                      </div>
                                    </div>
                                </div>  
                                    
                                

                                 

                                 
                                 <div class="row">
                                  @if(!empty($stores))
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <label class="control-label"> المخزن</label>

                                        
                                        <select 
                                        class="js-example-tags form-control load "
                                         multiple="multiple"
                                        
                                         name="stores[]" id="storetype">
                                          
                                         @foreach($stores as $t)
                                         <option value="{{$t->id}}">{{$t->name}}</option>
                                         @endforeach
                                         </select>




                                        

                                      </div>
                                    </div>
                                    
                                    @endif

                                   
                                   
                                </div> 
                                <div class="row">

                                  <!-- <div class="col-md-12">
                                      <button type="button"
                                       name="submit"
                                        class="btn btn green load">
                                        <li class="fa fa-check"></li> تحميل</button>
     
                                    </div>
                                  -->

                                  </br></br>

                                </div>
 
                              
      
                </div>
    <div class="row" id="allStore">
      @if(!empty($groupedProducts))
        @foreach($groupedProducts as $key=>$value)

                <div class="panel panel-info">
                  <div class="panel-heading">{{$value['store_name']}}</div>
                   <table class="table table-striped table-bordered 
                  table-hover table-checkable order-column" id="sample_1"> 
                  <thead> 


                 <tr><th class="text-center"> اسم المنتج  </th> 
                 <th class="text-center"> الكمية الموجودة</th> 
                 <th class="text-center"> الكمية اثناء الجرد</th>               
                 </tr></thead>
                 <tbody>

    @if(!empty($groupedProducts))
        @foreach($value['productes'] as $key=>$v)

                  <tr>
                    <td class="text-center"> {{ $v->name}} </td> 
                     <td class="text-center"> {{ $v->quantity}} </td> 
                    <td class="text-center"><div class="form-group"> 
                     <input type="text" id="quantity" name="newQuantity[]" 
                     class="form-control" value="{{$v->newQuentity}}" > 
                     <input type="hidden"  name="oldQuantity[]"  
                      class="form-control" value=" {{$v->quantity}} " > 
                     <input type="hidden"  name="id[]"  
                      class="form-control" value=" {{$v["id"]}} " >  
                      <input type="hidden"  name="stores_id[]" 
                      class="form-control" value="{{$v["store_id"]}}" >                     
                     </div></td> 
                 </tr>

                 @endforeach
                 @endif
               
             </tbody>
           </table>
         </div>
         @endforeach
         @endif



  
</div>

    </div>
      <div class="modal-footer">

        <button type="submit" name="submit" class="btn btn green">
          <li class="fa fa-check"></li> تعديل</button>
     
        <button type="button" class="btn btn dafault" data-dismiss="modal"><li class="fa fa-times"></li> الغاء</button>
    
      </div>
    </form>
    </hr>

     
 

 <script>


//$(document).ready(function(){

  var id=<?php echo($inventory->stores_id);?>;
  console.log(typeof(id ));

  $.each(id,function(index,value){
     console.log(value);
     $('.js-example-tags option[value='+value+']').prop('selected',true);

    // if(value==$(js-example-tags option).val())
    // {
    //   $(js-example-tags option).attr('selected','selected');
    // }
  })
//})
$(".datepicker" ).datepicker();
 
$(".js-example-tags").select2();


$('.load').click(function(){

  var stores_id=$('.js-example-tags').val();
  var html="";

  $.ajax({
    url:"http://localhost/first/admin/inventory/loadProducts",
    type:"POST",
    data:{
      'stores_id':stores_id,
      '_token':$('input[name=_token]').val() //'<?php echo csrf_token(); ?>'
    },
    success:function(res){
     console.log(res);
      //display all store
      if(res['response']==1){

         
         $.each(res['goods'], function( index, value ) {
            html+='<div class="panel panel-info">'+
                  '<div class="panel-heading">'+index+'</div>';

           
            html+='<table class="table table-striped table-bordered'+ 
                 'table-hover table-checkable order-column" id="sample_1">'+
                 '<thead> <tr><th class="text-center"> اسم المنتج  </th>'+
                '<th class="text-center"> الكمية الموجودة</th>'+
                '<th class="text-center"> الكمية اثناء الجرد</th>'+               
                '</tr></thead><tbody>';

            $.each(value, function( i, v ) {

              html+="<tr>";
              html+='<td class="text-center">'+v["name"]+'</td>'+
                    '<td class="text-center">'+v["quantity"]+' </td>'+
                   '<td class="text-center"><div class="form-group">'+
                    '<input type="text" id="quantity" name="newQuantity[]'+ 
                    'class="form-control" value="" >'+
                    '<input type="hidden"  name="oldQuantity[]" '+
                    ' class="form-control" value="'+v["quantity"]+'" >'+ 
                    '<input type="hidden"  name="id[]" '+
                    ' class="form-control" value="'+v["id"]+'" >'+                      
                    '</div></td>';
               html+="</tr>";

             });

             html+="</tbody></table></div>";

          });
        
        

      }else{

        html+="<div class='alert-info'> لا يوجد بضائع بهذا المخزن</div>";

      }//end else
       $('#allStore').html(html);
     
    }//end success

  })//end ajaxs
 
});//end load event click
$('.load').change(function(){

})
</script>

  
</div>
   @include('admin.pages.stores.addstore') 
<!-- Modal -->

@endsection

@section("layoutscripts")
        

@endsection

@section("levelscripts")





@endsection


