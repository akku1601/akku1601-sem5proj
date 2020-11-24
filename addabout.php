<?php
session_start();
if($_SESSION['email']==true){

}else{
	header('location:admin_login.php');
}
define('TITLE', 'Admin:About Page');
include('include/header.php');
?>

<?php
include('db/connection.php');
$query=mysqli_query($conn,"select * from about");
while ($row=mysqli_fetch_array($query)) {
    $title=$row['title'];
    $subtitle=$row['subtitle'];
    $description=$row['description'];
    $caption1=$row['cap1'];
    $description1=$row['des1'];
    $caption2=$row['cap2'];
    $description2=$row['des2'];

}
?>



<div style="width: 60%; margin-left: 10%; margin-top: 10%;">
<form action="addabout.php" method="post" name="aboutform" onsubmit="return validateform()">
	<h1>About Us Page</h1>
	<hr>
<!--About the website -->
	<div class="form-group">
	    <label for="title">Title :</label>
	    <input type="text" name="title" value="<?php echo $title; ?>" class="form-control" id="title" placeholder="Enter Title">
	</div>

    <div class="form-group">
	    <label for="sub">Sub Title :</label>
	    <input type="text" name="subtitle" value="<?php echo $subtitle; ?>" class="form-control" id="sub" placeholder="Enter Sub-Title">
    </div>
    <br>

    <div class="form-group">
	    <label for="description">Description :</label>
	    <textarea name="description" class="form-control" rows="5" id="description"><?php echo $description; ?></textarea> 
    </div>
	<hr>

<!--Side Info-1 -->
	<div class="form-group">
	    <label for="cap1">Caption1 :</label>
	    <input type="text" name="cap1" value="<?php echo $caption1; ?>" class="form-control" id="cap1">
	</div>
	<br>

	<div class="form-group">
	    <label for="des1">Explain :</label>
	    <textarea name="des1" class="form-control" rows="3" id="des1" ><?php echo $description1; ?></textarea>
	</div>
	<hr>

<!--Side Info-2 -->
	<div class="form-group">
	    <label for="cap2">Caption2 :</label>
	     <input type="text" name="cap2" value="<?php echo $caption2; ?>" class="form-control" id="cap2">
	</div>
	<br>

	<div class="form-group">
	    <label for="des2">Explain :</label>
	   <textarea name="des2" class="form-control" rows="3" id="des2" ><?php echo $description2; ?></textarea>
	</div>

	<input type="submit" name="save" class="btn btn-primary" value="Edit & Save">
	<br><br>

 </form>

 <script>
		function validateform(){
			var x = document.forms['aboutform']['title'].value;
			var y = document.forms['aboutform']['description'].value;
			if (x=="") {
				alert('Complete Page Must Be Filled OUT !');
				return false;
			}
			if (y=="") {
				alert('Complete Page Must Be Filled OUT !');
				return false;
			}
		}
		
	</script>
</div>




	<?php
	include('db/connection.php');
	
	if (isset($_POST['save'])) {
		$title=$_POST['title'];
		$subtitle=$_POST['subtitle'];
		$description=$_POST['description'];
		$caption1=$_POST['cap1'];
		$description1=$_POST['des1'];
		$caption2=$_POST['cap2'];
		$description2=$_POST['des2'];


		$query=mysqli_query($conn,"update about set title='$title', subtitle='$subtitle', description=
			'$description', cap1='$caption1', des1='$description1', cap2='$caption2', des2='$description2'  ");

		if($query){
			echo "<script> alert('Page Successfully uploaded')</script>";
		}else{
			echo "<script>alert('Please Try Again')</script>";
		}
	
	
	}

	?>

	<!--Including admin footer-->
	<?php
	include('include/footer.php');
	?>

