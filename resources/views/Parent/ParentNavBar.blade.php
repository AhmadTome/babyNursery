<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Discipline Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, Sony Ericsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //for-mobile-apps -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/flexslider.css') }}" type="text/css" media="screen" property="" />
    <link href="{{ asset('css/home/style.css') }}" rel="stylesheet" type="text/css" media="all" />
    <script type="text/javascript" src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>
    <!--fonts-->
    <link href="//fonts.googleapis.com/css?family=Oswald:300,400,700" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Federo" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <!--//fonts-->

    <link rel="stylesheet" href="{{ asset('css/lightbox.css') }}">

</head>
<body>
<div class="container" style="background-color: black; width: 100%">
    <nav class="navbar navbar-default">
        <div class="navbar-header navbar-left">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <h1><a class="navbar-brand" href="index.html">Baby Nursery</a></h1>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
            <nav class="menu menu--iris">
                <ul class="nav navbar-nav menu__list">
                    <li class="menu__item"><a href="{{ asset('ShowEvents') }}" class="menu__link">Show Events</a></li>
                    <li class="menu__item"><a href="{{ asset('ParentInfo') }}" class="menu__link">Show Parent Info</a></li>
                    <li class="menu__item "><a href="{{ asset('ChildInfo') }}" class="menu__link">Show Child Info</a></li>
                    <li class="menu__item "><a href="{{ asset('SelectedEvents') }}" class="menu__link">Show Selected Events</a></li>


                    <li class="dropdown menu__item">
                        <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown"><label class="parentname"></label> <b class="caret"></b></a>
                        <ul class="dropdown-menu agile_short_dropdown">
                            <li  class="menu__item logout"><a href="{{ asset('login') }}" class="menu__link">Logout</a></li>

                        </ul>
                    </li>




                </ul>
            </nav>
        </div>
    </nav>
</div>




<div style="padding-left:16px">

</div>

<script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }


    $(document).ready(function () {
        $(".parentname").empty();
        var parentname;
        $.ajax({

            type:'get',
            url:'{!!URL::to('parentname')!!}',
            data:{},
            success:function(data) {
                parentname=data;
            },
            async: false

        });

        $(".parentname").append(parentname);


        $(".logout").on('click',function() {

            $.ajax({
                type:'get',
                url:'{!!URL::to('logout')!!}',
                data:{},
                success:function(data) {

                }

            });


        });
    });
</script>

</body>
</html>
