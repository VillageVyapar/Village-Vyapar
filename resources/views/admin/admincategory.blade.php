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
.z {
    float: right;
    background: white;
}

.z:hover {
    color: red;
}
</style>
@include('admin/includes/sidebar_navbar')


<!-- DataTales Example -->
<span id="message"></span>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-4 text-gray-800">Category Details</h1>
                <!-- <p>
                    Page : {{$results->currentPage()}}/{{$results->hasMorePages()}}
                </p> -->
                <b>
                    {{$results->links()}}
                </b>

            </div>
            <h6 class="m-0 font-weight-bold text-primary">Manage
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addcat">
                    Add Category
                </button>

                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#z">
            Add Menu 
        </button> -->
            </h6>
        </div>
    </div>
    <div class="card-body">
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
                        <td><img src="category_images/{{$r['cat_img']}}" style='height:90px;width:90px;'>
                        <td class="center">
                            <button type="button" data-toggle="modal" data-target="#editcat{{$r->cat_id}}" id="edit"
                                data-myname="hello" class="btn btn-success">Edit</button>

                            <button type="button" href="{{url('deletecategory/'.$r['cat_id'])}}"
                                class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    <div class="modal fade" id="editcat{{$r->cat_id}}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <form action="/edit_category" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{$r->cat_name}} Category</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="recipient-name" class="control-label">Category Name:</label>
                                            <input type="hidden" name="catid" value="{{$r->cat_id}}">
                                            <input type="text" name="currentname" id="" value="{{$r->cat_name}}" class="form-control" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="control-label">New Name:</label>
                                            <input type="text" class="form-control" name="updatename" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="recipient-name" class="control-label">New Image:</label>
                                            <p><input type="file" name="updateimg"></p>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button"
                                            data-dismiss="modal">Cancel</button>
                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>




<div class="modal fade" id="addcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <input class="z" type="submit" style='border:none' value="X" />
            </button>
            <form action="insertcat" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" pattern="[A-Za-z ]+" title="letters only, no digit or no special characters "
                            autofocus id='name' name="name" class="form-control" placeholder="Enter Category Name"
                            required />
                    </div>
                    <div class="form-group">
                        <label>Image</label><br /x>

                        <input type="file" name="catimg" required />

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="issert" class="btn btn-primary">Insert</button>
                </div>

            </form>
        </div>
    </div>
</div>

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
<!-- Logout Modal-->
</body>

</html>