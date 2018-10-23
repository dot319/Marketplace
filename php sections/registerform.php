<?php include 'php sections/connecttodatabase.php'?>

<div class="outer" id="registration-form">
    <form method="post" action="registered.php">
        <p><input name="username" type="text" placeholder="Your username..."></p>
        <p><input name="email" type="email" placeholder="Your email..."></p>
        <p><input name="newpassword" type="text" placeholder="Your password..."></p>
        <!-- <p><input name="newpassword2" type="text" placeholder="Confirm your password..."></p> -->
        <p><input name="submit" type="submit"></p>
    </form>
</div>