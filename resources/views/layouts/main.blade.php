
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>وزارة الداخلية</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome-all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui-1.9.2.custom.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.selectBoxIt.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/media.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/rtl.css') }}" rel="stylesheet"/>

</head>
<body>

<nav class="navbar navbar-default  alert-info">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{ route('profile.edit', auth()->user()->id ) }} "> تعديل البيانات</a></li>
                            <li><a href="{{ route('changePassword') }}"> تغير كلمة المرور</a></li>
                            <li><a href="{{ route('signout') }}">تسجيل خروج</a></li>
                        </ul>
                    </li>
                    <li>
                        @if(auth()->user()->image != "0")
                            <img class="avtar" src = "{{ asset('images/' . auth()->user()->image ) }}" width="40">
                        @else
                            <img class="avtar" src = "{{ asset('images/default.png') }}" width="40">
                    @endif
                    </li>
                </ul>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav">

                <li class="active"><a href="#"><p>وزارة الداخلية</p> <p> Ministry of Interior</p>   <span class="sr-only">(current)</span></a></li>
                <img class="logo" src="{{ asset('images/logo.png') }}" alt="logo">
            </ul>
            <div class="smart">
               <h3> إهداء من مركز التطبيقات الذكية </h3>
                <span>ت/ 22629299</span>
                <img src="{{ asset('images/logo1.png') }}" alt="smarts" width="100"/>
            </div>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-3 col-md-2">
            @include('layouts.sidebar')
        </div>
        <div class="col-xs-12 col-sm-9 col-md-10">
            @include('partial.alert')
            @yield('content')
        </div>
    </div>
</div>


<!-- jQuery (necessary for Bootstrap 's JavaScript plugins) -->

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery-ui-1.9.2.custom.min.js') }}"></script>
<script src="{{ asset('js/jquery.selectBoxIt.min.js') }}"></script>
<script src="{{ asset('js/datatablesar.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

</body>

<!-- Mirrored from linekw.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 28 Apr 2018 09:13:34 GMT -->
</html>

