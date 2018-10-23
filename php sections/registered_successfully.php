

<div class="outer" id="registered-successfully">
    You clicked the submit button on the register form. <br />

<?php

include 'connecttodatabase.php';

$userName = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["newpassword"];

$myQuery = "INSERT INTO users(`Username`, `Email`, `Password`) 
VALUES ('$userName', '$email', '$password')";

if ($conn->query($myQuery) === TRUE) {
    echo("Registration successful!");
} else {
    echo("Something went wrong... try again later or contact an administrator.");
}

?>

</div>