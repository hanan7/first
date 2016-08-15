<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Our First Hand</title>    
    <link rel="stylesheet" href="{{asset('assets/admin/profile/css/style.css')}}">
    <link rel='stylesheet' href="{{asset('assets/admin/profile/css/bootstrap.min.css')}}" />
    <link rel='stylesheet' href="{{asset('assets/admin/profile/css/bootstrap-rtl.css')}}"/>
    <link rel='stylesheet' href="{{asset('assets/admin/profile/css/font-awesome.min.css')}}"/>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:400,700,300'/>
</head>

<body>
    
    <section class="profile">

            <div class="card ">
                <div class="card-header text-center">
                    <img class="img-circle" src="{{url('uploads/admins/'.$admin->photo)  }}" alt="{{$admin->name}}" style="width:100px; height="100px;" ">
                    <h3>الأسم</h3> 
                    <p>{{$admin->name}}</p>
                    <a href="#"><i class="fa fa-google-plus fa-2x"></i></a> 
                    <a href="#"><i class="fa fa-facebook fa-2x"></i></a>
                    <a href="#"><i class="fa fa-twitter fa-2x"></i></a> 
                </div>
                <div class="data">
                    <ul class="list-unstyled">
                        <li class="first"> أسم المستخدم
                            <b style="margin-right:200px;">{{$admin->username}}</b>
                         </li>
                        <li>الإيميل
                            <b style="margin-right:200px;">{{$admin->email}}</b>
                        </li>
                        <li>العنوان
                            <b style="margin-right:200px;">{{$admin->address}}</b>
                        </li>
                        <li>التليفون
                            <b style="margin-right:200px;">{{$admin->phone}}</b>
                        </li>
                        <li>معلومات إضافية
                            <b style="margin-right:200px;">{{$admin->other}}</b>
                        </li>
                    </ul>
                </div>
            </div>
 
    </section>
   
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="{{asset('assets/admin/profile/js/jquery-1.12.1.min.js')}}"></script>
        <script src="{{asset('assets/admin/profile/js/animation.js')}}"></script> 
</body> 