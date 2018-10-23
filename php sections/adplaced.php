<div class="outer" id="ad-placed">
    You clicked the "place ad" button!

<?php

include 'php sections/connecttodatabase.php';

$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$username = $_SESSION['Username'];

$myQuery = "INSERT INTO ads(`title`, `description`, `price`, `username`)
VALUES ('$title', '$description', '$price', '$username')";

if ($conn->query($myQuery) === TRUE) {
    echo("Ad placed successfully!");
} else {
    echo("Something went wrong...");
}

?>

</div>