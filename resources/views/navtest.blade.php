<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .navbar {
            overflow: hidden;
            background-color: #333;
            font-family: Arial, Helvetica, sans-serif;
        }

        .navbar a {
            float: left;
            font-size: 16px;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .dropdown {
            float: left;
            overflow: hidden;
        }

        .dropdown .dropbtn {
            font-size: 16px;
            border: none;
            outline: none;
            color: white;
            padding: 14px 16px;
            background-color: inherit;
            font-family: inherit;
            margin: 0;
        }

        .navbar a:hover, .dropdown:hover .dropbtn {
            background-color: red;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            float: none;
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            text-align: left;
        }

        .dropdown-content a:hover {
            background-color: #ddd;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
    </style>
</head>
<body>

<div class="navbar">
    <a href={{ asset('addEvent') }}>Add Event</a>
    <div class="dropdown">
        <button class="dropbtn">Parent
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="{{ asset('addParent') }}">Add Parent</a>
            <a href="{{ asset('EditParent') }}">Enquiry and Delete Parent</a>
        </div>
    </div>

    <div class="dropdown">
        <button class="dropbtn">Child
            <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-content">
            <a href="{{ asset('addChildren') }}">Add Children</a>
            <a href="{{ asset('EditChild') }}">Enquiry and Delete Children</a>
        </div>
    </div>
    <a href="{{ asset('sendMessage') }}">Send Message</a>
    <a href="{{ asset('EditInfo') }}">Edit Info</a>
    <a href="{{ asset('login') }}" class="logout" style="float: right">Logout</a>
    <a class="adminname" style="float: right"></a>
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction();">&#9776;</a>
</div>

<h3>Dropdown Menu inside a Navigation Bar</h3>
<p>Hover over the "Dropdown" link to see the dropdown menu.</p>

</body>
</html>
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