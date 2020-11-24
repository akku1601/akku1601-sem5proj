<?php
include('db/connection.php');

$id=$_GET['del'];
$query=mysqli_query($conn,"delete from positives where id='$id' ");

if ($query) {
	echo "<script> alert('News Successfully Deleted')</script>";	
	echo "<script>window.location='http://localhost/news/positive.php';</script>";
}else{
		echo "<script>alert('Please Try Again, News was not deleted !')</script>";
	}

?>