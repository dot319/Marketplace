<?php include 'php sections/connecttodatabase.php' ?>

<div class="outer" id="own-profile">
    Here you will be able to see your own profile and edit it.

    <div id="own-profile-ads">
        <h3>Ads you placed:</h3>
<?php

$username = $_SESSION['Username'];
$myQuery = "SELECT * FROM ads WHERE Username = '$username'";
$myResult = $conn->query($myQuery);

if ($myResult->num_rows == 0) {
    echo("You haven't placed any ads yet.");
} else {
    while ($row = $myResult->fetch_assoc()) { 
        echo($row['Title'] . "<br />");
    }
}

$conn->close();

?>
    </div>
</div>