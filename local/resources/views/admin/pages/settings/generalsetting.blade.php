@extends("admin/master")

@section("title")
الاعدادات العامة
@endsection

@section("content-title")
 <h3 class="page-title">الاعدادات العامة</h3>  
@endsection

@section("content-navigat")
<ul class="page-breadcrumb">
  <li>
    <i class="icon-home"></i>
    <a href="index.html">الصفحة الرئيسية</a>
    <i class="fa fa-angle-left"></i>
  </li>
  <li>
   <a href="#">الاعدادات العامة</a>


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
@if(session()->has('sucess'))
 <?php $a=[];
 $a = session()->pull('sucess');
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
<meta name="_token" content="{{ csrf_token() }}">
<div class="row">
	<div class="col-md-12">
		<div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed">
		
                <div class="portlet box blue">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-settings"></i>الاعدادات العامة
						</div>
					</div>
                    <div  class="portlet-body form">
						<div id="mydiv" name="mydiv">
						        <form method="post" name="settingform"   action="{{url('settings/edit')}}" class="horizontal-form">
								    <input type="hidden"  name="_token" value="{{ csrf_token() }}">
								        <div class="form-body">
                                           		<h3 class="form-section">البيانات العامة</h3>
													<div class="row">
														<div class="col-md-6">
															<div class="form-group ">
																<label class="control-label">اسم الشركة</label>
																<div class="input-icon right">
																<input type="text"  name="site_name" id="site_name"   value="{{$sections->site_name}}" class="form-control required" placeholder=" هذا الحقل مطلوب">
																</div>
																</div>
														</div>
													    <!--/row-->
														<div class="col-md-6">
																<div class="form-group">
																<label class="control-label">العنوان</label>
																<div class="input-icon right">
																	<input type="text" name="address" id="address"  value="{{$sections->address}}" class="form-control required">
																
																 </div>

															</div>
														</div>
													</div>
													<!--/row-->
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label class="control-label">رقم التليفون</label>
																<div class="input-icon right">
																<input type="text"  id="phone" name="phone" value="{{$sections->phone}}" class="form-control" >
																
															</div>
															</div>
														</div>
													    <div class="col-md-6">
																<div class="form-group">
																<label class="control-label">رقم الموبايل</label>
																<div class="input-icon right">
																<input type="mobile" id="mobile" name="mobile" value="{{$sections->mobile}}"  class="form-control" >
																</div>
															</div>
													    </div>
													</div>
												
													<div class="row">
														<div class="col-md-9">
															<div class="form-group">
																<label class="control-label">عن الشركة</label>
																<div class="input-icon right">
																	<textarea id="about" name="about" value="{{$sections->about}}" class="form-control" ></textarea>
															    </div>
															</div>
														</div>
													</div>
													 
													<hr />

										        <h3 class="form-section">معلومات الاتصال</h3>   
											    	<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label class="control-label">Facebook</label>
																<div class="input-icon right">
																<input type="text"  id="facebook" name="facebook" value="{{$sections->facebook}}" class="form-control" >
																
															</div>
															</div>
														</div>
													    <div class="col-md-6">
																<div class="form-group">
																<label class="control-label">Twitter</label>
																<div class="input-icon right">
																<input type="text" id="twitter" name="twitter" value="{{$sections->twitter}}"  class="form-control" >
																</div>
															</div>
													    </div>
													</div>
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label class="control-label">Facebook</label>
																<div class="input-icon right">
																<input type="text"  id="facebook" name="facebook" value="{{$sections->facebook}}" class="form-control" >
																
															</div>
															</div>
														</div>
													    <div class="col-md-6">
																<div class="form-group">
																<label class="control-label">Twitter</label>
																<div class="input-icon right">
																<input type="text" id="twitter" name="twitter" value="{{$sections->twitter}}"  class="form-control" >
																</div>
															</div>
													    </div>
													</div>
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label class="control-label">Email</label>
																<div class="input-icon right">
																<input type="text"  id="email" name="email" value="{{$sections->email}}" class="form-control" >
																
															</div>
															</div>
														</div>
													
													    <div class="col-md-6">
																<div class="form-group">
																<label class="control-label">Instagram</label>
																<div class="input-icon right">
																<input type="text" id="instagram" name="instagram" value="{{$sections->instagram}}"  class="form-control" >
																</div>
															</div>
													    </div>
													</div>
									         	    
									               <h3 class="form-section">معلومات SEO</h3>   
									               <div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label class="control-label">مفتاح الميتا</label>
																<input type="text" name="meta_keyword" value="{{$sections->meta_keyword}}" class="form-control " >
																
															</div>
														</div>
												   </div>
													
													<div class="row">
														<div class="col-md-6">
																<div class="form-group">
																<label class="control-label">عنوان الميتا</label>
																<div class="input-icon right">
																<input  type="text" name="meta_title" value="{{$sections->meta_title}}" class="form-control ">
																</div>
																
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-6">
																<div class="form-group">
																<label class="control-label">وصف الميتا</label>
																<textarea cols="60" name="mdesc"  class="form-control "> {{$sections->meta_description}}</textarea>
																
															</div>
														</div>
													</div>
													
						                </div>    
											<div class="row">
												<div class="form-actions ">
												    <div class="col-md-5" ></div>
												        <button type="submit" class="btn green btn_save">
                                                            <i class="fa fa-check"></i> حفظ</button>
                                                        <button type="button" class="btn default btn_save">
                                                            <i class="fa fa-times"></i> الغاء</button>   
                                                </div>
                                            </div>
								</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	

@endsection
@section("page-script")
<script src="{{asset('assets/global/plugins/bootbox/bootbox.min.js')}}" type="text/javascript"></script>  
@endsection 
