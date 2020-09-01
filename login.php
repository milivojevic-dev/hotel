<?php
session_start();
error_reporting(1);
require('db_config.php');
extract($_REQUEST);
if (isset($login)) {
    if ($email_id == "" || $password == "") {
        $error = "<h3>fill all details</h3>";
    } else {
        $sql = mysqli_query($con, "SELECT * FROM create_account WHERE email='$email_id' && password='$password' ");
        if (mysqli_num_rows($sql)) {
            $_SESSION['user_logged_in'] = $email_id;
            header('location:booking-form.php');
        } else {
            $error = "<h3 class='error'>Invalid login details</h3>";
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="../css/style.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Akronim|Libre+Baskerville" rel="stylesheet">
</head>
<body>
<?php
include('menu-bar.php');
?>
<section class="admin-section">
    <div class="container">
        <div class="row"><br>
            <div class="col-sm-4"></div>
            <div class="col-sm-4 text-center">
                <h1><b>User Login </b></h1>
                <?php echo @$error; ?>
                <form action="#" method="post"><br>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email_id" placeholder="Email Id" required>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="password" placeholder="Password" required>
                    </div>
                    <input type="submit" value="Login" name="login"
                           class="btn read-more-button">
                </form>
                <br>
            </div>
        </div>
    </div>

</section>
<?php
include('footer.php');
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

