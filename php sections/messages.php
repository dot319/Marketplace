<div class="outer" id="messages">
<div id="messages-header">
<a href="messages.php?box=in">Inbox</a>
&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
<a href="messages.php?box=out">Sent messages</a>
</div>

<?php

include 'php sections/connecttodatabase.php';

$UserID = $_SESSION['UserID'];

if ($_GET['box'] == 'out') {
    $myQuery = "SELECT * FROM messages
    WHERE SenderID=$UserID
    ORDER BY MessageID DESC
    LIMIT 100";
    $myResult = $conn->query($myQuery);

    if ($myResult->num_rows == 0) {
        echo("No messages to display.");
    }
    while ($row = $myResult->fetch_assoc()) {
        echo("<div class='message-item'>
        <p><b>Subject:</b> Ad with ID-number " . $row['AdID'] . ".</p>
        <p><b>Sent to:</b> User with ID-number " . $row['ReceiverID'] . ".</p>
        <p><b>Message:</b> " . $row['Message'] . "</p>
        </div>");
    }
} else {
    $myQuery = "SELECT * FROM messages
    WHERE ReceiverID=$UserID
    ORDER BY MessageID DESC
    LIMIT 100";
    $myResult = $conn->query($myQuery);

    if ($myResult->num_rows == 0) {
        echo("No messages to display.");
    }
    while ($row = $myResult->fetch_assoc()) {
        echo("<div class='message-item'>
        <p><b>Subject:</b> Ad with ID-number " . $row['AdID'] . ".</p>
        <p><b>From:</b> User with ID-number " . $row['SenderID'] . ".</p>
        <p><b>Message:</b> " . $row['Message'] . "</p>
        </div>");
    }
}

?>

<?php $conn->close(); ?>

</div>