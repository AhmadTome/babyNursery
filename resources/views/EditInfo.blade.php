<html>
<head>
    <title>Edit Info</title>
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


<!--Body-->
<div class="BodyDiv col-lg-12 col-md-12 col-xs-12 col-sm-12 " >

    <div class="panel panel-default">
        <div class="panel-heading text-center PanelHeadingCss">Edit Info</div>
        <div class="panel-body PanelBodyCss">


            <form class="form-horizontal"  method="post" action="EditInformation">
                {{ csrf_field() }}


                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Admin Name :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="text" class="form-control" id="AdminName" name="AdminName" value="{{$info[0]->name}}">
                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Admin phone :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="text" class="form-control" id="Adminphone" name="Adminphone" value="{{$info[0]->phone_number}}">
                    </div>
                </div>



                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Admin address :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="text" class="form-control" id="AdminAddress" name="AdminAddress" value="{{$info[0]->address}}">
                    </div>
                </div>





                <div class="form-group ">
                    <div class="col-lg-7 text-center pull-right"style="margin-top: 15px">
                        <input type="submit"  name="submit" id="submit" class="btn btn-success " value="Edit Info" />
                    </div>

                </div>

            </form>
        </div>



    </div>

</div>




<!-- end Body -->

</body>
</html>