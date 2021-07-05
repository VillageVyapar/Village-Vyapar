<!DOCTYPE html>
<html>
<head>

</head>
<?php
session_start();
if(!Session::has('adminemail'))
{
  echo "<script>location.href='adminlogin'</script>";
}
?>
<style>
.z
{
	float:right;
	background:white;
}
.z:hover
{
	color:red;
}
</style>
@include('admin/includes/sidebar_navbar')
<!-- <div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <input class="z" type="submit" value="X" />
     </button>
      <form action="" method="POST"  enctype="multipart/form-data" >
        <div class="modal-body">
            <div class="form-group">
                <label>Category Name</label>
                <input type="text"  pattern="[A-Za-z ]+" title="letters only, no digit or no special characters " autofocus id='name' required="True" name="name" class="form-control" placeholder="Enter Category Name"  />
            </div>
			<div class="form-group">
                <label>Image</label><br /x>
                <input type="file" required  name="img"/>
				
            </div>
        </div>
        <div class="modal-footer">
            <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="issert" class="btn btn-primary">Insert</button>
        </div>
      </form>
    </div>
  </div>
</div> -->
<div class="modal" id="addcategory" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Manage
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addcategory">
            Add Category 
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
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="padding:50px;">
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
                        <a href="{{url('deletecategory/'.$r['cat_id'])}}"><button type="button" class="btn btn-danger">Delete</button></a>
                    </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
            
            <style>
            .w-5{
                display:none;
                padding:50px;
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
<!-- Model of insert category -->
</body>
</html>


