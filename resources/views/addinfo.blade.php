<html>
<head>
    <title>Add Admin Info</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="icon" type="image/ico" href="{{ asset('img/photo2.png') }}">
    <link href="{{ asset('css/AdminCss/SuperadminStyles.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet">
    <link href="/select2-bootstrap-theme/select2-bootstrap.min.css" type="text/css" rel="stylesheet" />
</head>
<body>

<div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 " >
    @include('admin_navbar')
</div>
<div class="BodyDiv col-lg-12 col-md-12 col-xs-12 col-sm-12 " >

    @if(session()->has('notif'))
        <div class="row">
            <div class="alert alert-success" dir="ltr">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <strong>{{ session('notif') }}</strong>
            </div>
        </div>
    @endif

    @yield('content')
</div>

<!--Body-->
<div class="BodyDiv col-lg-12 col-md-12 col-xs-12 col-sm-12 " >

    <div class="panel panel-default">
        <div class="panel-heading text-center PanelHeadingCss">Add Admin Info</div>
        <div class="panel-body PanelBodyCss">


            <form class="form-horizontal"  method="post" action="Saveadmin">
                {{ csrf_field() }}

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Admin email :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="email" class="form-control" id="AdminEmail" name="AdminEmail">
                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Admin password :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="password" class="form-control" id="AdminPassword" name="AdminPassword">
                    </div>
                </div>


                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Admin Name :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="text" class="form-control" id="AdminName" name="AdminName">
                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Admin phone :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="text" class="form-control" id="Adminphone" name="Adminphone">
                    </div>
                </div>


                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Admin address :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="text" class="form-control" id="AdminAddress" name="AdminAddress">
                    </div>
                </div>





                <div class="form-group ">
                    <div class="col-lg-7 text-center pull-right"style="margin-top: 15px">
                        <input type="submit"  name="submit" id="submit" class="btn btn-success " value="Save Info" />
                    </div>

                </div>

            </form>
        </div>



    </div>

</div>




<!-- end Body -->

</body>
</html>