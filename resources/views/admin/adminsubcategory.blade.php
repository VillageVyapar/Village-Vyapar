<?php
session_start();
if(!Session::has('adminemail'))
{
  echo "<script>location.href='/adminlogin'</script>";
}
?>
@include('admin/includes/sidebar_navbar')

<div class="container-fluid">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manage
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                Add Subcategory

            </button>

            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#z">
            Add Menu 
        </button> -->
        </h6>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">

            <span>
                {{$results->links()}}
            </span>

            <div class="table-responsive">
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">

                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body" style="padding:50px;">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover"
                                        id="dataTables-example">
                                        <thead>
                                            <tr>

                                                <th>Sub Category </th>
                                                <th>Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($results as $r)
                                            @if($r['cat_id']>=1)
                                            <tr class="odd gradeX">

                                                <td style='width:100PX;'>{{$r['subcat_name']}}</td>

                                                <td style='width: 50PX;' class="center">

                                                    <a href='#'><button type="button"
                                                            class="btn btn-success">Edit</button></a>
                                                    <a href="{{url('deletesubcategory/'.$r['cat_id'])}}"><button
                                                            type="button" class="btn btn-danger">Delete</button></a>
                                                </td>
                                            </tr>
                                            @else
                                            <tr class="even gradeC">
                                                <!-- <td><img src="product_images/{{$r['cat_img']}}" style='height:130px;width:180px;'>
                                                    <td>{{$r['cat_name']}}</td> -->
                                                <td class="center">
                                                    <a href="{{ url('category_details',$pc['p_id']) }}"><button
                                                            type="button"
                                                            class="btn btn-primary">View</button></a><br><br>
                                                    <a href='#'><button type="button"
                                                            class="btn btn-success">Edit</button></a><br><br>
                                                    <a href="{{url('deletesubcategory/'.$r['cat_id'])}}"><button
                                                            type="button" class="btn btn-danger">Delete</button></a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>

                                    <style>
                                    .w-5 {
                                        display: none;
                                    }
                                    </style>
                                </div>
                                <!-- /.table-responsive -->

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