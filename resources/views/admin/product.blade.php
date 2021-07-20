<?php
session_start();
if(!Session::has('adminemail'))
{
  echo "<script>location.href='adminlogin'</script>";
}
?>
@include('admin/includes/sidebar_navbar')


<div class="container-fluid">
    <!-- /.row -->
    <br>
    <div class="card shadow mb-4">
        <div class="card-body">

            <span style='float:left'>
                {{$procus->links()}}
            </span>
            <form style='float:center;' method='get'
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group" style='text-align:right;'>
                    <input type="text" style='width:250px;' onkeyup="getproduct(this.value)"
                        class="form-control bg-light border-1" placeholder="Search products  ..." aria-label="Search"
                        aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <!-- <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button> -->
                    </div>
                </div>
            </form>

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
                                        <tbody id='msg'>

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
</script>
<!-- Page-Level Demo Scripts - Tables - Use for reference -->
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});

function getproduct(str) {

    $.ajax({
        type: 'GET',
        url: '/admingetproduct/' + str,
        data: '_token = <?php echo csrf_token() ?>',
        success: function(data) {
            $("#msg").html(data.msg);
        }
    });
}
</script>


</body>

</html>