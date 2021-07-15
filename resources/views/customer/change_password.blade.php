@include('customer/customer_slidebar');
<style>
.form-input {
    width: 100%;
    padding: 3px 10px;
    margin: 5px 0;
    box-sizing: border-box;
}
</style>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Change Password </h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Fill current password and change password details
                    </div>
                    <div class="panel-body">
                        <form role="" method='POST' action='change_pass'>
                            {{@csrf_field()}}
                            <div class="form-group" style='width:500px'>
                                <label>Current Password : </label>
                                <input type='password' name='currentp' class='form-input' required
                                    placeholder='Enter Current Password here'>
                            </div>
                            <div class="form-group" style='width:500px'>
                                <label>New Password : </label>
                                <input type='password' class="form-input" name='newp' required
                                    placeholder='Enter New Password here'>
                            </div>
                            <div class="form-group" style='width:500px'>
                                <label>Confirm Password : </label>
                                <input type='password' class="form-input" name='newcp' required
                                    placeholder='Enter Confirm Password here'>
                            </div>
                            <a href="url('change_pass')"><input type='submit' class="btn btn-success"
                                    value='Change' /></a> &nbsp;&nbsp;&nbsp;
                            <a href='#'><input type='reset' class="btn btn-danger" value='Reset' /></a>
                        </form>
                        <!-- /.container-fluid -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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