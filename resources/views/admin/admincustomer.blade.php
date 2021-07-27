<?php
session_start();
if(!Session::has('adminemail'))
{
  echo "<script>location.href='/adminlogin'</script>";
}
?>
@include('admin/includes/sidebar_navbar')
<!-- DataTales Example -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <div class="col">
                <h1 class="h3 mb-4 text-gray-800" style='float:left'>Customer Details</h1>

            </div>
            <input type="text" id="myInput" onkeyup="myFunction()"
                style='float:right;width:300px;border:none;border-bottom:1px solid blue;'
                class="form-control bg-light border-1" placeholder="Search Customer..." aria-label="Search"
                aria-describedby="basic-addon2" />
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Image </th>
                        <th>Name </th>
                        <th>E-mail</th>
                        <th>Phone-No</th>
                        <th>Address</th>
                        <th>Village</th>
                        <th>District</th>
                        <th>Pincode</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cust as $c)

                    <tr class="odd gradeX">
                        <td><img src="customer_img/{{$c['c_img']}}" style='border-radius:50%;height:70px;width:70px;'>
                        <td style='width:200px;'>{{$c['c_name']}}</td>
                        <td>{{$c['email']}}</td>
                        <td>{{$c['phone_no']}} </td>
                        <td>{{$c['address']}}</td>
                        <td>{{$c['village']}}</td>
                        <td>{{$c['district']}}</td>
                        <td>{{$c['pin_code']}}</td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!--Search Bar in Sub category  --->
<script>
function myFunction() {
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