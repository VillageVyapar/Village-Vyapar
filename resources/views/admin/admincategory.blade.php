<?php
session_start();
if(!Session::has('adminemail'))
{
  echo "<script>location.href='/'</script>";
}
?>
@include('admin.header');
<h1 class="h3 mb-4 text-gray-800">Student Management</h1>

<!-- DataTales Example -->
<span id="message"></span>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col">
                <h6 class="m-0 font-weight-bold text-primary">Student List</h6>
            </div>
            <div class="col" align="right">
                <button type="button" name="add_student" id="add_student" class="btn btn-success btn-circle btn-sm"><i
                        class="fas fa-plus"></i></button>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="student_table" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Student Name</th>
                        <th>Student Address</th>
                        <th>Email Address</th>
                        <th>Password</th>
                        <th>Gender</th>
                        <th>Date of Birth</th>
                        <th>Added By</th>
                        <th>Added On</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="studentModal" class="modal fade">
    <div class="modal-dialog">
        <form method="post" id="student_form" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal_title">Add Student</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <span id="form_message"></span>
                    <div class="form-group">
                        <label>Student Name</label>
                        <input type="text" name="student_name" id="student_name" class="form-control" required
                            data-parsley-pattern="/^[a-zA-Z0-9 \s]+$/" data-parsley-trigger="keyup" />
                    </div>
                    <div class="form-group">
                        <label>Student Address</label>
                        <input type="text" name="student_address" id="student_address" class="form-control" required
                            data-parsley-pattern="/^[a-zA-Z0-9\s]+$/" data-parsley-trigger="keyup" />
                    </div>
                    <div class="form-group">
                        <label>Student Email</label>
                        <input type="text" name="student_email_id" id="student_email_id" class="form-control" required
                            data-parsley-type="email" data-parsley-trigger="keyup" />
                    </div>
                    <div class="form-group">
                        <label>Student Password</label>
                        <input type="password" name="student_password" id="student_password" class="form-control"
                            required data-parsley-trigger="keyup" />
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select name="student_gender" id="student_gender" class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Date of Birth</label>
                        <input type="text" name="student_dob" id="student_dob" class="form-control datepicker" readonly
                            required data-parsley-trigger="keyup" />
                    </div>
                    <div class="form-group">
                        <label>Date of Birth</label><br />
                        <input type="file" name="student_image" id="student_image" />
                        <span id="student_uploaded_image"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="hidden_id" id="hidden_id" />
                    <input type="hidden" name="action" id="action" value="Add" />
                    <input type="submit" name="submit" id="submit_button" class="btn btn-success" value="Add" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
            <br><br>
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
                                
                                <a href="{{ url('admineditcategory',$r['cat_id']) }}"><button type="button"
                                    class="btn btn-success">Edit</button></a>
                            
                                <a href="{{url('deletecategory/'.$r['cat_id'])}}"><button type="button"
                                    class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <style>

                </style>
            </div>
        </form>
    </div>
</div>