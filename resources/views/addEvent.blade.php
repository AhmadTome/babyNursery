<html>
<head>
    <title>Add Event</title>
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
        <div class="panel-heading text-center PanelHeadingCss">Add New Event</div>
        <div class="panel-body PanelBodyCss">


            <form class="form-horizontal" enctype="multipart/form-data" method="post" action="SaveEvent">
                {{ csrf_field() }}


                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Event ID :</label>

                    <div class="col-sm-6 pull-left">
                      <input type="text" class="form-control" id="EventId" name="EventId">
                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Event Name :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="text" class="form-control" id="Eventname" name="Eventname">
                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Event Date :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="date" class="form-control" id="Eventdate" name="Eventdate">
                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Event Location :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="text" class="form-control" id="Eventlocation" name="Eventlocation">

                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Event Description :</label>

                    <div class="col-sm-6 pull-left">
                        <textarea class="form-control" id="EventDescription" name="EventDescription" rows="5" cols="5"></textarea>
                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Event Image :</label>

                    <div class="col-sm-6 pull-left">
                        <input class="form-control image" type="file" name="EventImage" id="EventImage" value="select a image"  />
                    </div>
                </div>




                <div class="form-group ">
                    <div class="col-lg-7 text-center pull-right"style="margin-top: 15px">
                        <input type="submit"  name="submit" id="submit" class="btn btn-success " value="Save New Event" />
                    </div>

                </div>

            </form>
        </div>



    </div>

</div>




<!-- end Body -->

</body>
</html>