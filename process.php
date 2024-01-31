<?php
include_once("connection.php");
$con=connection();

if(isset($_POST['add'])){
	$task =$_POST['task'];
	$sql= "INSERT  INTO `task_tbl`(`task`) VALUES ('$task')";
	$con->query($sql)or die ($con->error);
	header("location:homepage.php");
}
?>