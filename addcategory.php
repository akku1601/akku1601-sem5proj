
<?php
session_start();
if($_SESSION['email']==true){

}else{
	header('location:admin_login.php');
}
define('TITLE', 'Admin:Add Category');
$page='addcategory';
include('include/header.php');
?>

<div style="width: 60%; margin-left: 10%; margin-top: 10%;">
	<form action="addcategory.php" method="post" name="categoryform" onsubmit="return validateform() ">
		<h1>Add Category</h1>
		<hr>
		<div class="form-group h5">
			<label for="category">Category :</label>
			<input type="text" name="category" class="form-control" id="category">
		</div>
		<div class="form-group h5">
			<label for="description">Description :</label>
			<textarea name="des" class="form-control" rows="5" id="description"></textarea>
		</div>
		<input type="submit" name="submit" class="btn btn-primary" value="Add Category">
	</form>

	<script>
		function validateform(){
			var x = document.forms['categoryform']['category'].value;
			if (x=="") {
				alert('Category Must Be Filled Out !');
				return false;
			}
		}
		
	</script>
</div>


	<?php
	include('db/connection.php');
	
	if (isset($_POST['submit'])) {
		$category_name=$_POST['category'];
		$des=$_POST['des'];

		$cheak=mysqli_query($conn,"select * from category where category_name='$category_name' ");
		if (mysqli_num_rows($cheak)>0) {
			echo "<script> alert('Category Name Already Exists !')</script>";
			exit();

		}

		$query=mysqli_query($conn,"insert into category(category_name,des) values('$category_name','$des')");

		if($query){
			echo "<script> alert('Category Added Successfully')</script>";
		}else{
			echo "<script>alert('Please Try Again')</script>";
		}
	
	}

	?>

	<!--Including admin footer-->
	<?php
	include('include/footer.php');
	?>

