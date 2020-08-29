<script>
	function delSlider(id)
	{
		if(confirm("You want to delete this Slider ?"))
		{
		window.location.href='delete_slider.php?id='+id;	
		}
	}
</script>
<section class="slider-section">
    <table class="table table-responsive table-bordered table-striped table-hover">
        <h1>Slider</h1>
        <hr>
        <tr>
            <td colspan="5"><a href="dashboard.php?option=add_slider" class="btn read-more-button">Add New</a></td>
        </tr>
        <tr>
        <th>Serial Number</th>
        <th>Image</th>
        <th>Caption</th>
        <th>Update</th>
        <th>Delete</th>
        </tr>
        <?php
        $i=1;
        $sql=mysqli_query($con,"SELECT * FROM slider");
        while($res=mysqli_fetch_assoc($sql))
        {
            $id=$res['slider_id'];
            $img=$res['image'];
            $path="../image/Slider/$img";
            ?>
            <tr>
                <td><?php echo $i;$i++; ?></td>
                <td><img class="slider-image-wrapper" src="<?php echo $path;?>"/></td>
                <td><?php echo $res['caption']; ?></td>
                <td>
                    <a href="dashboard.php?option=update_slider&id=<?php echo $id; ?>">
                        <i class="fa fa-pencil-square-o"></i>
                    </a>
                </td>
                <td>
                    <a href="#" onclick="delSlider('<?php echo $id; ?>')">
                        <i class="fa fa-trash-o"></i>
                    </a>
                </td>
            </tr>
            <?php
        }
        ?>

    </table>
</section>
