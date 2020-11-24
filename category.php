<?php
session_start();
if($_SESSION['email']==true){

}else{
	header('location:admin_login.php');
}
define('TITLE', 'Admin:Existing Category');
$page='category';
include('include/header.php');
?>

<div style="width: 60%; margin-left: 10%; margin-top: 10%;">
	
	<table class="table table-bordered">
		<tr>
			<th>Id</th>
			<th>Category Name</th>
			<th>Description</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php
		include('db/connection.php');
		$query=mysqli_query($conn,"select * from category");
		while ($row=mysqli_fetch_array($query)) {
		
		?>
		<tr>
			<td><?php echo $row['id'];?></td>
			<td><?php echo $row['category_name'];?></td>
			<td><?php echo substr($row['des'],0,200);?></td>
			<td><a href="edit.php?edit=<?php echo $row['id']; ?>" ><i class="fas fa-pen" style="font-size: 20px; color: blue;"></i></a></td> 
			<td><a href="delete.php?del=<?php echo $row['id']; ?>" ><i class="fas fa-trash" style="font-size: 20px; color: red;" ></i></a></td>
		</tr>
	<?php } ?>
	</table>



</div>

<?php
	include('include/footer.php');
?>