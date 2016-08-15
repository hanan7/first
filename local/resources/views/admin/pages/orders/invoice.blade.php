<!DOCTYPE html>

<html>
<head>
    <title>الفاتورة</title>
</head>
    <meta charset="UTF-8"/>
    <link rel='stylesheet' href="{{asset('assets/admin/invoice/css/bootstrap.min.css')}}" />
    <link rel='stylesheet' href="{{asset('assets/admin/invoice/css/bootstrap-rtl.css')}}"/>
    <link rel='stylesheet' href="{{asset('assets/admin/invoice/css/style.css')}}" />
<body>
    <section class="form">
        <div class="container">
            <form action="" method="post">
                <div class="form-header">
                    <div class="row row-header">
                        <div class="col-lg-6 col-xs-6">
                            <div class=" input-group ">
                                <span class="input-group-addon">الأسم</span>
                                <input type="text" class="form-control" placeholder=" تعامل نقدى" aria-describedby="sizing-addon3">
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-6">
                            <div class="input-group input-group-sm">
                                <span  class="input-group-addon"><label for="type2">نقدى</lable></span>
                                <input id="type2" type="radio" name="radio-group" value="cash">
                                <span class="input-group-addon"><label for="type1">آجل</label></span>
                                <input id="type1" type="radio" name="radio-group" >
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
                                <div class="input-group input-group-md col-xs-8">
                                    <span class="input-group-addon">المخزن</span>
                                    <input type="text" class="form-control" placeholder="المخزن الرئيسى" aria-describedby="sizing-addon3">
                                </div>   
                                <div class="input-group input-group-sm">
                                    <select class="form-control col-xs-4">
                                        <option value="1">المخزن الرئيسى</option>
                                        <option value="2">المخزن الرئيسى</option>
                                        <option value="3">المخزن الرئيسى</option>
                                        <option value="4">المخزن الرئيسى</option>
                                    </select> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-group input-group-md col-lg-6 col-xs-6">
                                    <span class="input-group-addon">الفاتورة</span>
                                    <input type="text" class="form-control" placeholder="1" aria-describedby="sizing-addon3">
                                </div>
                                <div class="input-group input-group-md col-lg-6 col-xs-6">
                                    <span class="input-group-addon">الدفتر</span>
                                    <input type="text" class="form-control" placeholder="1" aria-describedby="sizing-addon3">
                                </div>
                            </div>
                            <div class="input-group input-group-md">
                                <span class="input-group-addon">التاريخ</span>
                                <input type="date" id="date" class="form-control" min="" placeholder="Date" aria-describedby="sizing-addon3">
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
                                        <th>الكود</th><th>أسم الصنف</th><th>الكمية</th><th>الوحدة</th><th>السعر</th><th>إجمالى</th>
                                    </tr>
                                    <tr>
                                        <td><input type="text" class="form-control" placeholder="الكود" aria-describedby="sizing-addon3"></td>   
                                        <td><input type="text" class="form-control" placeholder="أسم الصنف" aria-describedby="sizing-addon3"></td>   
                                        <td><input type="text" class="form-control" placeholder="الكمية" aria-describedby="sizing-addon3"></td>   
                                        <td><input type="text" class="form-control" placeholder="الوحدة" aria-describedby="sizing-addon3"></td>   
                                        <td><input type="text" class="form-control" placeholder="السعر" aria-describedby="sizing-addon3"></td>   
                                        <td><input type="text" class="form-control" placeholder="إجمالى" aria-describedby="sizing-addon3"></td>
                                        <td><button type="submit" class="btn btn-primary">أضافة بيان</button></td>
                                    </tr>
                                    <tr class="background">
                                        <td>test</td><td>test</td><td>test</td><td>test</td><td>test</td><td>test</td><td></td>
                                    </tr>
                                    <tr>
                                        <td>test</td><td>test</td><td>test</td><td>test</td><td>test</td><td>test</td><td></td>
                                    </tr>
                                    <tr class="background">
                                        <td>test</td><td>test</td><td>test</td><td>test</td><td>test</td><td>test</td><td></td>
                                    </tr>
                                    <tr>
                                        <td>test</td><td>test</td><td>test</td><td>test</td><td>test</td><td>test</td><td></td>
                                    </tr>
                                    <tr class="background">
                                        <td>test</td><td>test</td><td>test</td><td>test</td><td>test</td><td>test</td><td></td>
                                    </tr>
                                </table>
                                <div class="panel-footer panel-success"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="type">
                    <div class="row">
                        <div class="input-group input-group-sm col-xs-4">
                            <span  class="input-group-addon"><label for="t0"> المدفوع نقدى </lable></span>
                            <input id="t0" type="radio" name="radio-group" value="cash">
                            <span class="input-group-addon"><label for="t1">فيزا </label></span>
                            <input id="t1" type="radio" name="radio-group" value="visa" >
                            <span class="input-group-addon"><label for="t2"> شيك </label></span>
                            <input id="t2" type="radio" name="radio-group" value="cheak" >
                        </div> 
                    </div>
                </div>
                <div class="last">
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="input-group input-group-md">
                                <span class="input-group-addon">الملاحظات</span>
                                <input type="text" class="form-control" placeholder="ملاحظات" aria-describedby="sizing-addon3">
                            </div>
                            <div class="but">
                                <button type="submit" class="btn btn-primary">حفظ</button>
                                <button type="submit" class="btn btn-primary">حفظ و طباعة</button>
                            </div>
                        </div>
                        <div class="col-xs-3"> </div>
                        <div class="col-xs-5">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="input-group input-group-md">
                                        <span class="input-group-addon">الإجمالى</span>
                                        <input type="text" class="form-control" placeholder="0" aria-describedby="sizing-addon3">
                                    </div>
                                    <div class="input-group input-group-md">
                                        <span class="input-group-addon">الإضافى</span>
                                        <input type="text" class="form-control" placeholder="0" aria-describedby="sizing-addon3">
                                    </div>
                                    <div class="input-group input-group-md">
                                        <span class="input-group-addon">الخصم</span>
                                        <input type="text" class="form-control" placeholder="0" aria-describedby="sizing-addon3">
                                     </div>                                
                                </div>
                                <div class="col-xs-6">
                                    <div class="input-group input-group-md">
                                        <p>جنيه مصرى</p>
                                    </div>
                                    <div class="input-group input-group-md">
                                        <span class="input-group-addon paid">المدفوع</span>
                                        <input type="text" class="form-control" placeholder="0" aria-describedby="sizing-addon3">
                                    </div>
                                    <div class="input-group input-group-md">
                                        <span class="input-group-addon change">الباقى</span>
                                        <input type="text" class="form-control" placeholder="0" aria-describedby="sizing-addon3">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</body>
</html>
