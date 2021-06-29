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
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Category 
              
            </button>
           
           <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#z">
              Add Menu 
            </button> -->
    </h6>
   </div>

   <div class="card shadow mb-4">    
        <div class="card-body">

<div class="table-responsive">
<div style='height:100px;width:100px;text-align:top'> <p>Pages : {{$results->links()}}</p></div>
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
  
    <thead>
      <tr>
      
                   <tr>
                                                    
                                                    <th>Cat_Name </th>
                                                    <th>Cat_Image</th>
                                                    <th>Action</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($results as $r)
                                              
                                                <tr class="odd gradeX">
                                                
                                                     <td style='width:200px;'>{{$r['cat_name']}}</td>
                                                    <td><img src="category_images/{{$r['cat_img']}}" style='height:130px;width:180px;'>
                                                    <td class="center">
                                                        <a href="{{ url('category_detail',$r['cat_id']) }}"><button type="button" class="btn btn-primary">View</button></a>
                                                        <a href="{{ url('admineditcategory',$r['cat_id']) }}"><button type="button" class="btn btn-success">Edit</button></a>
                                                        <a href='#'><button type="button" class="btn btn-danger">Delete</button></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                    
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
               
                    <!-- /.row -->
                    
                                  
                        <!-- /.col-lg-6 -->
                        
                    
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

