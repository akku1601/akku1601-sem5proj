
<?php
session_start();
if($_SESSION['email']==true){

}else{
	header('location:Admin:admin_login.php');
}
define('TITLE', 'Post Edit');
include('include/header.php');
?>

<?php
include('db/connection.php');
$id=$_GET['edit'];
$query=mysqli_query($conn,"select * from post where id='$id' ");
while ($row=mysqli_fetch_array($query)) {
	$title=$row['title'];
	$description=$row['description'];
	$date=$row['date'];
	$thumbnail=$row['thumbnail'];
	$category=$row['category'];

}
?>

<!--ck editor cdn-->
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>

<div style="width: 70%; margin-left: 8%; margin-top: 10%;">
	<div style="margin-left:-11%; margin-top: -4.5%">
		<ul class="breadcrumb">
			<li class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></li>
			<li class="breadcrumb-item active"><a href="post.php">Post</a></li>
			<li class="breadcrumb-item active">Update Post</li>
		</ul>
	
	</div>

	<form action="post_edit.php" method="post" enctype="multipart/form-data" name="postform" onsubmit="return validateform()">
		<h1>Update Post</h1>
		<hr>
		<div class="form-group h5">
			<label for="title">Title :</label>
			<input type="text" name="title" value="<?php echo $title; ?>" placeholder="Add Title" class="form-control" id="title">
		</div>

		<div class="form-group h5">
			<label for="description">Description :</label>
			<textarea name="description" placeholder="Title Description" class="form-control" rows="5" id="description"><?php echo $description; ?></textarea>
			<!--editing textarea-->
			<script>
                CKEDITOR.replace( 'description' );
            </script>
		</div>

		<div class="form-group h5">
			<label for="date">Date :</label>
			<input type="date" name="date" value="<?php echo $date; ?>" class="form-control" id="date">
		</div>

		<div class="form-group h5">
			<label for="photo">Photo :</label>
			<input type="file" name="thumbnail" value="<?php echo $thumbnail; ?>" class="form-control img-thumbnail" id="photo">
			<img src="images/<?php echo $thumbnail; ?>" class="img img-thumbnail" width="150">
		</div>

		<input type="hidden" name="id" value="<?php echo $_GET['edit']?>">
		
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


		<input type="submit" name="submit" class="w-25 btn btn-primary" value="Update Post">
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
		$id=$_POST['id'];
		$title=$_POST['title'];
		$description=$_POST['description'];
		$date=$_POST['date'];
		$thumbnail=$_FILES['thumbnail']['name'];
		$tmp_thumbnail=$_FILES['thumbnail']['tmp_name'];
		$category=$_POST['category'];

		move_uploaded_file($tmp_thumbnail, "images/$thumbnail");

		$sql=mysqli_query($conn,"update post set title='$title',description='$description',date='$date',category='$category',
			thumbnail='$thumbnail' where id='$id' ");
		if ($sql) {
			echo "<script> alert('Post Successfully Updated')</script>";
			echo "<script>window.location='http://localhost/news/post.php';</script>";

		}else{
			echo "<script> alert('Please Try Again !')</script>";
		}
	}


	?>

	<!--Including admin footer-->
	<?php
	include('include/footer.php');
	?>



	