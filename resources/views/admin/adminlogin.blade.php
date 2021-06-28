
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  	<div class="col-md-4 col-md-offset-4" width="80ps">
	      <div class="panel panel-default">
			  <!-- Default panel contents -->
			  <div class="panel-heading">
				  <center><h3>Village Vyapar</h3></center>
				  <center>Admin Login</center>
			  </div>
			  <div class="panel-body" >
				
				<br>
				    <form method="post">
                    @csrf
				            <label>Email-Id :</label>
				            <input type="text" name="email" class="form-control" required>
							
							<br>
				            <label>Password :</label>
				            <input type="password" class="form-control" name="password" required>
							
							<br>
							<button align="center" type="submit" name="btnLogin" class="btn btn-primary">Login</button>	
				    </form>
				<a href="forget-password.php">Forgot Password?</p></a>
			  </div>
			</div>
	</div>
</div>
</form>