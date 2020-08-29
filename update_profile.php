<?php
session_start();
include('db_config.php');
error_reporting(1);
$eid = $_SESSION['create_account_logged_in'];
?>
<?php
$i = 1;
$sql = mysqli_query($con, "SELECT * FROM create_account WHERE email='$eid'");
$result = mysqli_fetch_assoc($sql);

extract($_REQUEST);
if (isset($update)) {
    mysqli_query($con, "UPDATE create_account SET name='$fname',email='$email',password='$password',mobile='$mobi',address='$addr',gender='$gend',country='$countr'where email='$eid'");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Online Hotel.Com</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai" rel="stylesheet">
</head>
<body>
<?php
include('menu-bar.php');
?>
<section class="user-profile">
    <div class="container">
        <div class="container">
            <h1><b>Update Account?</b></h1>
            <div class="row justify-content-center">
                <div class="col-sm-6 ">
                    <form class="form-horizontal" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="control-label col-sm-5"><h4>Name :</h4></div>
                            <div class="col-sm-7">
                                <input type="text" name="fname" value="<?php echo $result['name']; ?>"
                                       class="form-control"
                                       placeholder="Enter Your Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="control-label col-sm-5"><h4>Email-Id:</h4></div>
                            <div class="col-sm-7">
                                <input type="text" name="email" class="form-control" placeholder="Enter Your Email-id">
                                <h4>Current email id must be required *</h4>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="control-label col-sm-5"><h4>Password :</h4></div>
                            <div class="col-sm-7">
                                <input type="password" name="password" value="<?php echo $result['password']; ?>"
                                       class="form-control" placeholder="Enter Your Password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="control-label col-sm-5"><h4>Mobile Number:</h4></div>
                            <div class="col-sm-7">
                                <input type="text" name="mobile" value="<?php echo $result['mobile']; ?>"
                                       class="form-control"
                                       placeholder="Enter Your Mobile Number">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="control-label col-sm-5"><h4>Address :</h4></div>
                            <div class="col-sm-7">
                                <textarea name="address"
                                          class="form-control"><?php echo $result['address']; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="control-label col-sm-5"><h4 id="top">Gender :</h4></div>
                            <div class="col-sm-7">
                                <input type="radio" name="gender" value="male"><b>Male</b>&emsp;
                                <input type="radio" name="gender" value="male"><b>Female</b>&emsp;
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="control-label col-sm-5"><h4>Country :</h4></div>
                            <div class="col-sm-7">
                                <select name="country" value="<?php echo $result['country']; ?>" class="form-control">
                                    <option>India</option>
                                    <option>Pakistan</option>
                                    <option>China</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="control-label col-sm-5"><h4 id="top">profile pic :</h4></div>
                            <div class="col-sm-7">
                                <input type="file" name="pict" accept="image/*">
                            </div>
                            <div class="row">
                                <div class="col-sm-6" style="text-align:right;"><br>
                                    <input type="submit" value="Update Profile" name="update"
                                           class="btn read-more-button"/>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include('footer.php')
?>
</body>
</html>
