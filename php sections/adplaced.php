<?php 
ini_set('display_errors',1);
error_reporting(E_ALL);

/*** THIS! ***/
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
?>

<div class="outer" id="ad-placed">
    You clicked the "place ad" button!

<?php

include 'php sections/connecttodatabase.php';

$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$category = $_POST['category'];
$username = $_SESSION['Username'];

$myQuery = "INSERT INTO ads(`title`, `description`, `price`, `catid`, `username`)
VALUES ('$title', '$description', '$price', '$category', '$username')";

if ($conn->query($myQuery) === TRUE) {
    echo("Ad placed successfully!");
} else {
    echo("Something went wrong...");
}

?>

</div>