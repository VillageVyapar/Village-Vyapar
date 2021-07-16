<?php
session_start();
if(!Session::has('useremail'))
{
  echo "<script>location.href='/'</script>";
}
?>

@include('customer/customer_slidebar');
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"> Your Inquiry
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">

                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">

                            <table style='text-align:Center;' class="table table-striped table-bordered table-hover"
                                id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Customer<br>Name</th>
                                        <th>Email </th>
                                        <th>Subject</th>
                                        <th>Company name </th>
                                        <th>Message</th>
                                        <th>Reply</th>
                                        <th>Checked ??</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($inquiry as $i)
                                    @if($i['i_id']%2==0)
                                    <tr class="odd gradeX">
                                        <td>{{$i->c_name}}</td>
                                        <td style='width:200px;'>{{$i->email}}</td>
                                        <td>{{$i->subject}}</td>
                                        <td>{{$i->comp_name}}</td>
                                        <td>
                                            <div style='width:250px;height:100px;overflow:scroll'>{{$i->message}}
                                            </div>
                                        </td>
                                        <td>
                                            <div style='width:250px;height:100px;overflow:scroll'>{{$i->reply}}
                                            </div>
                                        </td>
                                        <td>
                                            $i->reply
                                        </td>

                                    </tr>
                                    @else
                                    <tr class="odd gradeX">
                                        <td>{{$i->c_name}}</td>
                                        <td style='width:200px;'>{{$i->email}}</td>
                                        <td>{{$i->subject}}</td>
                                        <td>{{$i->comp_name}}</td>

                                        <td>
                                            <div style='width:250px;height:100px;overflow:scroll'>{{$i->message}}
                                            </div>
                                        </td>
                                        <td>

                                            <?php
                                                    if($i->reply == '')
                                                        echo "<p style='color:red'>Sorry ,Yet not given any reply</p>";
                                                    else
                                                    {
                                                        echo "<div style='width:250px;height:100px;overflow:scroll'>$i->reply</div>";
                                                    }
                                                ?>
                                        </td>
                                        <td>
                                            @if($i->checked ==1 )
                                            <b style='color:green'> read</b>
                                            @else
                                            <b style='color:red'> unread</b>
                                            @endif

                                        </td>
                                        <td>
                                            <a href="{{ url('del_inquiry',$i['i_id']) }}"><button type="button"
                                                    onClick="return confirm('Are you sure want to delete the inquiry ?? ')"
                                                    class="btn btn-danger">Delete</button></a>
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


</body>

</html>