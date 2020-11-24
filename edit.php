
<?php
session_start();
error_reporting(0);
if($_SESSION['email']==true){

}else{
	header('location:admin_login.php');
}
define('TITLE', 'Admin:Edit Category');
$page='category';
include('include/header.php');
?>

<?php
include('db/connection.php');
$id=$_GET['edit'];

$query=mysqli_query($conn,"select * from category where id='$id' ");
while ($row=mysqli_fetch_array($query)) {
	$category=$row['category_name'];
	$des=$row['des'];
}

?>

<div style="width: 60%; margin-left: 10%; margin-top: 10%;">
	<form action="edit.php" method="post" name="categoryform" onsubmit="return validateform() ">
		<h1>Update Categories</h1>
		<hr>
		<div class="form-group">
			<?php echo $msg; ?>
			<label for="category">Category :</label>
			<input type="text" name="category" value="<?php echo $category; ?>" class="form-control" id="category">
		</div>
		<div class="form-group">
			<label for="description">Description :</label>
			<textarea name="des" class="form-control" rows="5" id="description"><?php echo $des; ?></textarea>
		</div>
		<input type="hidden" name="id" value="<?php echo $_GET['edit']; ?>">
		<input type="submit" name="submit" class="btn btn-primary" value="Update Category">
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
	$id=$_POST['id'];
	$category=$_POST['category'];
	$des=$_POST['des'];

	$query1=mysqli_query($conn,"update category set category_name='$category',des='$des' where id='$id' ");
	if ($query1) {
		echo "<script> alert('Category Updated Successfully')</script>";
		echo "<script>window.location='http://localhost/news/category.php';</script>";

		}else{
			echo "<script>alert('There was a problem, Please Try Again !')</script>";
		}
	
}

?>

<!--Including admin footer-->
	<?php
	include('include/footer.php');
	?>

