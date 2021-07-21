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
                <h1 class="h3 mb-4 text-gray-800">Admin Details</h1>
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

                    </tr>
                </thead>
                <tbody>
                    @foreach($admi as $c)
                    @if($c['a_id']>=0)
                    <tr class="odd gradeX">
                        <td><img src="Admin_img/{{$c['a_img']}}" style='border-radius:50%;height:70px;width:70px;'>
                        <td style='width:200px;'>{{$c['a_name']}}</td>
                        <td>{{$c['a_email']}}</td>
                        <td>{{$c['a_phone']}} </td>

                        <!--  <td class="center">
                                    <a href="{{ url('product_details',$c['c_id']) }}"><button type="button" class="btn btn-primary">View</button></a><br><br>
                                    <a href='#'><button type="button" class="btn btn-success">Edit</button></a><br><br>
                                    <a href='#'><button type="button" class="btn btn-danger">Delete</button></a>
                                </td> -->
                    </tr>
                    @endif
                    @endforeach
            </table>
        </div>
    </div>
</div>