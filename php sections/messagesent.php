<div class="outer" id="message-sent">
    You clicked the "Send message" button.<br />

<?php

include 'php sections/connecttodatabase.php';

$SenderID = $_SESSION['UserID'];
$AdID = $_GET['AdID'];
$Message = $_POST['message'];

echo("Sender ID: " . $SenderID . "<br />");
echo("Ad ID: " . $AdID . "<br />");
echo("Message: " . $Message . "<br />");

if(!isset($_GET['reply'])) {

    $myQuery = "SELECT Username FROM Ads WHERE AdID=$AdID";
    $myResult = $conn->query($myQuery);
    while ($row = $myResult->fetch_assoc()) {
        $ReceiverUserName = $row['Username'];
    }

    $myQuery = "SELECT UserID FROM Users WHERE Username='$ReceiverUserName'";
    $myResult = $conn->query($myQuery);
    while ($row = $myResult->fetch_assoc()) {
        $ReceiverID = $row['UserID'];
    }

    echo("ReceiverID: " . $ReceiverID . "<br />");
} else {
    $ReceiverID = $_POST['receiverID'];
    echo("ReceiverID: " . $ReceiverID . "<br />");
}

$myQuery = "INSERT INTO Messages(`SenderID`, `ReceiverID`, `AdID`, `Message`)
VALUES ('$SenderID', '$ReceiverID', '$AdID', '$Message')";
if ($conn->query($myQuery) === TRUE) {
    echo("Your message was successfully uploaded to the database!<br />");
} else {
    echo("Something went wrong... message wasn't uploaded to database.<br />");
}

$conn->close();

?>

</div>