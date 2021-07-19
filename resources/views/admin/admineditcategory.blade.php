
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
	@foreach($data as $d)
<table>
	<title>Edit Category</title>
<tr>
	   <td><lable>Category Name</label></td>
	   <td><input type text="Cat_name" id ="cat_name"value="{{$d['cat_name']}}"><td>
</tr>
<tr>
		<td><lable>Category Image</label></td>
	    <td><input type="file"  id ="cat_img"name="cat_img" value="{{$d['cat_img']}}"><td>
</tr>
<tr>
		
	   <td><a href="edit_category"> <input type="button"  name="submit" value="submit""></a><td>
</tr>
	@endforeach
</table>
		</head>
<body>
	
</body>
</html>