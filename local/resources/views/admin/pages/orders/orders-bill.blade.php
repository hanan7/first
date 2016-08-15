@extends("admin/master")

@section("title")
    الفاتوره
@endsection

@section("styles")
    <link href="{{asset('assets/admin/pages/css/style.css')}}" rel="stylesheet" type="text/css"/>
@endsection
@section("content-title")
    <h3 class="page-title">الفاتوره</h3>
@endsection

@section("content-navigat")
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{url('/admin')}}">الصفحة الرئيسية</a>
            <i class="fa fa-angle-left"></i>
        </li>
        <li>
            <a href="#">الفاتورة</a>
        </li>
    </ul>
@endsection

@section('content')

    @if(Session::has('success'))
        <div class="alert alert-success alert-dismissable">
            <button class="close" data-dismiss="alert" area-hidden="true">&times;</button>
            {{ session()->pull('success')[0]}}
        </div>
    @endif

    <section id="area-print" class="form">
        <div>
            <form id="bill-form" action="{{ url('orders/invoice/'.$order->id) }}" method="post">
                {{ csrf_field() }}
                <div class="form-header">
                    <div class="row row-header">
                        <div class="col-lg-6 col-xs-6">
                            <div class=" input-group ">
                                <span class="input-group-addon">الأسم</span>
                                <input type="text" name="name" value="{{ $invoice->name ?: '' }}" class="form-control"
                                       placeholder=" تعامل نقدى"
                                       aria-describedby="sizing-addon3">
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><label for="type2">نقدي</label></span>
                                <input id="type2" type="radio" name="type"
                                       {{ $invoice->type == 'cash' ? 'checked' : '' }} value="cash">
                                <span class="input-group-addon"><label for="type1">آجل</label></span>
                                <input id="type1" type="radio" name="type"
                                       {{ $invoice->type == 'later' ? 'checked' : '' }} value="later">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-7 col-sm-6 col-xs-5 "></div>
                    <div class="col-lg-1 col-sm-1 col-xs-1 view">
                        بيانات الفاتورة
                    </div>
                    <div class="col-lg-4 col-sm-5 col-xs-4 adds">
                        <div class="details">
                            <div class="row">
                                <div class="input-group col-md-11">
                                    <span class="input-group-addon">المخزن</span>
                                    <select name="store" class="form-control">
                                        @if(($store = \App\Store::find($invoice->store)) !== null)
                                            <option value="{{ $store->id }}">{{ $store->name }} الموجود
                                                في {{  $store->address }}</option>
                                        @endif
                                        @foreach(\App\Store::get() as $store)
                                            <option value="{{ $store->id }}">{{ $store->name }} الموجود
                                                في {{  $store->address }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-group input-group-md col-lg-6 col-xs-6">
                                    <span class="input-group-addon">الفاتورة</span>
                                    <input type="number" name="number" class="form-control" min="1"
                                           value="{{ $invoice->number ?: (\App\Invoice::max('id') + 1) }}"
                                           aria-describedby="sizing-addon3">
                                </div>
                                <div class="input-group input-group-md col-lg-6 col-xs-6">
                                    <span class="input-group-addon">الدفتر</span>
                                    <input type="text" name="note_book" value="{{ $invoice->note_book ?: '' }}"
                                           class="form-control" placeholder="1"
                                           aria-describedby="sizing-addon3">
                                </div>
                            </div>
                            <div class="input-group input-group-md">
                                <span class="input-group-addon">التاريخ</span>
                                <input type="date" id="date" name="date" class="form-control" title="month/day/year"
                                       value="{{ $invoice->date ? \Carbon\Carbon::parse($invoice->date)->toDateString() : \Carbon\Carbon::now()->toDateString() }}"
                                       placeholder="Date"
                                       aria-describedby="sizing-addon3">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="data">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-success">
                                <!-- Default panel contents -->
                                <div class="panel-heading">البضاعة</div>
                                <!-- Table -->
                                <table class="table">
                                    <tr>
                                        <th>أسم الصنف</th>
                                        <th>الكود</th>
                                        <th>الكمية</th>
                                        <th>الوحدة</th>
                                        <th>السعر</th>
                                        <th>إجمالى</th>
                                    </tr>
                                    @if(!count($products))
                                        <tr>
                                            <td>
                                                <select name="product_id[]"
                                                        class="form-control first-update form-control product-id">
                                                    @foreach(\App\Good::get() as $good)
                                                        <option value="{{ $good->id }}">{{ $good->name }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td><input type="text" name="code[]" class="form-control code"
                                                       placeholder="الكود"
                                                       aria-describedby="sizing-addon3"></td>
                                            <td><input type="number" name="quantity[]" min="1"
                                                       class="form-control quantity"
                                                       placeholder="الكمية"
                                                       aria-describedby="sizing-addon3"></td>
                                            <td><input type="text" name="unit[]" class="form-control" value="كرتونه"
                                                       placeholder="الوحدة"
                                                       aria-describedby="sizing-addon3"></td>
                                            <td><input type="number" name="price[]" min="0" class="form-control price"
                                                       placeholder="السعر"
                                                       aria-describedby="sizing-addon3"></td>
                                            <td><input type="number" name="product_total[]" min="0"
                                                       class="form-control product-total" placeholder="إجمالى"
                                                       aria-describedby="sizing-addon3"></td>
                                            <td>
                                                <button type="button" class="btn-new-product btn btn-primary">أضافة منتج
                                                    جديد
                                                </button>
                                            </td>
                                            <td>
                                                <button type="button"
                                                        class="btn-del-product btn btn-danger">&times;</button>
                                            </td>
                                        </tr>
                                    @else
                                        @foreach($products as $product)
                                            <tr>
                                                <td>
                                                    <select name="product_id[]"
                                                            class="form-control form-control product-id">
                                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                                        @foreach(\App\Good::get() as $good)
                                                            <option value="{{ $good->id }}">{{ $good->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td><input type="text" name="code[]" class="form-control code"
                                                           value="{{ $product->pivot->code }}" placeholder="الكود"
                                                           aria-describedby="sizing-addon3"></td>
                                                <td><input type="number" name="quantity[]" min="1"
                                                           class="form-control quantity"
                                                           value="{{ $product->pivot->quantity }}" placeholder="الكمية"
                                                           aria-describedby="sizing-addon3"></td>
                                                <td><input type="text" name="unit[]" class="form-control" value="كرتونه"
                                                           value="{{ $product->pivot->unit }}" placeholder="الوحدة"
                                                           aria-describedby="sizing-addon3"></td>
                                                <td><input type="number" name="price[]" min="0"
                                                           class="form-control price" placeholder="السعر"
                                                           value="{{ $product->pivot->price }}"
                                                           aria-describedby="sizing-addon3"></td>
                                                <td><input type="number" name="product_total[]" min="0"
                                                           class="form-control product-total" placeholder="إجمالى"
                                                           value="{{ $product->pivot->total }}"
                                                           aria-describedby="sizing-addon3"></td>
                                                <td>
                                                    <button type="button" class="btn-new-product btn btn-primary">أضافة
                                                        منتج جديد
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="button"
                                                            class="btn-del-product btn btn-danger">&times;</button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </table>
                                <div class="panel-footer panel-success"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="type">
                    <div class="row">
                        <div class="input-group input-group-sm col-xs-4">
                            <span class="input-group-addon"><label for="t0">المدفوع نقدي</label></span>
                            <input id="t0" type="radio" name="payment_method"
                                   {{ $invoice->payment_method == 'cash' ? 'checked': '' }} value="cash">
                            <span class="input-group-addon"><label for="t1">فيزا </label></span>
                            <input id="t1" type="radio" name="payment_method"
                                   {{ $invoice->payment_method == 'visa' ? 'checked': '' }} value="visa">
                            <span class="input-group-addon"><label for="t2"> شيك </label></span>
                            <input id="t2" type="radio" name="payment_method"
                                   {{ $invoice->payment_method == 'cheque' ? 'checked': '' }} value="cheque">
                        </div>
                    </div>
                </div>
                <div class="last">
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="input-group input-group-md">
                                <span class="input-group-addon">الملاحظات</span>
                                <input type="text" name="notes" value="{{ $invoice->notes ?: '' }}" class="form-control"
                                       placeholder="ملاحظات"
                                       aria-describedby="sizing-addon3">
                            </div>
                            <div class="but">
                                <button type="submit" class="btn btn-primary">حفظ</button>
                                <button type="button" id="btn-print" class="btn btn-primary">طباعه</button>
                            </div>
                        </div>
                        <div class="col-xs-3"></div>
                        <div class="col-xs-5">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="input-group input-group-md">
                                        <span class="input-group-addon">الإجمالى</span>
                                        <input type="number" id="bill-sub-total" min="0"
                                               value="{{ $invoice->sub_total ?: '0' }}" name="sub_total"
                                               class="form-control" placeholder="0"
                                               aria-describedby="sizing-addon3">
                                    </div>
                                    <div class="input-group input-group-md">
                                        <span class="input-group-addon">الإضافى</span>
                                        <input type="number" min="0" value="{{ $invoice->extra_money ?: '0' }}"
                                               name="extra_money" class="form-control"
                                               placeholder="0"
                                               aria-describedby="sizing-addon3">
                                    </div>
                                    <div class="input-group input-group-md">
                                        <span class="input-group-addon">الخصم</span>
                                        <input type="number" min="0" value="{{ $invoice->discount ?: '0' }}"
                                               name="discount" class="form-control"
                                               placeholder="0"
                                               aria-describedby="sizing-addon3">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="input-group input-group-md">
                                        <p>جنيه مصرى</p>
                                    </div>
                                    <div class="input-group input-group-md">
                                        <span class="input-group-addon paid">المدفوع</span>
                                        <input type="number" type="number" value="{{ $invoice->paid_amount ?: '0' }}"
                                               min="0" name="paid_amount" min="0"
                                               class="form-control" placeholder="0"
                                               aria-describedby="sizing-addon3">
                                    </div>
                                    <div class="input-group input-group-md">
                                        <span class="input-group-addon change">الباقى</span>
                                        <input type="number" min="0" value="{{ $invoice->paid_rest ?: '0' }}"
                                               name="paid_rest" class="form-control"
                                               placeholder="0"
                                               aria-describedby="sizing-addon3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection


