<?php
include('db/connection.php');
$id=$_GET['del'];
$query=mysqli_query($conn,"delete from category where id='$id' ");
if($query){
	echo "<script> alert('Category Successfully Deleted')</script>";
	echo "<script>window.location='http://localhost/news/category.php';</script>";
	}else{
			echo "<script>alert('Please Try Again, Category was not deleted !')</script>";
		}
?>