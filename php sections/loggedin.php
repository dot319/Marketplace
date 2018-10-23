<div class="outer" id="loggedin">
    You clicked the login button.<br />

<?php

include 'php sections/connecttodatabase.php';

$email = $_POST["email"];
$password = $_POST["password"];

$myQuery = "SELECT `Username`, `Email`, `Password` FROM users WHERE email = '$email'";
$result = $conn->query($myQuery);

if ($result->num_rows == 0) {
    echo("Sorry, we don't know that email address!");
}

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo("Your username is: " . $row["Username"] . ".<br />");
    }
}

?>

</div>