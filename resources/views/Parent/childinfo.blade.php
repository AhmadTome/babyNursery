<html>
<head>
    <title> Child Info</title>
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
    @include('Parent.ParentNavBar')
</div>


<!--Body-->
<div class="BodyDiv col-lg-12 col-md-12 col-xs-12 col-sm-12 " >

    <div class="panel panel-default">
        <div class="panel-heading text-center PanelHeadingCss">Child Info</div>
        <div class="panel-body PanelBodyCss">


            <form class="form-horizontal"  method="post" action="SaveChildren">
                {{ csrf_field() }}


                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Children ID :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="text" class="form-control" id="ChildrenId" name="ChildrenId" value="{{$specficchild[0]->id}}" readonly>
                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Children Name :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="text" class="form-control" id="ChildrenName" name="ChildrenName" value="{{$specficchild[0]->name}}" readonly>
                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Children Gender :</label>
                    <div class="col-sm-6 pull-left">
                        <input type="text" class="form-control" id="Childrengender" name="Childrengender" value="{{$specficchild[0]->gender}}" readonly>
                    </div>

                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left" >Birth Day :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="date" class="form-control" id="childBirthDay" name="childBirthDay" value="{{$specficchild[0]->bdate}}" readonly >
                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Arriving Time :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="date" class="form-control" id="ArravingTime" name="ArravingTime" value="{{$specficchild[0]->arrivingtime}}" readonly>
                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Parent :</label>
                    <div class="col-sm-6 pull-left">
                        <input type="text" class="form-control" id="childParent" name="childParent" value="{{$parentname}}" readonly>
                    </div>

                </div>





            </form>
        </div>



    </div>

</div>




<!-- end Body -->

</body>
</html>