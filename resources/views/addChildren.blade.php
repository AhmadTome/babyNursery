<html>
<head>
    <title>Add Children</title>
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
        <div class="panel-heading text-center PanelHeadingCss">Add New Children</div>
        <div class="panel-body PanelBodyCss">


            <form class="form-horizontal"  method="post" action="SaveChildren">
                {{ csrf_field() }}


                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Children ID :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="text" class="form-control" id="ChildrenId" name="ChildrenId">
                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Children Name :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="text" class="form-control" id="ChildrenName" name="ChildrenName">
                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Children Gender :</label>

                    <div class="col-sm-6 pull-left">
                        <div class="radio">
                            <label><input type="radio" name="gender" value="male">Male</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" name="gender" value="female">Female</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Birth Day :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="date" class="form-control" id="childBirthDay" name="childBirthDay">
                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Arriving Time :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="date" class="form-control" id="ArravingTime" name="ArravingTime">
                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Parent :</label>

                    <div class="col-sm-6 pull-left">
                        <select class="form-control" id="Parent_select" name="Parent_select">
                         <option selected disabled>-- please select parent -- </option>
                        @foreach($parent as $item)
                                <option value="{{$item->Id}}">{{$item->name}}</option>

                            @endforeach
                        </select>
                    </div>
                </div>




                <div class="form-group ">
                    <div class="col-lg-7 text-center pull-right"style="margin-top: 15px">
                        <input type="submit"  name="submit" id="submit" class="btn btn-success " value="Save New Child" />
                    </div>

                </div>

            </form>
        </div>



    </div>

</div>




<!-- end Body -->

</body>
</html>