
<?php
session_start();
if($_SESSION['email']==true){

}else{
	header('location:admin_login.php');
}
define('TITLE', 'Admin:Add Post');
$page='addpost';
include('include/header.php');
?>

<!--ck editor cdn-->
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>

<div style="width: 70%; margin-left: 8%; margin-top: 10%;">
	<div style="margin-left:-11%; margin-top: -4.5%">
		<ul class="breadcrumb">
			<li class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></li>
			<li class="breadcrumb-item active"><a href="post.php">Post</a></li>
			<li class="breadcrumb-item active">Add Post</li>
		</ul>
	
	</div>

	<form action="addpost.php" method="post" enctype="multipart/form-data" name="postform" onsubmit="return validateform()">
		<h1>Add Post</h1>
		<hr>
		<div class="form-group h5">
			<label for="title">Title :</label>
			<input type="text" name="title" placeholder="Add Title" class="form-control" id="title">
		</div>

		<div class="form-group h5">
			<label for="description">Description :</label>
			<textarea name="description" placeholder="Title Description" class="form-control" rows="5"  id="description"></textarea>
			<!--editing textarea-->
			<script>
                CKEDITOR.replace( 'description' );
            </script>
		</div>

		<div class="form-group h5">
			<label for="date">Date :</label>
			<input type="date" name="date" class="form-control" id="date">
		</div>

		<div class="form-group h5">
			<label for="photo">Photo :</label>
			<input type="file" name="thumbnail" class="form-control img-thumbnail" id="photo">
		</div>

		<div class="form-group h5">
			<label for="category">Select Category :</label>
			<select class="form-control" name="category" id="category">
			<?php
			include ('db/connection.php');
				$query=mysqli_query($conn,"select * from category");
			while ($row=mysqli_fetch_array($query)) {
				?>

				<option value="<?php echo $row['category_name'];?>"><?php echo $row['category_name'];?></option>
			<?php } ?>

			</select>
		</div>

		<div class="form-group h5">
			<label for="admin">Admin</label>
			<input type="text" class="form-control" disabled value="<?php echo $_SESSION['email']; ?>" >
		</div>

			<input type="submit" name="submit" class="w-25 btn btn-primary" value="Upload Post">
			<br>
			<br>
	</form>

	<script>
		function validateform(){
			var x = document.forms['postform']['title'].value;
			var y = document.forms['postform']['description'].value;
			var z = document.forms['postform']['date'].value;
			if (x=="") {
				alert('Title Must Be Filled Out !');
				return false;
			}
			if (y=="") {
				alert('Description Must Be Filled Out !');
				return false;
			}
			if (y.length<100) {
				alert('Description Must Be Atleast 100 Characters !');
				return false;
			}
			
		}

	</script>
</div>

	<?php
	include('db/connection.php');

	if (isset($_POST['submit'])) {

		$title=$_POST['title'];
		$description=$_POST['description'];
		$date=$_POST['date'];
		$thumbnail=$_FILES['thumbnail']['name'];
		$tmp_thumbnail=$_FILES['thumbnail']['tmp_name'];
		$category=$_POST['category'];
		$admin=$_SESSION['email'];

		move_uploaded_file($tmp_thumbnail, "images/$thumbnail");

		$query1=mysqli_query($conn,"insert into post(title,description,date,category,thumbnail,admin) values('$title',
			'$description','$date','$category','$thumbnail','$admin') ");

		if ($query1) {
			echo "<script> alert('Post Added Successfully')</script>";
		}else{
			echo "<script>alert('There was a problem, Please Try Again')</script>";
		}
		
	}


	?>

	<!--Including admin footer-->
	<?php
	include('include/footer.php');
	?>



	