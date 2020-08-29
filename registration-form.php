<?php
include('db_config.php');
extract($_REQUEST);
if (isset($save)) {
    $sql = mysqli_query($con, "SELECT * FROM create_account WHERE email='$email' ");
    if (mysqli_num_rows($sql)) {
        $msg = "<h1 style='color:red'> account already exists</h1>";
    } else {

        $sql = "INSERT INTO create_account(name,email,password,mobile,address,gender,country,pictrure) VALUES('$fname','$email','$password','$mobile','$address','$gender','$country','$picture')";
        if (mysqli_query($con, $sql)) {
            $msg = "<h1>Data Saved Successfully</h1>";
            header('location:login.php');
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
    <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"/>
</head>
<body>
<?php
include('menu-bar.php');
?>
<section class="registration-section">
    <div class="container">
        <div class="row">
            <h1><b>Create New Account?</b></h1>
            <?php echo @$msg; ?>
            <div class="col-sm-2"></div>
            <div class="col-sm-6 ">
                <form class="form-horizontal" method="post">
                    <div class="form-group">

                        <div class="control-label col-sm-5"><h4>Name :</h4></div>
                        <div class="col-sm-7">
                            <input type="text" name="fname" class="form-control" placeholder="Enter Your Name" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="control-label col-sm-5"><h4>Email-Id:</h4></div>
                        <div class="col-sm-7">
                            <input type="text" name="email" class="form-control" placeholder="Enter Your Email-id"
                                   autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="control-label col-sm-5"><h4>Password :</h4></div>
                        <div class="col-sm-7">
                            <input type="password" name="password" class="form-control" placeholder="Enter Your Password"
                                   autocomplete="off" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="control-label col-sm-5"><h4>Mobile Number:</h4></div>
                        <div class="col-sm-7">
                            <input type="text" name="mobile" class="form-control" placeholder="Enter Your Mobile Number"
                                   required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="control-label col-sm-5"><h4>Address :</h4></div>
                        <div class="col-sm-7">
                            <textarea name="address" class="form-control" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="control-label col-sm-5"><h4 id="top">Gender :</h4></div>
                        <div class="col-sm-7">
                            <input type="radio" name="gender" value="male" required><b>Male</b>
                            <input type="radio" name="gender" value="male" required><b>Female</b>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="control-label col-sm-5"><h4>Country :</h4></div>
                        <div class="col-sm-7">
                            <select name="country" class="form-control" required>
                                <option>India</option>
                                <option>Pakistan</option>
                                <option>China</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="control-label col-sm-5"><h4 id="top">profile pic :</h4></div>
                        <div class="col-sm-7">
                            <input type="file" name="pict" accept="image/*" required>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="submit" value="Submit" name="save" class="btn submit read-more-button"
                                       required/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-4">
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
