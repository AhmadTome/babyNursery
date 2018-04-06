<html>
<head>
    <title>Send Message</title>
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
        <div class="panel-heading text-center PanelHeadingCss">Send Message</div>
        <div class="panel-body PanelBodyCss">


            <form class="form-horizontal"  method="post" action="sendmail">
                {{ csrf_field() }}

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Send Message To :</label>

                    <div class="col-sm-6 pull-left">
                        <select class="form-control" id="mail" name="mail">
                            <option disabled selected> -- Select Destination Message -- </option>
                            <option value="all" > all </option>
                             @foreach( $parent as $item)
                                <option value="{{$item->email}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Message Subject :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="text" class="form-control" id="subject" name="subject">
                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Message Content :</label>

                    <div class="col-sm-6 pull-left">
                        <textarea class="form-control" rows="7" cols="5" id="title" name="title"></textarea>
                    </div>
                </div>


                <div class="form-group ">
                    <div class="col-lg-7 text-center pull-right"style="margin-top: 15px">
                        <input type="submit"  name="submit" id="submit" class="btn btn-success " value="Send Message" />
                    </div>

                </div>

            </form>
        </div>



    </div>

</div>




<!-- end Body -->

</body>
</html>