<?php

include 'php sections/connecttodatabase.php';

$AdID = $_GET['AdID'];

$myQuery = "SELECT * FROM Ads WHERE AdID='$AdID'";
$myResult = $conn->query($myQuery);

while ($row = $myResult->fetch_assoc()) {
    $title = $row['Title'];
    $description = $row['Description'];
    $price = $row['Price'];
    $seller = $row['Username'];
}

?>

<div class="outer" id="ad-details">
    <div id="ad-details-wrapper">
        <div id="ad-itself-wrapper">
            <div id="ad-details-header">
                <h2><?php echo($title); ?></h2>
            </div>
            <div id="ad-details-description">
                <?php echo($description); ?>
            </div>
            <div id="ad-details-price-seller">
                <div id="ad-details-price">&euro;<?php echo($price); ?></div>
                <div id="ad-details-seller">Ad placed by: <b><?php echo($seller); ?></b></div>
            </div>
        </div>

<?php if (isset($_SESSION["UserID"]) && $_SESSION["UserID"] > 0) { ?>

        <div id="ad-details-contact-form">
            <form method="post" action="messagesent.php?AdID=<?php echo($AdID); ?>">
                <p><textarea name="message" placeholder="Write a message to the seller."></textarea></p>
                <p><input type="submit" value="Send the seller a message!"></p>
            </form>
        </div>

<?php } else { ?>

        <div id="ad-details-login-to-contact">
            You must be logged in to contact the seller.
        </div>

<?php } ?>
    
    </div>
</div>

<?php
$conn->close();
?>
