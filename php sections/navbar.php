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
    Welcome, <?php echo($_SESSION['Username']); ?>! &nbsp;&nbsp;
    <a href="viewownprofile.php">Profile</a> / 
    <a href="placead.php">Place ad</a> / 
    <a href="loggedout.php">Log out</a>
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