<?php include 'php sections/connecttodatabase.php'?>

<div class="outer" id="registration-form">
    <p><strong>This form is made by a database student. Please don't enter sensitive information as protection of your data is not guaranteed!</strong> Try entering some fake data instead. </p>
    <form method="post" action="registered.php">
        <p><input name="username" type="text" placeholder="Your username..."></p>
        <p><input name="email" type="email" placeholder="Your email..."></p>
        <p><input name="newpassword" type="text" placeholder="Your password..."></p>
        <p><input name="submit" type="submit"></p>
    </form>
</div>