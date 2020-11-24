<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	<!-- external css link-->
<link rel="stylesheet" type="text/css" href="style/login.css">
</head>

<body>
	<div class="d-flex justify-content-center container">
		<form class="border border-primary p-3" action="admin_login.php" method="post">
		<img src="images/logo.JPG" class="logo">
		<h3 class="card-header bg-dark text-center">Admin Login<br></h3>
		<div class="form-group">				
			<label for="email"> <br /> <i class="fas fa-user-circle"></i> Username : </label>
			<input type="Username" class="form-control" name="email" placeholder="Enter username" id="email">
	 	</div>
	    <div class="form-group">
	 	    <label for="pwd"> <i class="fas fa-key"></i> Password :  </label>
	   		<input type="password" class="form-control" name="password"  placeholder="Enter password" id="pwd">
		</div>
		<div class="text-center">
	  		<input type="submit" name="submit" class="btn btn-primary" value="Login">
	    </div>
	  	</form>
  		
	</div>
  

		
</body>
</html>

<?php 
 include('db/connection.php');
 if(isset($_POST['submit'])){
 	$email = $_POST['email'];
    $password = $_POST['password'];

    $query=mysqli_query($conn,"select * from admin_login where name='$email' AND password='$password' ");

 	if($query){
 		if(mysqli_num_rows($query)>0) {
 			$_SESSION['email']=$email;

 			header('location:dashboard.php');
 		}else{
 			echo "<script> alert('Invalid Credentials,Please Try Again')</script> ";
 		}
 	}

	 	
 }

?>