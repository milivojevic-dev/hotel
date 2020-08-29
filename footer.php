<?php
include('db_config.php');
extract($_REQUEST);
if (isset($send)) {
    mysqli_query($con, "INSERT INTO feedback VALUES('','$n','$e','$mob','$msg')");
    $msg = "<h>feedback sent successfully</h>";
}
?>

<!-- Footer -->
<footer>
    <div class="row justify-content-between align-items-center">
        <div class="col-md-4">
            <img class="light-logo" src="image/logo/logo2.png"/>
            <p>A hotel is an establishment that provides paid lodging on a short-term basis.
                Facilities provided may range from a modest-quality mattress in a small room to large suites with
                bigger, higher-quality beds, a dresser, a refrigerator and other kitchen facilities, upholstered
                chairs,
                a flat screen television, and en-suite bathrooms. Small, lower-priced hotels may offer only the most
                basic guest services and facilities. Larger, higher-priced hotels may provide additional guest
                facilities such as a swimming pool, business center</p>
            <a href="about.php" class="btn read-more-button"><b>Read More..</b></a>
            <?php
            include('social-icon.php')
            ?>
        </div>
        <div class="col-md-3">
            <h3>Contact Us</h3>
            <p><strong>Address:&nbsp;</strong>Lorem,59 Ipsum Dolor,Sit</p>
            <p><strong>Email:&nbsp;</strong>hotel@gmail.com</p>
            <p><strong>Contact Us:&nbsp;</strong>(+00) 1234567</p>
        </div>
        <div class="col-md-4 text-center">
            <div class="panel panel-primary">
                <div class="panel-heading">Feedback</div>
                <div class="panel-body">
                    <?php echo @$msg; ?>
                    <div class="feedback">
                        <form method="post"><br>
                            <div class="form-group">
                                <input type="text" name="n" class="form-control" id="#"
                                       placeholder="Enter Your Name"
                                       required>
                            </div>
                            <div class="form-group">
                                <input type="Email" name="e" class="form-control" id="#" placeholder="Email"
                                       required>
                            </div>
                            <div class="form-group">
                                <input type="Number" name="mob" class="form-control" id="#"
                                       placeholder="Mobile Number"
                                       required>
                            </div>
                            <div class="form-group">
                                <textarea type="Text" name="msg" class="form-control" id="#"
                                          placeholder="Type Your Massage" required></textarea>
                            </div>
                            <input type="submit" value="SEND" name="send"
                                   class="btn read-more-button btn-group-justified"
                                   required>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<footer class="container-fluid text-center">
    <p>Developed By Ivana@ | All Rights Reserved 2020</p>
</footer>
