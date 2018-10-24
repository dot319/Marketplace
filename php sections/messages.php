<div class="outer" id="messages">

<?php

include 'php sections/connecttodatabase.php';

$UserID = $_SESSION['UserID'];

$myQuery = "SELECT * FROM messages
WHERE ReceiverID=$UserID OR SenderID=$UserID
ORDER BY MessageID DESC";
$myResult = $conn->query($myQuery);

if ($myResult->num_rows == 0) {
    echo("You haven't sent or received any messages yet.");
}

while ($row = $myResult->fetch_assoc()) {
    echo("<div class='message-item'>
    <p><b>Sender");

    if ($row['SenderID'] == $UserID) {
        echo(":</b> You");
    } else {
        echo("ID</b>: " . $row['SenderID']);
    }

    echo("</p>
    <p><b>Receiver");

    if ($row['ReceiverID'] == $UserID) {
        echo(":</b> You");
    } else {
        echo("ID</b>: " . $row['ReceiverID']);
    }

    echo("</p>
    <p><b>Ad Id:</b> " . $row['AdID'] . "</p>
    <p><b>Message:</b> " . $row['Message'] . "</p>
    </div>");
}

?>

<?php $conn->close(); ?>

</div>