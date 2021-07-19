<?php
session_start();
if(!Session::has('adminemail'))
{
  echo "<script>location.href='/adminlogin'</script>";
}
?>
@include('admin/includes/sidebar_navbar')

<div id="page-wrapper">
    <div class="container-fluid">


        <div class="card shadow mb-4">
            <div class="card-body">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <h1 class="">Inquiry</h1>
                        <form method='get' action='reply'>
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example ">
                                <thead>
                                    <tr>
                                        <th>Customer Name </th>
                                        <th>E-mail</th>
                                        <th>Subject</th>
                                        <th>Comp_Name</th>
                                        <th>Message</th>
                                        <th>Reply</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($inq as $c)
                                    @if($c['c_id']>=0)
                                    <tr class=" odd gradeX">
                                        <td style='width:200px;'>{{$c['c_name']}}</td>
                                        <td>{{$c['email']}}</td>
                                        <td>{{$c['subject']}} </td>
                                        <td>{{$c['comp_name']}}</td>
                                        <td>
                                            <div style='width:250px;height:100px;overflow:scroll'>
                                                {{$c['message']}}</div>
                                        </td>

                                        <td>
                                            @if($c->reply == '')
                                            <div class='' style='color:Red'> Not replied </div>
                                            @else
                                            <div style='width:250px;height:100px;overflow:scroll'>
                                                {{$c['reply']}}</div>
                                            @endif

                                        </td>

                                        <td> <input type='text' name='inqid' disabled value='{{$c->i_id}}' />
                                            <a><button type="button" class="btn btn-primary">Reply</button></a>
                                        </td><br><br>

                                    </tr>
                                    @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </form>
                    </div>
                    <!-- /.table-responsive -->

                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>

    </div>

</div>
<script src="/Customer/js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/Customer/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="/Customer/js/metisMenu.min.js"></script>

<!-- DataTables JavaScript -->
<script src="/Customer/js/dataTables/jquery.dataTables.min.js"></script>
<script src="/Customer/js/dataTables/dataTables.bootstrap.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="/Customer/js/startmin.js"></script>

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