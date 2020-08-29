<?php 
include('../db_config.php');

$id=$_GET['id'];

$sql=mysqli_query($con,"SELECT * FROM feedback WHERE id='$id'");
$res=mysqli_fetch_assoc($sql);
if(mysqli_query($con,"DELETE FROM feedback WHERE id='$id'"))
{
header('location:dashboard.php?option=feedback');	
}

?>