<script>
	function delFeedback(id)
	{
		if(confirm("You want to delete this Feedback ?"))
		{
		window.location.href='delete_feedback.php?id='+id;	
		}
	}
</script>
<table class="table table-striped table-hover table-responsive">
	<h1>Feedback</h1><hr>
	<tr>
		<th>Serial Number</th>
		<th>Name</th>
		<th>Email</th>
		<th>Mobile</th>
		<th>Message</th>
		<th>Delete</th>
	</tr>
<?php 
$i=1;
$sql=mysqli_query($con,"SELECT * FROM feedback");
while($res=mysqli_fetch_assoc($sql))
{
$id=$res['id'];	
$name=$res['name'];
$email=$res['email'];
$mobile	=$res['mobile'];
$message=$res['message'];
?>
<tr>
		<td><?php echo $i;$i++; ?></td>
		<td><?php echo $res['name']; ?></td>
		<td><?php echo $res['email']; ?></td>
		<td><?php echo $res['mobile']; ?></td>
		<td><?php echo $res['message']; ?></td>
		<td>
            <a href="#"onclick="delFeedback('<?php echo $id; ?>')">
                <i class="fa fa-trash-o"></i>
            </a>
        </td>
	</tr>	
<?php 	
}
?>	
	
</table>