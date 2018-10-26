<div class="outer" id="loggedin">
    You clicked the login button.<br />

<?php

include 'php sections/connecttodatabase.php';

$username = trim($_POST["username"]);
$password = trim($_POST["password"]);

$myQuery = "SELECT `UserID`, `Username`, `Password` FROM users WHERE username = '$username'";
$result = $conn->query($myQuery);

if ($result->num_rows == 0) {
    echo("Sorry, we don't know that username!");
} elseif ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

        if(password_verify($password, $row['Password'])) {
            echo("Your password is correct. <br />
            Welcome, " . $row['Username'] . "!<br />");
            $_SESSION["UserID"] = $row["UserID"];
            $_SESSION["Username"] = $row["Username"];
        } else {
            echo("Wrong password.<br />");
        }
    }
}

echo("<script type='text/javascript'>
if (!window.location.hash) {
    window.location = window.location + '#loggedin';
    window.location.reload();
}
</script>");

?>

</div>