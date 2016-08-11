@extends('front/layouts/master')

@section('content')

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
                   
                </div>
            </div>
        </div>
    </section>
@endsection