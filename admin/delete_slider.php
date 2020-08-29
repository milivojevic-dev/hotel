<?php 
include('../db_config.php');

$id=$_GET['id'];
$sql=mysqli_query($con,"SELECT * FROM slider WHERE id='$id' ");
$res=mysqli_fetch_assoc($sql);
$img=$res['image'];
unlink("../image/Slider/$img");

if(mysqli_query($con,"DELETE FROM slider WHERE id='$id' "))
{
header('location:dashboard.php?option=slider');	
}

?>