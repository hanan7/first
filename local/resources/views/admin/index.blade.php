<script type="text/javascript">
$(document).ready(function(){


$.extend($.validator.messages, {
    
    max: ' {0} لابد ان تكون القيمه اقل من '
});

});
</script>
@extends('admin/master')

@section('title')
  الصفحة الرئيسية
@endsection

@section('styles')

@endsection

@section('layoutscripts')

@endsection

@section('levelscripts')
@endsection

@section("content-title")
    <h3 class="page-title"> الصفحة الرئيسية
   
    </h3>  
@endsection
@section("content-navigat")
<ul class="page-breadcrumb">
   
                    
</ul>
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
  
    <!--<a  href="#store" data-toggle="modal" class="btn btn blue" >
    <i class="fa fa-plus"></i>  اضافة عمليه بيع

</a> -->
<div class="row">

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-light blue-soft" href="{{url('users/all-users')}}">
        <div class="visual">
            <i class="fa fa-users"></i>
        </div>
        <div class="details">
            <div class="number">
             {{$admin_num}}
            </div>
            <div class="desc">
                عدد المستخدمين
            </div>
        </div>
        </a>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-light red-soft" href="{{url('admin/member/view-all')}}">
        <div class="visual">
            <i class="fa fa-shopping-cart"></i>
        </div>
        <div class="details">
            <div class="number">
                  {{-- $order_num --}}
            </div>
            <div class="desc">
                 عدد الطلبيات
            </div>
        </div>
        </a>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-light green-soft" href="{{url('admin/owners/all-owners')}}">
        <div class="visual">
            <i class="fa fa-users"></i>
        </div>
        <div class="details">
            <div class="number">
               {{$emp_num}}
            </div>
            <div class="desc">
                عدد المساهمين
            </div>
        </div>
        </a>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <a class="dashboard-stat dashboard-stat-light purple-soft" href="{{url('admin/team-work/view-all')}}">
        <div class="visual">
            <i class="fa fa-home"></i>
        </div>
        <div class="details">
            <div class="number">
             {{$store_num}}
            </div>
            <div class="desc">
                 عدد المخازن
            </div>
        </div>
        </a>
    </div>
</div> 
                
<div class="clearfix">
</div>
<div class="row" style="margin-right:470px ; margin-top:100px; " >
    <div class="col-md-6  col-sm-6 col-xs-12">
        <a href="#store" data-toggle="modal" class="btn btn green-soft" >
        <div class="visual">
             <i class="fa fa-plus"></i>
        </div>
        <div class="details">
           
            <div class="desc">
                اضافة عمليه بيع جديدة
            </div>
        </div>
        </a>
    </div>
</div>

@endsection

<div id="store" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 class="modal-title bold">عمليه بيع</h4>
      </div>
        
        <form
        method="post" 
        name="productform"
        action="{{url('admin/add')}}" 
        class=" horizontal-form"
        >

        <input
        type="hidden"
        name="_token"
        value="{{ csrf_token() }}">

             <input
              type="hidden"
              name="saler_id"
              value="{{Auth::guard('admins')->user()->id}}">

                <div class="modal-body" style="overflow-y:scroll;">

                      <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">المخزن</label>
                                        @if(count($store_num)>0)
                                        <select  name="store_id"  class="form-control stores " >
                                            @foreach($stores as $s)
                                            <option value="{{$s->id}}">{{$s->name}}</option>
                                            @endforeach
                                        </select>
                                        @endif
                                      </div>
                                  </div>
                              </div>

                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">المنتج</label>
                                        
                                        <select  name="product_id" 
                                        
                                        $(this).attr('q')
                                        id="products" 
                                        class="form-control products " >
                                            
                                            <option >اختر المخزن ليتم تحميل المنتج</option>
                                           
                                        </select>
                                       
                                      </div>
                                  </div>
                                
                                    <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label"> الكمية ( بالقطعه )
                                          <span style="color:#f00" id="quan"></span>
                                        </label>
                                        <input type="number" 
                                          max=""
                                         required id="quantity" 
                                         name="quantity" 
                                         class="form-control " >
                                      </div>
                                    </div>
                                </div>  
                                    
                                <div class="row">
                                  <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label">نوع المشترى</label>
                                        <select  name="saler_type"  class=" type form-control " >

                                            <option value="0">وكيل فرعى</option>
                                            <option value="1">عميل نهائى</option>
                                        </select>
                                      </div>
                                  </div>

                                   <div class="col-md-6">
                                      <div class="form-group">
                                        <label class="control-label"> المشترى</label>
                                        <div id="delegator">
                                        @if(count($sub_delegator)>0)
                                        <select  name="buyer_id"  class="form-control " >
                                            @foreach($sub_delegator as $s)
                                            <option>{{$s->name}}</option>
                                            @endforeach
                                        </select>
                                        @endif
                                       </div>

                                        <div id="agent"  style="display:none" >
                                        @if(count($agent)>0)
                                        <select  name="buyer_id"  class="form-control " >
                                            @foreach($agent as $a)
                                            <option>{{$a->name}}</option>
                                            @endforeach
                                        </select>
                                        @endif
                                       </div>
                                      </div>
                                  </div>
                                
                                 
                                </div> 

                                <div class="row">
                                 
                                
                                 
                                </div>

                                
 
                                 

                               
                              
      
                </div>
    
      <div class="modal-footer">

        <button type="submit" name="submit" class="btn btn green"><li class="fa fa-check"></li> اضافة</button>
     
        <button type="button" class="btn btn dafault" data-dismiss="modal"><li class="fa fa-times"></li> الغاء</button>
    
      </div>
    </form> 
    </div>
  </div>
 
<!-- endModal -->

 
</div>

<script src="{{asset('assets/admin/global/plugins/jquery.min.js')}}" type="text/javascript"></script>


<script type="text/javascript">



jQuery('.type').on('change',function(){

  var type=$(this).val();
  if(type=='1')
  {
    $('#agent').css('display','block');
    $('#delegator').css('display','none');
  }else
  {
    $('#agent').css('display','none');
    $('#delegator').css('display','block');
  }


})

//load product in one store Ajax request
var goods='';
$('.stores').change(function(){
    var id=$(this).val();
    var options = '';

    $.ajax({
        url: "http://localhost/sohil/admin/load/"+id,
        type:"GET",
        success:function(res){
           if(res['response']!='0')
           {
                goods=res['goods'];
                //Auto-populating Select menu
                for (var i = 0; i < res['goods'].length; i++) 
                {
                 options += '<option   data-q="'+res['goods'][i].quantity+'" value="' + res['goods'][i].id + '">' + 
                 res['goods'][i].name + '</option>';
                } 
                   
           }
           else
           {
            options += '<option value="-1">لا يوجد  منتجات بهذا المخزن</option>';
           }

           $('#products').html(options)
        }

    })

})

var productQuantity;

//get product quantity
$('#products').change(function(){

// productQuantity=$(this).attr('q');
  productQuantity = $('#products option:selected').attr('data-q');


 console.log(productQuantity)
  
  var html ="الكميه الموجوه بالمخزن "+productQuantity;
  $('#quan').html(html)
  $('#quantity').attr('max',productQuantity);
})

//check  product quantity  

$('#quantity').focusout(function(){

//check quantity 
//inproccess

})



</script>
