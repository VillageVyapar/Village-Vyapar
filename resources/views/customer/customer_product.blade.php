<?php
session_start();
if(!Session::has('useremail'))
{
  echo "<script>location.href='/'</script>";
}
?>

@include('customer/customer_slidebar');
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
function set_Subcategory() {
    var cat = document.getElementById('category').value;
    $.ajax({
        type: 'get',
        url: '/setsubcat/' + cat,
        data: '_token = <?php echo csrf_token() ?>',
        success: function(data) {
            $("#subcategory").html(data.msg);
        }
    });
}
</script>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Your Products
                    <button data-toggle="modal" data-target="#addadminprofile" type="button"
                        class="btn btn-primary">Insert </button>
                    <input type="text" id='myInput'
                        style='padding:20px;width:400px;border:none;border-bottom:1px solid blue;float:right;'
                        onkeyup="search_product(this.value)" class="form-control bg-light border-1"
                        placeholder="Search Your Products...." aria-label="Search" aria-describedby="basic-addon2">

                    <br><br>
                    <a href='download' target='_blank'><button type="button" class="btn btn-primary">Download
                        </button></a>

            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div style='padding-right:45px;'>{{$procus->render()}} </div>

                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">

                            <table class="table table-striped table-bordered table-hover" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Image & likes</th>
                                        <th>Name </th>
                                        <th>Price (&#8377;) </th>
                                        <th>Quantity </th>
                                        <th>Category & <br>Sub category</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($procus) > 0)
                                    @foreach($procus as $pc)
                                    @if($pc['p_id']%2==0)
                                    <tr class="odd gradeX">
                                        <td><img src="product_images/{{$pc['img']}}"
                                                style='height:130px;width:180px;' /><br><b>Total likes :
                                                ({{$pc['total_like']}})</b>
                                        <td style='width:200px;'>{{$pc['p_name']}}</td>
                                        <td>{{$pc['p_price']}}</td>
                                        <td>{{$pc['QOH']}}</td>
                                        <td>{{$pc['cat_name']}} <br>{{$pc['subcat_name']}} </td>
                                        <td>
                                            <div style='width:250px;height:100px;overflow:scroll'>{{$pc['p_desc']}}
                                            </div>
                                        </td>
                                        <td class="center">
                                            <a href="{{ url('product_details',$pc['p_id']) }}"><button type="button"
                                                    class="btn btn-primary">View</button></a><br><br>
                                            {{-- <a href='{{ url('',$pc['p_id']) }}'><button type="button"
                                                    class="btn btn-success"> --}}
                                            <a data-toggle="modal" data-target="#editproduct{{$pc->p_id}}"><button type="button"
                                                    class="btn btn-sucess">Edit</button></a><br><br>
                                            <a href="{{ url('del_product',$pc['p_id']) }}"><button type="button"
                                                    class="btn btn-danger">Delete</button></a>
                                        </td>
                                        <div class="modal fade" id="editproduct{{$pc->p_id}}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">{{$pc->p_name}} Edit</h5>
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <input class="z" type="submit" style='border:none;float:right;' value="X" />
                                                        </button>
                                                    </div>
                                                    <form action="editProduct" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Product's Name</label>
                                                                <input type="hidden" name="pid" value="{{$pc->p_id}}">
                                                                <input type="text" required name="name" class="form-control"
                                                                    placeholder="Enter Product Name" value="{{$pc->p_name}}"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="price">Product price</label>
                                                                <input type="number" class="form-control" name="price"
                                                                    placeholder="Enter Price" required value="{{$pc->p_price}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="desc">Product Description</label>
                                                                <textarea class="form-control" name="desc"
                                                                    placeholder="Enter Description" required  
                                                                    rows="3">{{$pc->p_desc}}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="number">Product Quantity at hand</label>
                                                                <input type="number" class="form-control" name="qoh"
                                                                    placeholder="Enter Quantity at hand" required value="{{$pc->QOH}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="image">Product Image</label>
                                                                <img src="{{$pc->img}}" alt="" srcset="">
                                                                <input type="file" class="form-control" name="img"
                                                                    placeholder="Upload Image" requiredvalue="{{$pc->img}}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                                                        </div>
                    
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                    @else
                                    <tr class="even gradeC">
                                        <td><img src="product_images/{{$pc['img']}}"
                                                style='height:130px;width:180px;'><br><b>Total likes :
                                                ({{$pc['total_like']}})</b>
                                        <td>{{$pc['p_name']}}</td>
                                        <td>{{$pc['p_price']}}</td>
                                        <td>{{$pc['QOH']}}</td>
                                        <td>{{$pc['cat_name']}} <br>{{$pc['subcat_name']}} </td>
                                        <td>
                                            <div style='width:250px;height:100px;overflow:scroll'>{{$pc['p_desc']}}
                                            </div>
                                        </td>
                                        <td class="center">
                                            <a href="{{ url('product_details',$pc['p_id']) }}"><button type="button"
                                                    class="btn btn-primary">View</button></a><br><br>
                                            <a data-toggle="modal" data-target="#editproduct{{$pc->p_id}}"><button type="button"
                                                    class="btn btn-sucess">Edit</button></a><br><br>
                                            <a href="{{ url('del_product',$pc['p_id']) }}"><button type="button"
                                                    class="btn btn-danger">Delete</button></a>
                                        </td>
                                        <div class="modal fade" id="editproduct{{$pc->p_id}}" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title" id="exampleModalLabel">{{$pc->p_name}} Edit
                                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                            <input class="z" type="submit" style='border:none;float:right;' value="X" />
                                                        </button>
                                                        </h2>
                                                    </div>
                                                    <form action="editProduct" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Product's Name</label>
                                                                <input type="hidden" name="pid" value="{{$pc->p_id}}">
                                                                <input type="text" required name="name" class="form-control"
                                                                    placeholder="Enter Product Name" value="{{$pc->p_name}}"/>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="price">Product price</label>
                                                                <input type="number" class="form-control" name="price"
                                                                    placeholder="Enter Price" required value="{{$pc->p_price}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="desc">Product Description</label>
                                                                <textarea class="form-control" name="desc"
                                                                    placeholder="Enter Description" required 
                                                                    rows="3">{{$pc->p_desc}}</textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="number">Product Quantity at hand</label>
                                                                <input type="number" class="form-control" name="qoh"
                                                                    placeholder="Enter Quantity at hand" required value="{{$pc->QOH}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="image">Product Image</label>
                                                                <input type="file" class="form-control" name="img"
                                                                    placeholder="Upload Image" value="{{$pc->img}}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                                                        </div>
                    
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </tr>
                                    @endif
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan=9><b style='color:red;'>Not found any Product !!!</b></td>
                                    </tr>
                                    @endif
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
<script>
function search_product() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[1]; /// customer name searching
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}
</script>
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

var loadFile = function(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('output');
        output.src = reader.result;
        document.getElementById('link').href = reader.result;
    };

    reader.readAsDataURL(event.target.files[0]);
};
</script>

<!-- Product Add model -->

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Insert Your Village Product Here !!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="insertproducts" enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Name :</label>
                        <input type="text" name="pname" required class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Price :</label>
                        <input type="number" name='price' required class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Image :</label>
                        <a href='#' id='link'> <img id="output" style='max-height: 90px;' /></a>
                        <input type="file" onchange="loadFile(event)" name='proimg' required class=" form-control" />
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Category :</label>

                        <select class='form-control' name='category' id='category' onchange='set_Subcategory()'>
                            @foreach ($category as $cat)
                            <option>{{$cat['cat_name']}}</option>
                            @endforeach
                        </select>



                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Sub Category :</label>

                        <select class='form-control' name='subcategory' id='subcategory'>
                            <option> None </option>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Quantity :</label>
                        <input type="number" name='qty' required class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Description :</label>
                        <textarea class="form-control" name='desc' id="message-text"></textarea>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href='insertproducts'>
                    <input type="submit" class="btn btn-primary" value='Insert' />
                </a>
            </div>
        </div>
        </form>
    </div>
</div>

</body>

</html>