<?php
session_start();
if(!Session::has('useremail'))
 {
   echo "<script>location.href='/'</script>";
 }  
?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

@include('customer/customer_slidebar');
@foreach($customers as $cust)
<div class="profile">
  <form action="updateProfile" enctype="multipart/form-data" method='post' class="aa-login-form" id="editForm">
    {{@csrf_field()}}
    <table width="200" style='border:2px solid black;' align="center" frame="void"style="overflow-x:auto;">
      <tbody>
          <td><img src="customer_img/{{$cust->c_img}}" alt="Image"/><input type="file" name="profiledp" id="proimg" disabled></td>
          
        <tr>
          <td><input type="hidden" name="id" value="{{ $cust->c_id}}"></td>
        </tr>
        <tr>
          <td><input type="hidden" name="currentdp" value="{{ $cust->c_img}}"></td>
        </tr>
        <tr>
          <td><label for="">Full Name: </label></td>
          <td><input type="text" name="name" id="name" value="{{ $cust->c_name }}" disabled required></td>
        </tr>
        <tr>
          <td><label for="">Phone No:</label></td>
          <td><input type="text" name='phone' id="phone" value="{{ $cust->phone_no }}" disabled required></td>
        </tr>
        <tr>
          <td><label for="">Address:</label></td>
          <td><input type="text" name='address' id="address" value="{{ $cust->address }}" disabled required></td>
        </tr>
        <tr>
          <td><label for="">District:</label></td>
          <td><input type="text" name='district' id="district" value="{{ $cust->district }}" disabled required></td>
        </tr>
        <tr>  
          <td><label for="">Village:</label></td>
          <td><input type="text" name='village' id="village" value="{{ $cust->village }}" disabled required></td>
        </tr>
        <tr>
          <td><label for="">Pincode:</label></td>
          <td><input type="text" name='pincode' id="pincode" value="{{ $cust->pin_code }}" disabled required></td>
        </tr>
          <td colspan="2">@if(Session::has('success'))
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">×</button>
              {{Session::get('success')}}
            </div>
            @elseif(Session::has('failed'))
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">×</button>
              {{Session::get('failed')}}
            </div>
            @endif</td>
        <tr>
          <td><label for="">Edit???</label><input type="checkbox" name="checkname" id="check" onclick="UpdateCheck()"></td>
          <td><button type="submit" name='update' id='update' class="aa-browse-btn">Update</button></td>
        </tr>
      </tbody>
    </table>
  </form>
	@endforeach
  
</div>
</div>
<style>

.profile img{
  position:relative;
  height:250px; 
  width:250px; 
  float: center+250px;
  left:150px; 
  border-radius:50%;
  padding: 20px;
}
td,th{
  padding: 5px;
}
.profile button{
  font-size: 14px;
  padding: 8px 20px;
  margin-right: 5px;
  margin-top: 10px;
  float: right;
}
table{
  position:relative;
  top:50px;
}
.profile label{
  margin-bottom: 0;
  margin-right: 10px;
  font-weight: normal;
  color: #555;
}
.profile input[type=text]{
  border: 1px solid #ccc;
  color: #555;
  font-size: 14px;
  font-family: "Raleway", sans-serif;
  height: 40px;
  padding: 10px 55px 10px 10px;
  width: 250px;
}
input[type=checkbox]{
  height: 15px;
}
</style>

<script>
function UpdateCheck(){
  var x=document.getElementById('check');
  if(x.checked==true)
  {
    document.getElementById('name').disabled=false;
    document.getElementById('phone').disabled=false;
    document.getElementById('address').disabled=false;
    document.getElementById('district').disabled=false;
    document.getElementById('village').disabled=false;
    document.getElementById('pincode').disabled=false;
    document.getElementById('proimg').disabled=false;
  }
  else
  {
    document.getElementById('name').disabled=true;
    document.getElementById('phone').disabled=true;
    document.getElementById('address').disabled=true;
    document.getElementById('district').disabled=true;
    document.getElementById('village').disabled=true;
    document.getElementById('pincode').disabled=true;
    document.getElementById('proimg').disabled=true;
  }
  
}
</script>


  <!-- jQuery -->
  <script src="Customer/js/jquery.min.js"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="Customer/js/bootstrap.min.js"></script>

  <!-- Metis Menu Plugin JavaScript -->
  <script src="Customer/js/metisMenu.min.js"></script>

  <!-- Morris Charts JavaScript -->
  <script src="Customer/js/raphael.min.js"></script>
  <script src="Customer/js/morris.min.js"></script>
  <script src="Customer/js/morris-data.js"></script>

  <!-- Custom Theme JavaScript -->
  <script src="Customer/js/startmin.js"></script>

  </body>
</html>
