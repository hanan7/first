@extends("admin/master")

@section("title")
    المنتجات
@endsection
@section("styles")
    <link href="{{asset('assets/admin/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet"
          type="text/css"/>
    <link href="{{asset('assets/admin/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap-rtl.css')}}"
          rel="stylesheet" type="text/css"/>

@endsection
@section("content-title")
    <h3 class="page-title">المنتجات</h3>
@endsection

@section("content-navigat")
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{url('/admin')}}">الصفحة الرئيسية</a>
            <i class="fa fa-angle-left"></i>
        </li>
        <li>
            <a href="#">المنتجات</a>


        </li>

    </ul>
@endsection

@section('content')
    @if(session()->has('success'))
        <?php
        $a = [];
        $a = session()->pull('success');
        ?>
        <div class="alert alert-success alert-dismissable">
            <button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
            {{$a[0]}}

        </div>
    @endif
    @if(session()->has('danger'))
        <?php
        $a = [];
        $a = session()->pull('danger');
        ?>
        <div class="alert alert-warrning alert-dismissable">
            <button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
            {{$a[0]}}

        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            <div class="tabbable tabbable-custom tabbable-noborder tabbable-reversed">
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            <i class="icon-pencil"></i>
                            تعديل منتج
                        </div>
                    </div>

                    <div class="portlet-body form">
                        <form method="post" name="settingform" action="{{URL('products/edit/'.$old->id)}}"
                              id="settingform" class="horizontal-form" files="true" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-body">
                                <h3 class="form-section">تعديل منتج</h3>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">كود المنتج</label>
                                            <input type="number" id="code" name="code" class="form-control"
                                                   value="{{$old->code}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">اسم المنتج</label>
                                            <input type="text" id="name" name="name" class="form-control "
                                                   value="{{$old->name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">الشركة الموردة</label>
                                            <input type="text" id="company" name="company" class="form-control"
                                                   value="{{$old->company}}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">نقاط المبيعات</label>
                                            <input type="number" id="points" name="points" min="0" class="form-control"
                                                   value="{{$old->points}}">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">نقاط المرتجع</label>
                                            <input type="number" id="points" min="0" name="dmg_points"
                                                   class="form-control"
                                                   value="{{$old->dmg_points}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">عدد الكراتين</label>
                                            <input type="number" id="box-count" min='1' value="{{$old->box_count }}"
                                                   name="box_count" class="form-control ">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label ">عدد القطع داخل كل كرتونه</label>
                                            <input type="number" id="box-items-count" min='1'
                                                   value="{{$old->box_items_count }}" name="box_items_count"
                                                   class="form-control ">
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-left">
                                        <div class="form-group" style="line-height: 85px;">
                                            = <span id="box-total">{{$old->quantity }}</span>&nbsp;قطعه
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">سعر الشراء</label>
                                            <input type="text" id="b_price" min="0" name="b_price" class="form-control"
                                                   value="{{$old->b_price}}">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">سعر البيع</label>
                                            <input type="text" id="s_price" name="s_price" min="0" class="form-control"
                                                   value="{{$old->s_price}}">
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
                                                    <option 
                                                    @if("{{$sub_cat->id}}"=="{{$old->sub_cat_id}}")
                                                    selected="selected" 
                                                    @endif
                                                    value="{{$sub_cat->id}}">{{$sub_cat->category->name . ' >>> ' . $sub_cat->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">الوصف</label>
                                            <textarea id="desc" name="desc"
                                                      class="form-control">{{$old->desc}}</textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">الصورة</label>
                                            <input type="file" id="image" name="image" class="form-control ">
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="form-actions">
                                <div class="col-md-12 text-center">
                                    <button type="submit" name="submit" class="btn green btn_save">
                                        <i class="fa fa-pencil"></i> تعديل
                                    </button>
                                    <a href="{{url('products/all-products')}}" type="button"
                                       class="btn default btn_save">
                                        <i class="fa fa-times"></i> الغاء</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection                     