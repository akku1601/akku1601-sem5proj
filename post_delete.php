<?php
include('db/connection.php');

$id=$_GET['del'];
$query=mysqli_query($conn,"delete from post where id='$id' ");

if ($query) {
	echo "<script> alert('Post Successfully Deleted')</script>";
	echo "<script>window.location='http://localhost/news/post.php';</script>";

	}else{
		echo "<script>alert('Please Try Again, Post was not deleted !')</script>";
	}

?>