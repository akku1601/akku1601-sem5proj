<?php
session_start();
error_reporting(0);
if($_SESSION['email']==true){

}else{
	header('location:admin_login.php');
}
define('TITLE', 'Admin:Uploaded Posts');
$page='post';
include('include/header.php');
?>

<div style="width: 65%; margin-left: 3%; margin-top: 10%;">
	<div style="width: 1000px; margin-left:-4%; margin-top: -5%">
	<ul class="breadcrumb">
			<li class="breadcrumb-item active"><a href="dashboard.php">Dashboard</a></li>
			<li class="breadcrumb-item active">Post</li>
		</ul>
	</div>
	
	<table class="table table-bordered">
		<tr>
			<th>Id</th>
			<th>Title</th>
			<th>Description</th>
			<th>Date</th>
			<th>Category</th>
			<th>Thumbnail</th>
			<th>Admin</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php
		include('db/connection.php');

		if (isset($_GET['page'])) {
			$page=$_GET['page'];
		}
		else{
			$page=1;
		}

		$num_per_page=3;
		$start_from=($page-1)*3;

		$query=mysqli_query($conn,"select * from post limit $start_from,$num_per_page");
		while ($row=mysqli_fetch_array($query)) {
			
		?>
		<tr>
			<td><?php echo $row['id'];?></td>
			<td><?php echo $row['title'];?></td>
			<td ><?php echo substr($row['description'],0,100);?></td>
			<td><?php echo date("F jS ,y", strtotime($row['date']));?></td>
			<td><?php echo $row['category'];?></td>
			<td><img src="images/<?php echo $row['thumbnail'];?>" width="110" height="110"></td>
			<td><?php echo $row['admin'];?></td>
			<td><a href="post_edit.php?edit=<?php echo $row['id'];?>"><i class="fas fa-pen pr-4" style="font-size: 20px; color: blue; "></i></a></td>
			<td><a href="post_delete.php?del=<?php echo $row['id'];?>"><i class="fas fa-trash" style="font-size: 20px; color: red;"></i></a></td>
		</tr>
	<?php } ?>
		</table>

		<?php
		
        $sql=mysqli_query($conn,"select * from post");
        $count=mysqli_num_rows($sql);
        $a=ceil($count/$num_per_page);

         if ($page>1) {
        	echo "<a href='post.php?page=".($page-1)." ' class='btn btn-dark'>Previous</a>";
        }
      
         for ($b=1; $b<$a ; $b++) {
         	echo "<a href='post.php?page=".$b." ' class='btn  btn-info'>$b</a>";
         }

         if ($b>$page) {
        	echo "<a href='post.php?page=".($page+1)." 'class='btn btn-dark'>Next</a>";
        }

		?>
<br><br>
</div>


<?php
	include('include/footer.php');
?>