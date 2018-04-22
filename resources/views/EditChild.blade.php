<html>
<head>
    <title>Enquiry and Delete Children</title>
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
        <div class="panel-heading text-center PanelHeadingCss">Enquiry and Delete Children</div>
        <div class="panel-body PanelBodyCss">


            <form class="form-horizontal" enctype="multipart/form-data"  method="post" action="EditChildren">
                {{ csrf_field() }}

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Children :</label>

                    <div class="col-sm-6 pull-left">
                        <select class="form-control" id="Children_select" name="Children_select">
                            <option disabled>-- please select child -- </option>
                            <option value="{{$child[0]->id}}">{{$child[0]->name}}</option>
                            @foreach($child as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Children ID :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="text" class="form-control" id="ChildrenId" name="ChildrenId" required value="{{$child[0]->id}}">
                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Children Name :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="text" class="form-control" id="ChildrenName" name="ChildrenName" required value="{{$child[0]->name}}" >
                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Children Gender :</label>
                    <div class="col-sm-1 pull-left">
                        <label id="genderselected" name="genderselected">
                            {{$child[0]->gender}}
                        </label>
                        <input type="hidden" name="genderhidden" id="genderhidden" value="{{$child[0]->gender}}">
                    </div>
                    <div class="col-sm-5 pull-left">
                        <div class="radio">
                            <label><input type="radio" id="gender" onclick="male();" name="gender" value="male">Male</label>
                        </div>
                        <div class="radio">
                            <label><input type="radio" id="gender" onclick="female();" name="gender" value="female">Female</label>
                        </div>
                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Birth Day :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="date" class="form-control" id="childBirthDay" name="childBirthDay" required value="{{$child[0]->bdate}}">
                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Arriving Time :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="date" class="form-control" id="ArravingTime" name="ArravingTime" required value="{{$child[0]->arrivingtime}}">
                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Cost per Month :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="number" class="form-control" id="cost" name="cost" required value="{{$child[0]->cost}}">
                    </div>
                </div>

                <div class="form-group ">
                    <div class="col-sm-4 pull-right">
                        <input type="submit" class="btn btn-primary"  id="Edit" value="تعديل"/>
                    </div>

                    <div class="col-sm-3 pull-right">
                        <button type="button" class="btn btn-danger delete-modal"  id="Delete">حذف</button>

                    </div>
                </div>

                <!-- Start Model -->

                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title"></h4>
                            </div>
                            <div class="modal-body" >


                                <div class="deleteContent" dir="rtl">
                                    هل أنت متأكد من أنك تريد حذف  <span class="dname"></span> ؟
                                    <span class="hidden did"></span>
                                </div>


                                <div class="modal-footer">
                                    <button type="button" class="btn actionBtn" data-dismiss="modal">
                                        <span id="footer_action_button" > </span>
                                    </button>
                                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                                        <span></span> Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- End Model -->


            </form>
        </div>



    </div>

</div>




<!-- end Body -->

</body>
</html>
<script>
    function male() {
        var div=document.getElementById('genderselected');

        div.innerHTML="Male";
    }

    function female() {
        var div=document.getElementById('genderselected');
        div.innerHTML="Female";
    }

    $(document).ready(function () {
        var ID = $("#Children_select").val() ;

        $("#Parent_select").select2({
            dropdownAutoWidth : true,
            theme: "classic"
        });



        $(document).on('click', '.delete-modal', function() {

            $('#footer_action_button').text(" Delete");
            // $('#footer_action_button').removeClass('glyphicon-check');
            //$('#footer_action_button').addClass('glyphicon-trash');
            // $('.actionBtn').removeClass('btn-success');
            $('.actionBtn').addClass('btn-danger');
            $('.actionBtn').addClass('delete');
            $('.modal-title').text('Delete');
            $('.EditContent').hide();
            $('.did').text($('#name'));
            $('.deleteContent').show();
            $('.dname').html($('#ChildrenName').val());
            $('#myModal').modal('show');
        });

        $('.modal-footer').on('click', '.delete', function() {

            $.ajax({
                type: 'get',
                url: '{!!URL::to('deletechild')!!}',
                data: {
                    'id':ID
                },
                success: function(data) {
                    location.reload();
                },
                error:function (data) {
                    console.log('error')
                }

            });
        });

        $(document).on('change','#Children_select',function() {

            var childid = $(this).val();
            ID           =$(this).val();
            $("#gender").prop('checked', false);
            $.ajax({
                type:'get',
                url:'{!!URL::to('getchildInfo')!!}',
                data:{'childid':childid},
                success:function(data) {
                    console.log(data[0]);
                    $('#ChildrenId').val(data[0].id);
                    $('#ChildrenName').val(data[0].name);
                    $('#childBirthDay').val(data[0].bdate);
                    $('#ArravingTime').val(data[0].arrivingtime);
                    $('#genderhidden').val(data[0].gender);
                    $('#cost').val(data[0].cost);


                    var div=document.getElementById('genderselected');
                    div.innerHTML=data[0].gender;


                }

            });


        });

    });



</script>