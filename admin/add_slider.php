<?php 

if(isset($update))
{
    $img_new=$_FILES['img']['name'];
	
	$sql="INSERT INTO slider VALUES('','$img_new','$cap')";
	
	if(mysqli_query($con,$sql))
	{
	move_uploaded_file($_FILES['img']['tmp_name'],"../image/Slider/".$_FILES['img']['name']);	
	header('location:dashboard.php?option=slider');	
	}
	
}
?>
<section class="slider-section">
    <form method="post" enctype="multipart/form-data">
        <table class="table table-bordered table-responsive">
            <tr>
                <th>Caption</th>
                <td><input type="text" name="cap" class="form-control"/></td>
            </tr>
            <tr>
                <th>Image</th>
                <td><input type="file" name="img" accept="image/*" class="form-control"/>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" class="btn read-more-button" value="Add new Slider" name="update"/>
                </td>
            </tr>
        </table>
    </form>
</section>