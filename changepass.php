<?php
session_start();
if($_SESSION['email']==true){

}else{
	header('location:admin_login.php');
}
define('TITLE', 'Admin:Change Password');
include('include/header.php');
?>

<div style="width: 40%; background-color: whitesmoke; margin-bottom: 11%; margin-left: 20%; margin-top: 12%;">

	<form action="changepass.php" method="post" class="border border-primary p-3" name="passform" onsubmit="return validateform() ">
		<h3 class="card-header bg-dark text-center text-light">Change Password<br></h3>
		<div class="form-group">				
			<label for="email"> <br /> <i class="fas fa-user-edit p-1"></i>Username : </label>
			<input type="Username" class="form-control" name="email"  id="email">
	 	</div>
	    <div class="form-group">
	 	    <label for="pwd"> <i class="fas fa-lock p-1"></i>New Password :  </label>
	   		<input type="password" class="form-control" name="password" id="pwd">
		</div>
		<div class="text-center">
	  		<input type="submit" name="submit" class="btn btn-info" value="Change Password">
	    </div>
	</form>
  		

	<script>
		function validateform(){
			var x = document.forms['passform']['email'].value;
			var y = document.forms['passform']['password'].value;
			if (x=="") {
				alert('Enter Username');
				return false;
			}
			if (y=="") {
				alert('Enter new password');
				return false;
			}
		}


	</script>
</div>

<?php
include('db/connection.php');

 if(isset($_POST['submit'])){
 	$email = $_POST['email'];
    $password = $_POST['password'];

    $query=mysqli_query($conn,"update admin_login set password='$password' where name='$email' ");

 	if($query){
 		echo'<div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 50%; height: 50px; margin-left: 30%; padding-left:40px; margin-top: -10%;">
 			<strong>Password has been updated.</strong>
 			<button type="button" class="close" data-dismiss="alert" arial-label="Close">
 			<span aria-hidden="true">&times;</span>
 			</button>
 			</div> ';
 	
	}
	else{
 		echo'<div class="alert alert-danger alert-dismissible fade show" role="alert" style="width: 55%; height: 50px; margin-left: 30%; margin-top: -10%;">
 			<strong>Password not updated.<i>Check if the username is correct or not.</strong>
 			<button type="button" class="close" data-dismiss="alert" arial-label="Close">
 			<span aria-hidden="true">&times;</span>
 			</button>
 			</div> ';
 	}
 }

?>


	<?php
	include('include/footer.php');
	?>

	