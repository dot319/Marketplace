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
        <div id="ad-details-header">
            <h2><?php echo($title); ?></h2>
        </div>
        <div id="ad-details-description">
            <?php echo($description); ?>
        </div>
        <div id="ad-details-price-seller">
            <div id="ad-details-price"><?php echo($price); ?></div>
            <div id="ad-details-seller"><?php echo($seller); ?></div>
        </div>
        <div id="ad-details-contact-form">
            <form method="post" action="messagesent.php">
                <p><textarea name="message" placeholder="Write a message to the seller."></textarea></p>
                <p><input type="submit" value="Send the seller a message!"></p>
            </form>
        </div>
    </div>
</div>

<?php
$conn->close();
?>