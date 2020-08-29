<?php
session_start();
error_reporting(1);
if ($_SESSION['create_account_logged_in'] != "") {
    header('location:booking-form.php');
}
error_reporting(1);
require('db_config.php');
extract($_REQUEST);
if (isset($login)) {
    if ($eid == "" || $password == "") {
        $error = "<h4>fill all details</h4>";
    } else {
        $sql = mysqli_query($con, "SELECT * FROM create_account WHERE email='$eid' && password='$password' ");
        if (mysqli_num_rows($sql)) {
            $_SESSION['create_account_logged_in'] = $eid;
            header('location:booking-form.php');
        } else {
            $error = "<h4>Invalid login details</h4>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Online Hotel.Com</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Book free, without any prepayment. Pay at the Hotel. Find the best Price now! Book Free, without any prepayment, pay at Hotel. Lowest Price Guarantee! Easy and Secure payment.">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Akronim|Libre+Baskerville" rel="stylesheet">
</head>
<body>
<?php
include('menu-bar.php')
?>
<section class="login-section">
    <div class="container">
        <div class="row"><br>
            <div class="col-sm-4"></div>
            <div class="col-sm-4 text-center">
                <h1>
                    <b>User Login ?</b>
                </h1>
                <?php echo $error; ?>
                <form method="post">
                    <div class="form-group">
                        <input type="Email" class="form-control" name="eid" placeholder="Email Id" autocomplete="off"
                               required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="password"
                               autocomplete="off" required>
                    </div>
                    <input type="submit" value="Login" name="login"
                           class="btn read-more-button" required>
                    <div class="form-group forget">
                        <a href="registration-form.php">Create an Account</a>
                    </div>
                </form>
                <br>
            </div>
        </div>
        <br>
    </div>
</section>
<?php
include('footer.php')
?>
</body>
</html>
