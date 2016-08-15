@extends('front/layouts/master')

@section('content')
   
    <section class="about text-center" id="about-company">
        <div class="container">
            <h2 class="h1 wow bounceIn" data-wow-duration="1s" data-wow-offset="200">{{$sections->site_name}}</h2>
            <p>{{$sections->about}}</p>
        </div>
    </section>
    <section class="our-services text-center" id="our-services">
        <div class="servic">
            <div class="container">
                <h2 class="h1">المنتجات</h2>
                <div class="row">
                  @foreach($products as $pro)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 wow fadeInRight" data-wow-duration="1s" data-wow-offset="300">
                        <div class="service-box">
                            <h3 class="text-primary">{{$pro->name}}</h3>
                            <p class="first-child center-block">{{$pro->s_price}}</p>
                            <img src="{{url('uploads/products/'.$pro->image)}}" alt="pic1" />
                            <p class="para">{{$pro->desc}}</p>
                           
                        </div>
                    </div>
                  @endforeach
                    <a class="btn btn-all" href="{{url('/products')}}">جميع المنتجات</a>
                </div>
            </div>
        </div>
    </section>
    <section class="agents text-center">
        <div class="container">
            <h2 class="h1">وكلائنا</h2>
            <div class="row">
                <ul class="list-unstyled">
                    <li class="col-md-2 col-xs-4">
                        <img class="img-responsive center-block wow bounceIn" src="{{asset('assets/front/images/p12.jpg')}}" data-wow-offset="300" data-wow-delay="0s"/>
                    </li>
                    <li class="col-md-2 col-xs-4">
                        <img class="img-responsive center-block wow bounceIn" src="{{asset('assets/front/images/p13.jpg')}}"  data-wow-offset="300" data-wow-delay="0.5s"/>
                    </li>
                    <li class="col-md-2 col-xs-4">
                        <img class="img-responsive center-block wow bounceIn" src="{{asset('assets/front/images/p14.jpg')}}"  data-wow-offset="300" data-wow-delay="1s"/>
                    </li>
                    <li class="col-md-2 col-xs-4">
                        <img class="img-responsive center-block wow bounceIn" src="{{asset('assets/front/images/p15.png')}}"  data-wow-offset="300" data-wow-delay="1.5s"/>
                    </li>
                    <li class="col-md-2 col-xs-4">
                        <img class="img-responsive center-block wow bounceIn" src="{{asset('assets/front/images/p16.png')}}"  data-wow-offset="300" data-wow-delay="2s"/>
                    </li>
                    <li class="col-md-2 col-xs-4">
                        <img class="img-responsive center-block wow bounceIn" src="{{asset('assets/front/images/p10.jpg')}}"  data-wow-offset="300" data-wow-delay="2.5s"/>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <section class="contact-us text-center" id="contact-us">
        <div class="over">
            <h2 class="h1">اتصل بنا</h2>
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 ">
                        <i class="fa fa-headphones fa-5x wow flipOutY" data-wow-duration="1s" data-wow-offset="200"></i>
                        <h3 class="h1">أخبرنا ماتشعر به</h3>
                                <p class="lead">يسعدنا تلقى رسائلك فى أى وقت</p>
                                <!--Start contact form-->
                                <form role="form" method="post" action="{{url('/msgs')}}">
                                <input type="hidden"  name="_token" value="{{ csrf_token() }}">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control input-lg" placeholder="الأسم" name="name">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control input-lg" required placeholder="البريد الأليكترونى" name="email">
                                        </div>
                                        <div class="form-group">
                                            <input type="number" class="form-control input-lg" placeholder="رقم الهاتف" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <textarea type="text" class="form-control input-lg" required placeholder="أكتب رسالتك هنا" name="content"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-lg btn-block btn-all">أرسال</button>
                                    </div>
                                </form>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <h3>أعثر علينا فى جوجل</h3>
                        <div class="google-finder">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6470.021727562877!2d30.99951719846471!3d30.792029109476477!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdee8e6c0b8e8fbb3!2sDelta+City+Hotel!5e0!3m2!1sen!2seg!4v1467819863118" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection