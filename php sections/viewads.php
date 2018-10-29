<div class="outer" id="view-ads">
    See ads placed by users below:<br />
    <br />

<?php

include 'php sections/connecttodatabase.php';

if (isset($_POST['searchquery'])) {
    $searchQuery = $_POST['searchquery'];
    $mySearchQuery = "WHERE Title LIKE '%$searchQuery%' ";
} else {
    $mySearchQuery = "";
}

if (isset($_POST['category']) && $_POST['category'] != "0") {
    $category = $_POST['category'];
    $myCatQuery = "AND CatId = '$category' ";
    if ($mySearchQuery == "") {
        $myCatQuery = "WHERE CatId = '$category' ";
    }
} else {
    $myCatQuery = "";
}

if (isset($_POST['orderby']) && $_POST['orderby'] != "0") {
    $orderBy = $_POST['orderby'];
    switch ($orderBy) {
        case "price-desc":
        $myOrderQuery = "ORDER BY Price DESC ";
        break;
        case "price-asc":
        $myOrderQuery = "ORDER BY Price ASC ";
        break;
    }
} else {
    $myOrderQuery = "ORDER BY ADid DESC ";
}

?>

    <form method="post" action="viewads.php">
        <p>Category: <select name="category" placeholder="category">
            <option value="0">All</option>
            <option value="1">Art</option>
            <option value="2">Bicycles and mopeds</option>
            <option value="3">Books</option>
            <option value="4">Cars</option>
            <option value="5">Children and babies</option>
            <option value="6">Clothing and shoes</option>
            <option value="7">Computers and laptops</option>
            <option value="8">Gaming</option>
            <option value="9">Garden</option>
            <option value="10">Home</option>
            <option value="11">Jewelry and bags</option>
            <option value="12">Motors</option>
            <option value="13">Music and instruments</option>
            <option value="14">Pets and supplies</option>
            <option value="18">Phones and tablets</option>
            <option value="15">Sports</option>
            <option value="16">Tickets</option>
            <option value="17">Other</option>
        </select>
        Order by: <select name="orderby" placeholder="Order by">
            <option value="0">No filter</option>
            <option value="price-desc">Price - descending</option>
            <option value="price-asc">Price - ascending</option>
        </select>
<?php if (isset($searchQuery)) { ?>
        <input type="hidden" name="searchquery" value="<?php echo($searchQuery); ?>">
<?php } ?>
        <input type="submit" value="Filter results"></p>
    </form>

<?php

$myQuery = "SELECT * FROM ads " . $mySearchQuery . $myCatQuery . $myOrderQuery . "LIMIT 50";
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