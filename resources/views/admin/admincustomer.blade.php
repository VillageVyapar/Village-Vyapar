<?php
session_start();
if(!Session::has('adminemail'))
{
  echo "<script>location.href='/adminlogin'</script>";
}
?>
@include('admin/includes/sidebar_navbar')
<!-- DataTales Example -->
<span id="message"></span>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-4 text-gray-800">Customer Details</h1>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="student_table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Image </th>
                        <th>Name </th>
                        <th>E-mail</th>
                        <th>Phone-No</th>
                        <th>Address</th>
                        <th>Village</th>
                        <th>District</th>
                        <th>Pincode</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cust as $c)
                    @if($c['c_id']>=0)
                    <tr class="odd gradeX">
                        <td><img src="customer_img/{{$c['c_img']}}" style='border-radius:50%;height:70px;width:70px;'>
                        <td style='width:200px;'>{{$c['c_name']}}</td>
                        <td>{{$c['email']}}</td>
                        <td>{{$c['phone_no']}} </td>
                        <td>{{$c['address']}}</td>
                        <td>{{$c['village']}}</td>
                        <td>{{$c['district']}}</td>
                        <td>{{$c['pin_code']}}</td>
                    </tr>

                    @endif
                    @endforeach
        </div>
    </div>
</div>