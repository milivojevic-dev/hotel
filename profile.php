<?php
session_start();
error_reporting(1);
include('db_config.php');
$eid = $_SESSION['create_account_logged_in'];
extract($_REQUEST);
if (isset($update)) {
    $que = "UPDATE create_account SET name='$name',password='$password',mobile='$mobile',address='$address' WHERE email='$email_id'";
    mysqli_query($con, $que);
    $msg = "<h3>Profile Updated successfully</h3>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Online Hotel.com</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai" rel="stylesheet">
</head>
<body style="margin-top:50px;">
<?php
include('menu-bar.php');
?>
<?php
$sql = mysqli_query($con, "SELECT * FROM create_account WHERE email='$id' ");
$result = mysqli_fetch_assoc($sql);
?>

<section class="user-profile">
    <div class="container">
        <h1>User Profile</h1>
        <div class="container">
            <div class="row">
                <div class="col-sm-10">
                    <?php echo $msg; ?>
                    <form class="form-horizontal" method="post">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="control-label col-sm-4"><h4> Name :</h4></div>
                                        <div class="col-sm-8">
                                            <input type="text" name="name" value="<?php echo $result['name']; ?>"
                                                   class="form-control"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="control-label col-sm-4"><h4>Email-Id:</h4></div>
                                        <div class="col-sm-8">
                                            <input type="text" value="<?php echo $result['email']; ?>" class="form-control"/readonly="readonly">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="control-label col-sm-4"><h4>Password:</h4></div>
                                        <div class="col-sm-8">
                                            <input type="text" name="password" value="<?php echo $result['password']; ?>"
                                                   class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="control-label col-sm-4"><h4>Mobile:</h4></div>
                                        <div class="col-sm-8">
                                            <input type="text" name="mobile" value="<?php echo $result['mobile']; ?>"
                                                   class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="control-label col-sm-4"><h4>Address:</h4></div>
                                        <div class="col-sm-8">
                                            <input type="text" name="address" value="<?php echo $result['address']; ?>"
                                                   class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="control-label col-sm-4"><h4>Gender:</h4></div>
                                        <div class="col-sm-7">
                                            <input type="radio" name="gender" value="male"><b>Male</b>
                                            <input type="radio" name="gender" value="male"><b>Female</b>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <div class="control-label col-sm-5"></div>
                                        <div class="col-sm-7">
                                            <input type="submit" value="Update Profile" name="update" class="btn read-more-button"/>
                                        </div>
                                    </div>
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
</body>
</html>
