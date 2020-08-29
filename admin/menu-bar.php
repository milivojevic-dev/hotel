<?php session_start();
error_reporting(1);
?>

<nav class="navbar fixed-top navbar-expand-lg">
    <a href="" class="navbar-brand">
        <div class="logo"></div>
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="../index.php" title="Home">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="../about.php" title="About">About </a></li>
            <li class="nav-item"><a class="nav-link" href="../image-gallery.php" title="Gallery">Gallery </a></li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php" title="Login">
                    Login
                </a>
            </li>
            <?php
            if ($_SESSION['create_account_logged_in'] != "") {
                ?>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">View Status <span
                                class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="../profile.php">Profile</a></li>
                        <li><a href="../order.php">Booking Status</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </li>
            <?PHP } ?>
        </ul>
    </div>
</nav>
