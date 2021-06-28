<?php
session_start();
if(!Session::has('useremail'))
{
  echo "<script>location.href='/'</script>";
}
?>

@include('customer/customer_slidebar');

<div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 style='text-align:center' class="page-header"> Your Messages
                            <hr style='border-color:black'></hr>
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Your Chat board Here !
                                </div>
                                <!-- /.panel-heading -->
                                
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

    </body>
</html>


