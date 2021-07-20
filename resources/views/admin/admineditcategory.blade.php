<!DOCTYPE html>
<html lang="en">
<head  action="edit_category">

<style>
th, td {
  padding: 15px;
}
</style>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" >
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<form action="/edit_category" method="post" enctype="multipart/form-data">
@csrf
	@foreach($data as $d)
<table>
	<title>Edit Category</title>
<tr>
	   	<input type="hidden" name="id" value="{{$d['cat_id']}}">
		<td><lable>Category Name</label></td>
	   	<td><input type="text" name="cat_name" value="{{$d['cat_name']}}"><td>
</tr>
<tr>
		<td><lable>Category Image</label></td>
	    <td>
			<input type="file" name="cat_img" id="" value="{{$d['cat_img']}}">
		</td>
</tr>
<tr>
		
	   <td><button type="submit">Update</button><td>
</tr>
	@endforeach
</table>
</form>
</body>
</html>