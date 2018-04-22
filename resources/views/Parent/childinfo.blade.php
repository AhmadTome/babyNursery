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
                    <label class="control-label col-sm-3 pull-left text-left">child :</label>
                <div class="col-sm-6 pull-left">
                    <select class="form-control" id="child_select" name="child_select">
                        <option selected disabled>-- please select child -- </option>
                        @foreach($specficchild as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>

                        @endforeach
                    </select>
                </div>
                </div>
                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Children ID :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="text" class="form-control" id="ChildrenId" name="ChildrenId" value="" readonly>
                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Children Name :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="text" class="form-control" id="ChildrenName" name="ChildrenName" value="" readonly>
                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Children Gender :</label>
                    <div class="col-sm-6 pull-left">
                        <input type="text" class="form-control" id="Childrengender" name="Childrengender" value="" readonly>
                    </div>

                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left" >Birth Day :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="date" class="form-control" id="childBirthDay" name="childBirthDay" value="" readonly >
                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Arriving Time :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="date" class="form-control" id="ArravingTime" name="ArravingTime" value="" readonly>
                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Cost per Month :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="number" class="form-control" id="cost" name="cost" readonly value="">
                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">image :</label>
                    <div class="col-sm-6 pull-left">
                        <img  id="childimg" width="60%" height="400px">
                    </div>

                </div>





            </form>
        </div>



    </div>

</div>




<!-- end Body -->

</body>
</html>
<script>
    $(document).ready(function () {
        $("#child_select").select2({
            dropdownAutoWidth : true,
            theme: "classic"
        });

        $('#child_select').on('change',function () {
         var child_id = $(this).val();
            $.ajax({

                type:'get',
                url:'{!!URL::to('getchild')!!}',
                data:{'id':child_id},
                success:function(data) {

                    $('#ChildrenId').val(data[0].id);
                    $('#ChildrenName').val(data[0].name);
                    $('#Childrengender').val(data[0].gender);
                    $('#childBirthDay').val(data[0].bdate);
                    $('#ArravingTime').val(data[0].arrivingtime);
                    $('#cost').val(data[0].cost);


                    //$('#childParent').val(data[0].id);
                   // $('#img').val(data[0].id);

                    $("#childimg").attr("src",data[0].clildimg);




                },
                async: false

            });


        });



    });


</script>