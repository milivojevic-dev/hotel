<?php 
include('../db_config.php');

$id=$_GET['id'];

$sql=mysqli_query($con,"SELECT * FROM rooms WHERE room_id='$id' ");
$res=mysqli_fetch_assoc($sql);

$img=$res['image'];

unlink("../image/rooms/$img");

if(mysqli_query($con,"DELETE FROM rooms WHERE id='$id' "))
{
header('location:dashboard.php?option=rooms');	
}

?>