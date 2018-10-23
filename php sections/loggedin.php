<div class="outer" id="loggedin">
    You clicked the login button.<br />

<?php

include 'php sections/connecttodatabase.php';

$email = $_POST["email"];
$password = $_POST["password"];

$myQuery = "SELECT `UserID`, `Username`, `Email`, `Password` FROM users WHERE email = '$email'";
$result = $conn->query($myQuery);

if ($result->num_rows == 0) {
    echo("Sorry, we don't know that email address!");
} elseif ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if ($password == $row["Password"]) {
            echo("Your password is correct. <br />
            Welcome, " . $row['Username'] . "! Refresh the page to be logged in.<br />");
            $_SESSION["UserID"] = $row["UserID"];
        } else {
            echo("Wrong password.<br />");
        }
    }
}

?>

</div>