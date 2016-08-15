    <header class="main-header">
        <div class="container">
            <div class="row">
            <div class="page-header">
                <div class="col-lg-8 col-md-6 col-sm-7 col-sx-12">
                    <h1><a href="#">سهل</a><small>للأدوات الصحية</small></h1>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-5 hidden-xs">
                    <div class="call-us" dir="ltr">
                        <ul class="list-unstyled">
                            <li>
                                <span class="transport">اتصل بنا <span>
                                <img class="wow tada" data-wow-duration="1s" data-wow-offset="200" data-wow-iteration="10" src="{{asset('assets/front/images/iphone.png')}}" alt=""/>
                            </li>
                            <li><a href="#">{{$sections->phone}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#my-navbar" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                   </button>
                </div>
                <div class="collapse navbar-collapse" id="my-navbar">
                    <ul class="nav navbar-nav ">
                        <li class="active"><a href="index.html">الرئيسية <span class="sr-only">(current)</span></a></li>
                        <li><a href="#" data-value="about-company">عن الشركة</a></li>
                        <li><a href="#" data-value="our-services">خدماتنا</a></li>
                        <li><a href="#" data-value="contact-us">اتصل بنا</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section class="my-slider">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
              <li data-target="#carousel-example-generic" data-slide-to="1"></li>
              <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              <li data-target="#carousel-example-generic" data-slide-to="3"></li>
              <li data-target="#carousel-example-generic" data-slide-to="4"></li>
              <li data-target="#carousel-example-generic" data-slide-to="5"></li>
              <li data-target="#carousel-example-generic" data-slide-to="6"></li>
            </ol>
          
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
              <div class="item active">
                <img src="{{asset('assets/front/images/p1.jpg')}}" alt="pic1">
                <div class="carousel-caption wow fadeInRight " data-wow-duration="1s" data-wow-delay="0.5s">
                        <h1 class="h1 wow rollIn" data-wow-duration="1s" data-wow-delay="0.5s">شركة سهل للأدوات الصحية</h1>
                        
                    </div>
              </div>
              <div class="item">
                <img src="{{asset('assets/front/images/p2.jpg')}}" alt="pic2">
                
              </div>
              
              <div class="item">
                <img src="{{asset('assets/front/images/p3.jpg')}}" alt="pic2">
                
              </div>
              
              <div class="item">
                <img src="{{asset('assets/front/images/p4.jpg')}}" alt="pic2">
                
              </div>
              
              <div class="item">
                <img src="{{asset('assets/front/images/p5.jpg')}}" alt="pic2">
                
              </div>
              <div class="item">
                <img src="{{asset('assets/front/images/p6.jpg')}}" alt="pic2">
                
              </div>
              <div class="item">
                <img src="{{asset('assets/front/images/p7.jpg')}}" alt="pic2">
                
              </div>
            </div>
          
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>
    </setion>