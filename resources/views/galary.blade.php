<!DOCTYPE HTML>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
    <meta charset="UTF-8">
    <title>Galary</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="icon" type="image/ico" href="{{ asset('img/photo2.png') }}">
    <link href="{{ asset('css/AdminCss/SuperadminStyles.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet">
</head>
<body>
<div id="header">
    <div class="clearfix">
        <div class="logo">
            <a href="{{ asset('home')}}"><img src="images/logo.png" alt="LOGO" height="60" width="200"></a>
        </div>
        <ul class="navigation">
            <li>
                <a href="{{ asset('home')}}">Home</a>
            </li>
            <li class="active">
                <a href="{{asset('about')}}">About</a>
            </li>
            <li>
                <a href="{{ asset('galary')}}">Gellary</a>
            </li>
            <li>
                <a href="{{ asset('login')}}">login</a>
            </li>
        </ul>
    </div>
</div>
<div id="contents">
    @foreach($child as $img)
        <div class="col-xs-4 margin-bottom pull-left">
            <img src="{{$img->clildimg}}" width="100%" height="100%">
        </div>
    @endforeach

</div>
<div id="footer">
    <div class="clearfix">
        <div class="section">
            <h4>Latest News</h4>
            <p>
                Many events will be held soon , follow us .            </p>
        </div>
        <div class="section contact">
            <h4>Contact Us</h4>
            <p>
                <span>Address:</span> palestine - Nablus
            </p>

            <p>
                <span>Email:</span> info@babynursery.com
            </p>
        </div>

    </div>
    <div id="footnote">
        <div class="clearfix">

            <p>
                Baby Nursert
            </p>
        </div>
    </div>
</div>
</body>
</html>
<style>
    .displaylable {
        display:inline-block;
        padding-top:0;
        padding-bottom:0;
        line-height:1.5em;
    }

    .content-title{padding:5px;background-color:#fff;}
    .content-title h3 a{color:#34495E;text-decoration:none; transition: 0.5s;}
    .content-title h3 a:hover{color:#F39C12; }
    .content-footer{background-color:#16A085;padding:10px;position: relative;}
    .content-footer span a {
        color: #fff;
        display: inline-block;
        padding: 6px 5px;
        text-decoration: none;
        transition: 0.5s;
    }
    .content-footer span a:hover{
        color:#F39C12;
    }
    aside .content-footer>img {
        width: 33px;
        height: 33px;
        border-radius: 100%;
        margin-right: 10px;
        border: 2px solid #fff;
    }
    .content-footer:hover .user-ditels  {
        display: block;
    }
    .content-footer .user-ditels .user-img{width: 100px;height:100px;float: left;}
    .user-small-img{cursor: pointer;}
    .user-ditels {
        width: 300px;
        top: -100px;
        height: 100px;
        padding-bottom: 99px;
        position: absolute;
        border: solid 2px #fff;
        background-color: #34495E;
        right: 25px;
        display: none;
        z-index: 1;
    }
    @media (max-width:768px) {
        .user-ditels {
            right: 5px;
        }
    }
    .user-full-ditels h3 {
        color: #fff;
        display: block;
        margin: 0px;
        padding-top: 10px;
        padding-right: 28px;
        text-align: right;
    }
    .user-full-ditels p{
        color: #fff;
        display: block;
        margin: 0px;
        padding-right: 20px;
        padding-top: 5px;
        text-align: right;}
    .social-icon {
        background-color: #fff;
        margin-top: 10px;
        padding-right: 20px;
        text-align: right;
    }
    .social-icon>a{font-size:20px;text-decoration:none;padding: 5px;}
    .social-icon a:nth-of-type(1){color:#4E71A8;}
    .social-icon a:nth-of-type(2){color:#3FA1DA;}
    .social-icon a:nth-of-type(3){color:#E3411F;}
    .social-icon a:nth-of-type(4){color:#CA3737;}
    .social-icon a:nth-of-type(5){color:#3A3A3A;}
</style>
<script>
