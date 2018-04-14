<html>
<head>
    <title>Enquiry and Delete Parent</title>
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
<div class="col-sm-12">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
<!--Body-->
<div class="BodyDiv col-lg-12 col-md-12 col-xs-12 col-sm-12 " >

    <div class="panel panel-default">
        <div class="panel-heading text-center PanelHeadingCss">Enquiry and Delete Parent</div>
        <div class="panel-body PanelBodyCss">


            <form class="form-horizontal"  method="post" action="EditParentInfo">
                {{ csrf_field() }}

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Parent :</label>

                    <div class="col-sm-6 pull-left">
                        <select class="form-control" id="Parent_select" name="Parent_select">
                            <option disabled>-- please select parent -- </option>
                            <option value="{{$parent[0]->Id}}">{{$parent[0]->name}}</option>
                            @foreach($parent as $item)
                                <option value="{{$item->Id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Parent email :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="email" class="form-control" id="Parentemail" name="Parentemail" required value="{{$parent[0]->email}}">
                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Parent password :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="text" class="form-control" id="Parentpassword" name="Parentpassword" required value="{{$parent[0]->password}}">
                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Parent ID :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="text" class="form-control" id="ParentId" name="ParentId" required value="{{$parent[0]->Id}}">
                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Parent Name :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="text" class="form-control" id="ParentName" name="ParentName" required value="{{$parent[0]->name}}">
                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Parent age :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="text" class="form-control" id="Parentage" name="Parentage" required value="{{$parent[0]->age}}">
                    </div>
                </div>



                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Parent phone :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="text" class="form-control" id="Parentphone" name="Parentphone" required value="{{$parent[0]->phone}}">
                    </div>
                </div>

                <div class="form-group row" dir="ltr">
                    <label class="control-label col-sm-3 pull-left text-left">Parent address :</label>

                    <div class="col-sm-6 pull-left">
                        <input type="text" class="form-control" id="Parentaddress" name="Parentaddress" required value="{{$parent[0]->address}}">
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
    $(document).ready(function () {
        var ID = $("#Parent_select").val() ;

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
            $('.dname').html($('#ParentName').val());
            $('#myModal').modal('show');
        });

        $('.modal-footer').on('click', '.delete', function() {

            $.ajax({
                type: 'get',
                url: '{!!URL::to('deleteParent')!!}',
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



    $(document).on('change','#Parent_select',function() {

        var parentid = $(this).val();
        ID           =$(this).val();

        $.ajax({
            type:'get',
            url:'{!!URL::to('getParentInfo')!!}',
            data:{'parentid':parentid},
            success:function(data) {
                console.log(data[0]);
                $('#Parentemail').val(data[0].email);
                $('#Parentpassword').val(data[0].password);
                $('#ParentId').val(data[0].Id);
                $('#ParentName').val(data[0].name);
                $('#Parentage').val(data[0].age);
                $('#Parentphone').val(data[0].phone);
                $('#Parentaddress').val(data[0].address);
            }

        });


    });
    });
</script>