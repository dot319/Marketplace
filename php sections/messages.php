<div class="outer" id="messages">
Messages will be displayed here.<br />

<?php

include 'php sections/connecttodatabase.php';

$UserID = $_SESSION['UserID'];

$myQuery = "SELECT * FROM messages
WHERE ReceiverID=$UserID OR SenderID=$UserID";
$myResult = $conn->query($myQuery);
while ($row = $myResult->fetch_assoc()) {
    echo("<div class='message-item'>
    <p><b>Sender Id:</b> " . $row['SenderID'] . "</p>
    <p><b>Receiver Id:</b> " . $row['ReceiverID'] . "</p>
    <p><b>Ad Id:</b> " . $row['AdID'] . "</p>
    <p><b>Message:</b> " . $row['Message'] . "</p>
    </div>");
}

?>

<?php $conn->close(); ?>

</div>