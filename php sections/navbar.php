<nav>
    <div id="navbar">
        <div id="navbar-logo">
        <a href="index.php">Marketplace</a>
        </div>
        <div id="navbar-menu">

        </div>

<?php

if (isset($_SESSION["UserID"]) && $_SESSION["UserID"] > 0) { ?>
    <div id="navbar-loggedin">
    Messages, Profile, Make ad, <a href="loggedout.php">log out</a>
    </div>
<?php } else { ?>
    <div id="navbar-login">
        <a href="register.php">Register</a> / 
        <a href="login.php">login</a>
    </div>
<?php }

?>


    </div>
</nav>