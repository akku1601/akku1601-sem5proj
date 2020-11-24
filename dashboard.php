<?php
session_start();
if($_SESSION['email']==true){

}else{
	header('location:admin_login.php');
}
define('TITLE', 'Admin Dashboard');
$page='dashboard';
include('include/header.php');
include('db/connection.php');

$sql=mysqli_query($conn,"select id from category");
$count=mysqli_num_rows($sql);

$sql=mysqli_query($conn,"select id from post");
$count1=mysqli_num_rows($sql);


$sql=mysqli_query($conn,"select id from positives");
$count2=mysqli_num_rows($sql);

?>

<div class="col-sm-9 md-10">
	<div class="row text-center mx-5 ">

		<div class="col-sm-4" style="padding-top: 18%; font-weight: 600; ">
			<div class="card text-white bg-danger mb-3">
				<div class="card-header">Categories Added</div>
				<div class="card-body">
					<h4 class="card-title">
						<?php echo $count; ?>
					</h4>
					<a href="category.php" class="btn text-white">View</a>
				</div>
			</div>
		</div>
	

		<div class="col-sm-4" style="padding-top: 18%; font-weight: 600; ">
			<div class="card text-white bg-info mb-3">
				<div class="card-header">Uploaded Posts</div>
				<div class="card-body">
					<h4 class="card-title">
						<?php echo $count1; ?>
					</h4>
					<a href="post.php" class="btn text-white">View</a>
				</div>
			</div>
		</div>


		<div class="col-sm-4" style="padding-top: 18%; font-weight: 600; ">
			<div class="card text-white bg-warning mb-3" >
				<div class="card-header">Uploaded Positive News</div>
				<div class="card-body">
					<h4 class="card-title">
						<?php echo $count2; ?>
					</h4>
					<a href="positive.php" class="btn text-white">View</a>
				</div>
			</div>
		</div>
	
</div>
<br><br>

<div class="container-fluid ml-5">
<table class="table table-striped">
		<h3 class="text-center bg-secondary text-light p-3">List Of Admin's</h3>
	<tr>
		<th>Admin Id</th>
		<th>Name</th>
		<th>Email Id</th>
	</tr>

	<?php
		include('db/connection.php');
		$query=mysqli_query($conn,"select * from admin_login");
		while ($row=mysqli_fetch_array($query)) {
		
		?>
		<tr>
			<td><?php echo $row['id'];?></td>
			<td><?php echo $row['name'];?></td>
			<td><?php echo $row['email'] ;?></td>
		</tr>

	<?php } ?>

</table>
</div>

</div>


<?php
	include('include/footer.php');
?>


