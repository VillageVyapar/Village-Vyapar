<?php
session_start();
if(!Session::has('useremail'))
{
  echo "<script>location.href='/'</script>";
}
?>
c
@include('customer/customer_slidebar');
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
      <script>
         function set_Subcategory() {
             var cat=document.getElementById('category').value;
            $.ajax({
               type:'get',
               url:'/setsubcat/'+cat,
               data:'_token = <?php echo csrf_token() ?>',
               success:function(data) {
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
                            <button data-toggle="modal" data-target="#addadminprofile"  type="button" class="btn btn-primary">Insert </button><br><br>
                            <a href='download' target='_blank'><button type="button" class="btn btn-primary">Download </button></a>
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
                                    
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                                            @foreach($procus as $pc)
                                                @if($pc['p_id']%2==0)
                                                <tr class="odd gradeX">
                                                    <td><img src="product_images/{{$pc['img']}}" style='height:130px;width:180px;'/><br><b>Total likes : ({{$pc['total_like']}})</b>
                                                    <td style='width:200px;'>{{$pc['p_name']}}</td>
                                                    <td>{{$pc['p_price']}}</td>
                                                    <td>{{$pc['QOH']}}</td>
                                                    <td>{{$pc['cat_name']}} <br>{{$pc['subcat_name']}} </td>
                                                    <td><div style='width:250px;height:100px;overflow:scroll'>{{$pc['p_desc']}}</div></td>
                                                    <td class="center">
                                                        <a href="{{ url('product_details',$pc['p_id']) }}"><button type="button" class="btn btn-primary">View</button></a><br><br>
                                                        <a href='#'><button type="button" class="btn btn-success">Edit</button></a><br><br>
                                                        <a href='#'><button type="button" class="btn btn-danger">Delete</button></a>
                                                    </td>
                                                </tr>
                                                @else
                                                <tr class="even gradeC">
                                                <td><img src="product_images/{{$pc['img']}}" style='height:130px;width:180px;'><br><b>Total likes : ({{$pc['total_like']}})</b>
                                                    <td>{{$pc['p_name']}}</td>
                                                    <td>{{$pc['p_price']}}</td>
                                                    <td>{{$pc['QOH']}}</td>
                                                    <td>{{$pc['cat_name']}} <br>{{$pc['subcat_name']}} </td>
                                                    <td><div style='width:250px;height:100px;overflow:scroll'>{{$pc['p_desc']}}</div></td>
                                                    <td class="center">
                                                        <a href="{{ url('product_details',$pc['p_id']) }}"><button type="button" class="btn btn-primary">View</button></a><br><br>
                                                        <a href='#'><button type="button" class="btn btn-success">Edit</button></a><br><br>
                                                        <a href="{{ url('del_product',$pc['p_id']) }}"><button type="button" class="btn btn-danger">Delete</button></a>
                                                    </td>
                                                </tr>
                                                @endif
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

        <!-- Product Add model -->       
        
            <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Insert Your Village Product Here !!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action=insertproducts enctype='multipart/form-data'>
                    {{ @csrf_field() }}
                    
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
                        <input type="file" name='productimg' required class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Category :</label>
                        
                       <form method='get' > <select class='form-control' name='category' id='category' onchange='set_Subcategory()'>
                            @foreach ($category as $cat)
                                <option>{{$cat['cat_name']}}</option>
                            @endforeach
                        </select>
                        </form>
                        
                        
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Sub Category :</label>
                        
                        <select class='form-control' name='subcategory' id='subcategory'>
                            
                                <option> None </option>
                                
                        </select>
                        
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Quantity  :</label>
                        <input type="number" name='qty' required class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Description :</label>
                        <textarea class="form-control" name='desc' id="message-text"></textarea>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" value='Insert' />
                </div>
                </div>
                </form>
            </div>
            </div>

    </body>
</html>


