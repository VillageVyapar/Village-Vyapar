<?php
session_start();
if(!Session::has('adminemail'))
{
  echo "<script>location.href='adminlogin'</script>";
}
?>
@include('admin/includes/sidebar_navbar')


<!-- Page Heading -->


<!-- DataTales Example -->
<span id="message"></span>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-4 text-gray-800">Product Details</h1>
                <span style='float:left'>
                    {{$procus->links()}}
                </span>
            </div>
            <form style='float:left' method='get'
                class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group" style='text-align:left;'>
                    <input type="text" style='width:300px;border:none;border-bottom:1px solid blue;'
                        onkeyup="getproduct(this.value)" class="form-control bg-light border-1"
                        placeholder="Search products...." aria-label="Search" aria-describedby="basic-addon2">
                </div>
            </form>


        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="product_table" width="100%" cellspacing="0">

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
                        <td><img src="product_images/{{$pc['img']}}" style='height:130px;width:180px;'>
                        <td style='width:200px;'>{{$pc['p_name']}}</td>
                        <td>{{$pc['p_price']}}</td>
                        <td>{{$pc['cat_name']}} <br>{{$pc['subcat_name']}} </td>
                        <td>
                            <div style='width:250px;height:100px;overflow:scroll'>
                                {{$pc['p_desc']}}</div>
                        </td>
                        <td class="center">
                            <a href="{{ url('product_details',$pc['p_id']) }}"><button type="button"
                                    class="btn btn-primary">View</button></a><br><br>

                            <a href="{{url('deleteproduct/'.$pc['p_id'])}}"><button type="button"
                                    class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                    @else
                    <tr class="even gradeC">
                        <td><img src="product_images/{{$pc['img']}}" style='height:130px;width:180px;'>
                        <td>{{$pc['p_name']}}</td>
                        <td>{{$pc['p_price']}}</td>
                        <td>{{$pc['cat_name']}} <br>{{$pc['subcat_name']}} </td>
                        <td>
                            <div style='width:250px;height:100px;overflow:scroll'>
                                {{$pc['p_desc']}}</div>
                        </td>
                        <td class="center">
                            <a href="{{ url('product_details',$pc['p_id']) }}"><button type="button"
                                    class="btn btn-primary">View</button></a><br><br>

                            <!-- <button type="button" class="btn btn-danger">Delete</button> -->
                            <a href="{{url('deleteproduct/'.$pc['p_id'])}}"><button type="button"
                                    class="btn btn-danger">Delete</button></a>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



<div id="productmodel" class="modal fade">
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
            </div>
        </form>
    </div>
</div>
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