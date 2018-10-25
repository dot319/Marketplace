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
    echo("<div id='outbox-header'><h3>Messages you sent:</h3></div>");
    $myQuery = "SELECT * FROM messages
    WHERE SenderID=$UserID
    ORDER BY MessageID DESC
    LIMIT 100";
    $myResult = $conn->query($myQuery);

    if ($myResult->num_rows == 0) {
        echo("No messages to display.");
    }
    while ($row = $myResult->fetch_assoc()) {

        // Get the name of the receiver of the message
        $receiverID = $row['ReceiverID'];
        $myQuery = "SELECT Username FROM Users
        WHERE UserID=$receiverID";
        $newResult = $conn->query($myQuery);
        while ($subRow = $newResult->fetch_assoc()) {
            $receiverName = $subRow['Username'];
        }

        // Get the Ad Title
        $adID = $row['AdID'];
        $myQuery = "SELECT Title FROM Ads
        WHERE AdID=$adID";
        $newResult = $conn->query($myQuery);
        while ($subRow = $newResult->fetch_assoc()) {
            $adTitle = $subRow['Title'];
        }

        // Print the message to the screen
        echo("<div class='message-item'>
        <p><b>Subject:</b>  " . $adTitle . ".</p>
        <p><b>Sent to:</b> " . $receiverName . ".</p>
        <p><b>Message:</b> " . $row['Message'] . "</p>
        </div>");
    }
} else {
    echo("<div id='inbox-header'><h3>Messages sent to you:</h3></div>");
    $myQuery = "SELECT * FROM messages
    WHERE ReceiverID=$UserID
    ORDER BY MessageID DESC
    LIMIT 100";
    $myResult = $conn->query($myQuery);

    if ($myResult->num_rows == 0) {
        echo("No messages to display.");
    }
    while ($row = $myResult->fetch_assoc()) {

        // Get the name of the sender of the message
        $senderID = $row['SenderID'];
        $myQuery = "SELECT Username FROM Users
        WHERE UserID=$senderID";
        $newResult = $conn->query($myQuery);
        while ($subRow = $newResult->fetch_assoc()) {
            $senderName = $subRow['Username'];
        }

        // Get the Ad Title
        $adID = $row['AdID'];
        $myQuery = "SELECT Title FROM Ads
        WHERE AdID=$adID";
        $newResult = $conn->query($myQuery);
        while ($subRow = $newResult->fetch_assoc()) {
            $adTitle = $subRow['Title'];
        }

        // Print the message to the screen
        echo("<div class='message-item'>
        <p><b>Subject:</b> " . $adTitle . ".</p>
        <p><b>From:</b> " . $senderName . ".</p>
        <p><b>Message:</b> " . $row['Message'] . "</p>
        <form method='post' action='messagesent.php?AdID=$adID&reply=true'>
            <p><textarea name='message' placeholder='Write a reply to this message.'></textarea></p>
            <input type='hidden' name='receiverID' value=$senderID>
            <p><input type='submit' value='Send'></p>
        </form>
        </div>");
    }
}

?>

<?php $conn->close(); ?>

</div>