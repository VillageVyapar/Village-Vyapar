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
                <p>
                    Page : {{$results->currentPage()}}/{{$results->hasMorePages()}}</p>
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
                            <a href="{{ url('admineditcategory',$r['cat_id']) }}"><button type="button"
                                    class="btn btn-success">Edit</button></a>
                            <a href="{{url('deletecategory/'.$r['cat_id'])}}"><button type="button"
                                    class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
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
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" pattern="[A-Za-z ]+" title="letters only, no digit or no special characters "
                            autofocus id='name' required="True" name="name" class="form-control"
                            placeholder="Enter Category Name" />
                    </div>
                    <div class="form-group">
                        <label>Image</label><br /x>
                        <input type="file" required name="img" />
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