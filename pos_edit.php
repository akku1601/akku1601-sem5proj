
<?php
session_start();
if($_SESSION['email']==true){

}else{
	header('location:Admin:admin_login.php');
}
define('TITLE', 'Edit Positive News');
include('include/header.php');
?>

<?php
include('db/connection.php');
$id=$_GET['edit'];
$query=mysqli_query($conn,"select * from positives where id='$id' ");
while ($row=mysqli_fetch_array($query)) {
	$title=$row['title'];
	$description=$row['description'];
	$date=$row['date'];
	$thumbnail=$row['image'];
	
}
?>

<!--ck editor cdn-->
<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>

<div style="width: 70%; margin-left: 8%; margin-top: 10%;">
	<div style="margin-left:-11%; margin-top: -4.5%">
		<ul class="breadcrumb">
			<li class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></li>
			<li class="breadcrumb-item active"><a href="positive.php">Positive Section</a></li>
			<li class="breadcrumb-item active">Update News</li>
		</ul>
	
	</div>

	<form action="pos_edit.php" method="post" enctype="multipart/form-data" name="posform" onsubmit="return validateform()">
		<h1>Update News</h1>
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


		<input type="submit" name="submit" class="w-25 btn btn-primary" value="Update News">
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

		move_uploaded_file($tmp_thumbnail, "images/$thumbnail");

		$sql=mysqli_query($conn,"update positives set title='$title',description='$description',date='$date',
			image='$thumbnail' where id='$id' ");
		if ($sql) {
			echo "<script> alert('News updated successfully')</script>";
			echo "<script>window.location='http://localhost/news/positive.php';</script>";
		}else{
			echo "<script> alert('News not added, Please try again !')</script>";
		}
	}


	?>

	<!--Including admin footer-->
	<?php
	include('include/footer.php');
	?>



	