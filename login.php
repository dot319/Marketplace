<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Marketplace</title>
        <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
        <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">
    </head>
    <body>
        <div id="main-wrapper">
        <?php include 'php sections/navbar.php' ?>

        <?php include 'php sections/topsearchbar.php' ?>

        <?php include 'php sections/login.php' ?>

        <?php include 'php sections/footer.php' ?>

        <?php include 'php sections/includejavascript.php' ?>
        </div>
    </body>
</html>