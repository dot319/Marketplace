<div class="outer" id="view-ads">
    Browse ads placed by users below:<br />

<?php

include 'php sections/connecttodatabase.php';

$myQuery = "SELECT * FROM ads ORDER BY AdID DESC LIMIT 50";
$myResult = $conn->query($myQuery);

while ($row = $myResult->fetch_assoc()) {
    echo("<div class='aditem'>
    <p><b>" . $row['Title'] . "</b></p>
    <p><b>Price: </b>&euro;" . $row['Price'] . "</p>
    <p><b>Description: </b>" . $row['Description'] . "</p>
    <p><b>Placed by: </b>" . $row['Username'] . "</p>
    <p><a href='addetails.php?AdID=" . urlencode($row['AdID']) . "'>View this ad</a></p>
</div>");
}

?>

</div>