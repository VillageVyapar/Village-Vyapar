<?php
session_start();
if(!Session::has('adminemail'))
{
  echo "<script>location.href='adminlogin'</script>";
}
?>
@include('admin/includes/sidebar_navbar')

<div class="container-fluid">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Manage
            <a href="#"><button type="button" class="btn btn-primary">
                    Add Product

                </button></a>

            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#z">
            Add Menu 
        </button> -->
        </h6>
    </div>

    <!-- /.row -->
    <div class="card shadow mb-4">
        <div class="card-body">

            <span>
                {{$procus->links()}}
            </span>
            <br><br>
            <div class="table-responsive">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover"
                                        id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Image </th>
                                                <th>Name </th>
                                                <th>Price (&#8377;) </th>
                                                <th>Category & <br>Sub category</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($procus as $pc)
                                            @if($pc['p_id']%2==0)
                                            <tr class="odd gradeX">
                                                <td><img src="product_images/{{$pc['img']}}"
                                                        style='height:130px;width:180px;'>
                                                <td style='width:200px;'>{{$pc['p_name']}}</td>
                                                <td>{{$pc['p_price']}}</td>
                                                <td>{{$pc['cat_name']}} <br>{{$pc['subcat_name']}} </td>
                                                <td>
                                                    <div style='width:250px;height:100px;overflow:scroll'>
                                                        {{$pc['p_desc']}}</div>
                                                </td>
                                                <td class="center">
                                                    <a href="{{ url('product_details',$pc['p_id']) }}"><button
                                                            type="button"
                                                            class="btn btn-primary">View</button></a><br><br>

                                                    <a href="{{url('deleteproduct/'.$pc['p_id'])}}"><button
                                                            type="button" class="btn btn-danger">Delete</button></a>
                                                </td>
                                            </tr>
                                            @else
                                            <tr class="even gradeC">
                                                <td><img src="product_images/{{$pc['img']}}"
                                                        style='height:130px;width:180px;'>
                                                <td>{{$pc['p_name']}}</td>
                                                <td>{{$pc['p_price']}}</td>
                                                <td>{{$pc['cat_name']}} <br>{{$pc['subcat_name']}} </td>
                                                <td>
                                                    <div style='width:250px;height:100px;overflow:scroll'>
                                                        {{$pc['p_desc']}}</div>
                                                </td>
                                                <td class="center">
                                                    <a href="{{ url('product_details',$pc['p_id']) }}"><button
                                                            type="button"
                                                            class="btn btn-primary">View</button></a><br><br>

                                                    <!-- <button type="button" class="btn btn-danger">Delete</button> -->
                                                    <a href="{{url('deleteproduct/'.$pc['p_id'])}}"><button
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