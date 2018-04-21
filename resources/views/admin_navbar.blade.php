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
                    <li class="menu__item"><a href="{{ asset('addEvent') }}" class="menu__link">Add Event</a></li>
                    <li class="menu__item"><a href="{{ asset('sendMessage') }}" class="menu__link">Send Message</a></li>
                    <li class="menu__item "><a href="{{ asset('EditInfo') }}" class="menu__link">Edit Info</a></li>
                    <li class="dropdown menu__item">
                        <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown">Parent <b class="caret"></b></a>
                        <ul class="dropdown-menu agile_short_dropdown">
                            <li><a href="{{ asset('addParent') }}">Add Parent</a></li>
                            <li><a href="{{ asset('EditParent') }}">&nbsp;Enquiry and Delete Parent&nbsp;</a></li>
                        </ul>
                    </li>
                    <li class="dropdown menu__item">
                        <a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown">Children <b class="caret"></b></a>
                        <ul class="dropdown-menu agile_short_dropdown">
                            <li><a href="{{ asset('addChildren') }}">Add Children</a></li>
                            <li><a href="{{ asset('EditChild') }}">Enquiry and Delete Children</a></li>
                        </ul>
                    </li>
                    <li  class="menu__item logout"><a href="{{ asset('login') }}" class="menu__link">Logout</a></li>
                </ul>
            </nav>
        </div>
    </nav>
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
        $(".adminname").empty();
        var adminname;
        $.ajax({

            type:'get',
            url:'{!!URL::to('adminname')!!}',
            data:{},
            success:function(data) {
                adminname=data;
            },
            async: false

        });

        $(".adminname").append(adminname);

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
