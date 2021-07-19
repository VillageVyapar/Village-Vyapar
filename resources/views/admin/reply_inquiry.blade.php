<?php
session_start();
if(!Session::has('adminemail'))
{
  echo "<script>location.href='adminlogin'</script>";
}
?>
@include('admin/includes/sidebar_navbar')
<html>

<head>


    <link href="css/button.css" rel="stylesheet" type="text/css" />
</head>

<center>
    <div class="card-body">
        <div class="table-responsive">
            <form method='post'>
                <table class="table table-bordered" style="color:black;width:500px;background-color:white"
                    id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th colspan="2" style="color:orange;font:30px Arial">
                                <center> Inquiry </center>
                            </th>
                        </tr>

                        <tr>
                            <th> Customer Name </th>
                            <td><input type="text" readonly style='border:none;' name='cname' value="" size=35
                                    id="typepass" />
                        </tr>
                        <tr>
                            <th> Email </th>
                            <td><input type="text" readonly style='border:none;' name='email' value="" size=35
                                    id="typepass" />
                        </tr>

                        <tr>
                            <th> Reply </th>
                            <td><textarea type="text" required name='reply' rows=4 cols=40></textarea>
                        </tr>

                        <tr>
                            <a href='MAil/inq_mail.php?id=$id'>
                                <td colspan='2'>
                                    <center><input type='submit' name='editpass' id='editbutton' value='Send' />
                                    </center>
                                </td>
                            </a>
                        </tr>
                    </thead>
                    </body>
                </table>
            </form>
        </div>
    </div>