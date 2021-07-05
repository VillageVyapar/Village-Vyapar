<?php
session_start();
if(!Session::has('adminemail'))
{
  echo "<script>location.href='/adminlogin'</script>";
}
?>
@include('admin/includes/sidebar_navbar')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Customer
                    <!-- <a href='#'><button type="button" class="btn btn-primary">Insert </button></a><br><br> -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Here The List !
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">

                            <table class="table table-striped table-bordered table-hover" id="dataTables-example"
                                style="padding:50px;">
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
                                        <td><img src="customer_img/{{$c['c_img']}}" style='height:130px;width:180px;'>
                                        <td style='width:200px;'>{{$c['c_name']}}</td>
                                        <td>{{$c['email']}}</td>
                                        <td>{{$c['phone_no']}} </td>
                                        <td>{{$c['address']}}</td>
                                        <td>{{$c['village']}}</td>
                                        <td>{{$c['district']}}</td>
                                        <td>{{$c['pin_code']}}</td>
                                        <!--  <td class="center">
                                    <a href="{{ url('product_details',$c['c_id']) }}"><button type="button" class="btn btn-primary">View</button></a><br><br>
                                    <a href='#'><button type="button" class="btn btn-success">Edit</button></a><br><br>
                                    <a href='#'><button type="button" class="btn btn-danger">Delete</button></a>
                                </td> -->
                                    </tr>
                                    @else
                                    <!-- <tr class="even gradeC">
                            <td><img src="product_images/{{$c['img']}}" style='height:130px;width:180px;'>
                                
                                <td><div style='width:250px;height:100px;overflow:scroll'>{{$c['p_desc']}}</div></td>
                                <td class="center">
                                    <a href="{{ url('product_details',$c['p_id']) }}"><button type="button" class="btn btn-primary">View</button></a><br><br>
                                    <a href='#'><button type="button" class="btn btn-success">Edit</button></a><br><br>
                                    <a href='#'><button type="button" class="btn btn-danger">Delete</button></a>
                                </td>
                            </tr> -->
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                        <span>
                            {{$cust->links()}}
                        </span>
                        <style>
                        .w-5 {
                            display: none;
                        }
                        </style>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->


        <!-- /.col-lg-6 -->

        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
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
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});
</script>

</body>

</html>