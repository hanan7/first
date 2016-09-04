@extends("admin/master")


@section("title")
الوكلاء الفرعيين 
@endsection

@section("styles")
<link 
href="{{asset('assets/admin/global/plugins/datatables/datatables.min.css')}}" 
rel="stylesheet" type="text/css" />

<link
 href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}" 
rel="stylesheet" type="text/css" />

<link 
href="{{asset('assets/admin/global/plugins/font-awesome/css/font-awesome.min.css')}}"
 rel="stylesheet" type="text/css" />              


<link  href="{{asset('assets/admin/taggable/css/taggable.min.css')}}"
rel="stylesheet" 
type="text/css" />


@endsection
@section("content-title")
 <h3 class="page-title">الوكلاء الفرعيين </h3>  
@endsection

@section("content-navigat")
<ul class="page-breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="{{url('/admin')}}">الصفحة الرئيسية</a>
    <i class="fa fa-angle-left"></i>
  </li>
  <li>
   <a href="#"> ين</a>


 </li>
                         
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
 @if(session()->has('danger'))
 <?php $a=[];
 $a = session()->pull('danger');
 ?>
    <div class="alert alert-warrning alert-dismissable">
      <button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
     {{$a[0]}}
    
    </div>
 @endif

<div class="portlet box blue ">
    <div class="portlet-title">
        <div class="caption">
          <i class="fa fa-eye"></i> عرض الوكلاء الفرعيين </div>
    </div>

    <div class="portlet-body" >
        <div class="table-toolbar">
          <div class="row">
            <div class="col-md-6">
              <div class="btn-group">
                <a  href="#adddelegate" data-toggle="modal" class="btn btn blue" >
                  <i class="fa fa-plus"></i>  اضافة وكيل فرعى 
                </a>
              </div>
            </div>
           
          </div>
        </div>  

      
        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
            <thead>
              <tr>
                <th class="text-center"> كود   </th>
                <th class="text-center"> اسم </th>
                <th class="text-center"> العنوان</th>
                <th class="text-center"> التليفون </th>
                <th class="text-center"> نوع   </th>
                <th class="text-center"> نوع العمل </th>
                <th class="text-center"> نقاط الارباح </th>
                <th class="text-center"> الراتب </th>
                <th class="text-center"> نقاط رئسية </th>
                <th class="text-center"> تاريخ التعاقد </th>
                <th class="text-center"> العمليات </th>
              </tr>
            </thead>
             
            <tbody>
            @foreach($subdelegates as $delegate)
              <tr>
		    
                    <td class="text-center"> {{ $delegate->code }} </td>                   
                    <td class="text-center"> {{ $delegate->name }} </td>
                    <td class="text-center"> {{ $delegate->address }} </td>
                    <td class="text-center"> {{ $delegate->phone }} </td>
                    <td class="text-center"> {{ $delegate->type }} </td>
                    <td class="text-center"> {{ $delegate->sortwork }} </td>
                    <td class="text-center"> {{ $delegate->points}} </td>
                    <td class="text-center"> {{ $delegate->salary }} </td>
                    <td class="text-center"> {{ $delegate->main_point }} </td>
                    <td class="text-center"> {{ $delegate->created_at }} </td>
                    <td class="text-center">
                      <a href="{{URL('subDelegates/'.'edit/'.$delegate->id)}}"  class="btn green btnedit" data-original="">
                        <li class="fa fa-pencil"> تعديل</li>
                      </a>
                      @if(Auth::guard('admins')->user()->flag==0)
                      <a data-url="{{URL('subDelegates/'.'delete/'.$delegate->id)}}" class="btn btn-danger btndelet"  >
                          <li class="fa fa-trash">  مسح</li>
                      </a>

                      <button data-id="{{$delegate->id}}"  
                        class="btn btn blue displayStore" data-type="1" >
                         عرض المخازن
                     </button>
                      @endif
                    </td>
              </tr>
              @endforeach 
            </tbody>
        </table>
       
    </div> 

</div>





 @include('admin.pages.subDelegates.adddelegate')
@endsection

@section("layoutscripts")


<script
src="{{asset('assets/admin/taggable/js/jquery.taggable.min.js')}}" type="text/javascript">
</script>

<script type="text/javascript">
$(".select").taggable({
      allowOtherWords : true, // default is false
      searchByValue : false, // default is false
      autoCompleteSearch : true, // default is true
      autoCompleteSmartDisplay : true // default is true
    });</script>

<script src="{{asset('assets/admin/global/scripts/datatable.js')}}" 
type="text/javascript"></script>
<script src="{{asset('assets/admin/global/plugins/datatables/datatables.min.js')}}"
 type="text/javascript"></script>
<script src="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" 
type="text/javascript"></script>

 


@endsection

@section("levelscripts")
 <script src="{{asset('assets/admin/pages/scripts/table-datatables-managed.min.js')}}" 
 type="text/javascript">
 </script>

 
@endsection

