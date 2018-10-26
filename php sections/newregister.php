

<?php 

ini_set('display_errors',1);
error_reporting(E_ALL);

/*** THIS! ***/
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

require_once 'php sections/connecttodatabase.php';

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if username field is empty or if username is already taken
    if (empty(trim($_POST['username']))) {
        $username_err = "You need to enter a Username";
    } else {
        $myQuery = "SELECT UserID FROM users 
        WHERE username = ?";
        if ($stmt = mysqli_prepare($conn, $myQuery)) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = trim($_POST['username']);
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_err = "Username already taken. Pick another one!";
                } else {
                    $username = trim($_POST['username']);
                }
            } else {
                echo("Something went wrong, try again later.");
            }
        }
        mysqli_stmt_close($stmt);
    }

   
    // Check if password field is empty and if password is at least 6 characters long
    if (empty(trim($_POST['password']))) {
        $password_err = "Please enter a password";
    } elseif (strlen(trim($_POST['password'])) < 6) {
        $password_err = "Password must be at least 6 characters long";
    } else {
        $password = trim($_POST['password']);
    }

    // Check if confirm password field is empty and if it matches password
    if (empty(trim($_POST['confirm_password']))) {
        $confirm_password_err = "Please confirm your password";
    } else {
        $confirm_password = trim($_POST['confirm_password']);
        if (empty($password_err) && ($password != $confirm_password)) {
            $confirm_password_err = "Password doesn't match.";
        }
    }

    if (empty($username_err) && empty($password_err) && empty($confirm_password_err)) {
        $myQuery = "INSERT INTO users (`username`, `password`)
        VALUES (?, ?)";

        if ($stmt = mysqli_prepare($conn, $myQuery)) {
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);

            if(mysqli_stmt_execute($stmt)) {
                header("location: login.php");
            } else {
                echo("Something went wrong. Please try again later.");
            }
        }
        mysqli_stmt_close($stmt);
    }

    msqli_close($conn);
}
?>

<div class="outer" id="registration-form">
    <p><strong>This form is made by a database student. Please don't enter sensitive information as protection of your data is not guaranteed!</strong> Try entering some fake data instead. </p>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <p><input name="username" type="text" placeholder="Your username..."></p>
        <p><input name="password" type="password" placeholder="Your password..."></p>
        <p><input name="confirm_password" type="password" placeholder="Confirm your password..."></p>
        <p><input name="submit" type="submit"></p>
    </form>
</div>