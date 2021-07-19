<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

</script>
<script src="Customer/js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="Customer/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="Customer/js/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="Customer/js/dataTables/jquery.dataTables.min.js"></script>
<script src="Customer/js/dataTables/dataTables.bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="Customer/js/startmin.js"></script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->

</head>
<?php
session_start();
if(!Session::has('useremail'))
{
  echo "<script>location.href='/'</script>";
}
?>
<body>

@include('customer/customer_slidebar');

<div id="page-wrapper">
    <div class="dev">
    <div class="profile">
    <div class="container-fluid">
            @foreach($customers as $cust)
            <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                <form action="updateDP" enctype="multipart/form-data" method='post' class="aa-login-form" id="editForm">
                {{@csrf_field()}}
                    <div class="card-body">
                        <div class="card-title mb-4">
                            <div class="d-flex justify-content-start">
                                <div class="image-container">
                                    <img src="customer_img/{{$cust->c_img}}" id="imgProfile" style="width: 150px; height: 150px" class="img-thumbnail" alt="Image"/>
                                    <div class="middle">
                                        <input type="button" class="btn btn-secondary" id="btnChangePicture" value="Change" />
                                        <input type="file" style="display:none;" id="profilePicture" name="profiledp" required/>
                                        <button type="submit" class="btn btn-primary" id="btnChangePicture">Update</button>
                                        <input type="hidden" name="dpuserid" value="{{ $cust->c_id}}">
                                    </div>
                                </div>
                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 details">
                                
                                <div class="tab-content ml-1" id="myTabContent" style="padding-top:10px;">
                                    <form action="updateProfile" enctype="multipart/form-data" method='post' class="aa-login-form" id="editForm">
                                    {{@csrf_field()}} 
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Full Name</label>
                                                <input type="hidden" name="id" value="{{ $cust->c_id}}">
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <input type="text" name="name" id="name" value="{{ $cust->c_name }}" disabled required>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Phone no</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <input type="text" name='phone' id="phone" value="{{ $cust->phone_no }}" disabled required>
                                            </div>
                                        </div>
                                        <hr />              
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Address</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <input type="text" name='address' id="address" value="{{ $cust->address }}" disabled required>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">District</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <input type="text" name='district' id="district" value="{{ $cust->district }}" disabled required>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">village</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <input type="text" name='village' id="village" value="{{ $cust->village }}" disabled required>
                                            </div>
                                        </div>
                                        <hr />
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Pincode</label>
                                            </div>
                                            <div class="col-md-8 col-6">
                                            <input type="text" name='pincode' id="pincode" value="{{ $cust->pin_code }}" disabled required>
                                            </div>
                                        </div>
                                        <hr />
                                        @if(Session::has('success'))
                                        <div class="alert alert-success alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            {{Session::get('success')}}
                                        </div>
                                        @elseif(Session::has('failed'))
                                        <div class="alert alert-danger alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                            {{Session::get('failed')}}
                                        </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-sm-3 col-md-2 col-5">
                                                <label style="font-weight:bold;">Edit???</label>&nbsp<input type="checkbox" name="checkname" id="check" onclick="UpdateCheck()">
                                            </div>
                                            <div class="col-md-8 col-6">
                                                <button type="submit" name='update' id='update' class="btn btn-primary d-none">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
            @endforeach
        </div>
    </div>
</div>
</div>
<style>
.profile{
    padding-top:20px;
    width:50%;
    float:center;
    margin: auto;
    padding: 10px;
}   
.dev{
    background-image:url("nature-background.jpg");
}
hr{
    border-top:0;
}
.details{
    padding-top:15px;
}
body{
    padding-top: 68px;
    padding-bottom: 50px;
}
.image-container {
    position: relative;
    left:100px;
}

.image {
    opacity: 1;
    display: block;
    width: 100%;
    height: auto;
    transition: .5s ease;
    backface-visibility: hidden;
}

.middle {
    transition: .5s ease;
    opacity: 0;
    position: absolute;
    top: 88%;
    left: 6.5%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    text-align: center;
}

.image-container:hover .image {
    opacity: 0.3;
}

.image-container:hover .middle {
    opacity: 1;
}
</style>
<script>
$("input[id='btnChangePicture']").click(function() {
    $("input[id='profilePicture']").click();
});

function UpdateCheck() {
    var x = document.getElementById('check');
    if (x.checked == true) {
        document.getElementById('name').disabled = false;
        document.getElementById('phone').disabled = false;
        document.getElementById('address').disabled = false;
        document.getElementById('district').disabled = false;
        document.getElementById('village').disabled = false;
        document.getElementById('pincode').disabled = false;
        document.getElementById('proimg').disabled = false;
    } else {
        document.getElementById('name').disabled = true;
        document.getElementById('phone').disabled = true;
        document.getElementById('address').disabled = true;
        document.getElementById('district').disabled = true;
        document.getElementById('village').disabled = true;
        document.getElementById('pincode').disabled = true;
        document.getElementById('proimg').disabled = true;
    }

}
</script>
</body>

</html>