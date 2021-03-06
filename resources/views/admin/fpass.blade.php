<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<style>
body{
	background-image: url("adminbg.jpg");
	background-repeat:inherit;
	width:100%;
	margin:0px;
	padding:0px;
}
.panel-body{
	background:transparent;
	/* opacity: 10%; */
}

.panel{
	margin-left: auto;
	margin-right:auto;
	margin-top: 25%;
	justify-content:center;
}
</style>
</head>
<body>
  	<div class="col-md-4 main-panel col-md-offset-4" width="80ps">
	    <div class="panel panel-default">
		  <!-- <div style="background-image: url('Admin_img\adminbg.jpg');"> 		   -->
			  <!-- Default panel contents -->
			<div class="panel-heading">
				  <center><h3>Village Vyapar</h3></center>
				  <center>Admin Login</center>
			</div>
			<div class="panel-body" style="background:transparent;">
				<br>
				<div id="forgot">
					<form action="send-mail"  method="post" class="aa-login-form">
						{{ @csrf_field() }}
						<br><br>
						<label for="">Email address :</label>
						<input type="email" name='email' required placeholder="Enter Email Id" class="form-control">
						<?php
						if(Session::has('wrongEmail')){
							echo "<p>User not registared. Register first.</p>";
							Session::forget("wrongEmail");
						}
                        ?>
						<br>
						<button align="center" type="submit" class="btn btn-primary">Submit</button><br><br><br><br> 
					</form>
            	</div>
			  </div>
			  
			</div>	
		</div>
	</div>
</div>
</body>
</html>