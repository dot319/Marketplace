<div class="outer" id="view-ads">

    See ads placed by users below:<br />

<?php

include 'php sections/connecttodatabase.php';

if (isset($_POST['searchquery'])) {
    $searchQuery = $_POST['searchquery'];
    $mySearchQuery = "WHERE Title LIKE '%$searchQuery%' ";
} else {
    $mySearchQuery = "";
}

$myQuery = "SELECT * FROM ads " . $mySearchQuery . "ORDER BY AdID DESC LIMIT 50";
$myResult = $conn->query($myQuery);

while ($row = $myResult->fetch_assoc()) {
    echo("<div class='aditem'>
    <p><b>" . $row['Title'] . "</b></p>
    <p><b>Price: </b>&euro;" . $row['Price'] . "</p>
    <p><b>Description: </b>" . $row['Description'] . "</p>
    <p><b>Placed by: </b>" . $row['Username'] . "</p>
    <p><a href='addetails.php?AdID=" . urlencode($row['AdID']) . "'><button type='button' class='ad-item-view-button'>View this ad</button></a></p>
</div>");
}

?>

</div>