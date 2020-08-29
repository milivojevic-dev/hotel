<?php 
$i=1;
$sql=mysqli_query($con,"SELECT * FROM admin");
while($res=mysqli_fetch_assoc($sql))
{
?>
<h1>Admin Profile</h1>
  <form class="admin-information" action="/action_page.php">
    <div class="form-group">
      <label for="email">Name:</label>
       <input type="text" id="username" value="<?php echo $res['username']; ?>" class="form-control" name="name" readonly="readonly"/>
    </div>
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="<?php echo $res['password']; ?>">
    </div>
  </form>
<?php
}
?>
