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
                <h1 class="h3 mb-4 text-gray-800">Sub-category Details</h1>
                <b>
                    {{$results->links()}}
                </b>
            </div>

            <h6 class="m-0 font-weight-bold text-primary">Manage
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addsubcat">
                    Add Subcategory
                </button>
                <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#z">
            Add Menu 
        </button> -->
            </h6>

        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="student_table" width="100%" cellspacing="0">
                <thead>
                    <tr>

                        <th>Sub Category </th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($results as $r)

                    <tr class="odd gradeX">

                        <td style='width:100PX;'>{{$r['subcat_name']}}</td>

                        <td style='width: 50PX;' class="center">

                            <a href='#'><button type="button" class="btn btn-success">Edit</button></a>

                        </td>
                        <td style='width: 50PX;' class="center">
                            <a href="{{url('deletesubcategory/'.$r['cat_id'])}}"><button type="button"
                                    class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>


                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



<div class="modal fade" id="addsubcat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <input class="z" type="submit" style='border:none;float:right;' value="X" />
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