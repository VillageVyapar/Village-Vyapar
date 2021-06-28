@include('admin/includes/sidebar_navbar')


<div>
<html> 
<body >
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

@foreach($data as $d)
<form align="center" >
<div class="table-responsive">
<table align="center" border="5px" height="70%" width="50%">
<tr>
<td  align="center" colspan="2"><h2>Admin Profile</h2></td>
<tr>
<tr class="table-info">
<td>Profile photo:</td>
<td ><img src="product_images/{{$d['a_img']}}" style='height:200px;width:220px;'><td>
</tr>
<tr class="table-info">
<td>Name :</td>
<td ><input type="text" name="Name" value="{{$d->a_name}}"><td>
</tr>
<tr class="table-info">
<td>E-mail :</td>
<td><input type="text" name="Name" value="{{$d->a_email }}"><td>
</tr>   
<tr class="table-info">
<td>Password :</td>
<td><input type="text" name="Name" value="{{$d->a_password }}"><td>
</tr>   
<tr class="table-info">
<td>Phone-no:</td>
<td><input type="text" name="Name" value="{{$d->a_phone }}"><td>
</tr>      
@endforeach      
</form>          
    </body>
</html>
</div>