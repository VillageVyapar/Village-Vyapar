
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  	<div class="col-md-4 col-md-offset-4" width="30ps">
	      <div class="panel panel-default">
			  <!-- Default panel contents -->
			  <div class="panel-heading">
				  <center><h3>Edit Category</h3></center>
				 
			  </div>
			  <div class="panel-body" >
				
				<br>
						@foreach($results as $c)
				    <form method="post">
                    @csrf
					
				            <label>CATGORY NAME</label>
				            <input type="text" name="cat_name" value="{{$c['cat_name']}}"  class="form-control" required>
							
							<br>
				            <label>CATEGORY IMAGE</label>
				            <input type="file"  class="form-control" name="cat_img" required>
							
							<br>
							<button align="center" type="submit" href="{{$c[edit_category}}" name="btnLogin" class="btn btn-primary">SUBMIT</button>	
				    </form>
					@endforeach
			  </div>
			</div>
	</div>
</div>
</form>
