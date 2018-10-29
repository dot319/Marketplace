<div class="outer" id="place-ad">

<?php if (isset($_SESSION['UserID']) && $_SESSION['UserID'] > 0) { ?>

    <div>
        <p><strong>This form is made by a database student. Please don't enter sensitive information as protection of your data is not guaranteed!</strong> Try entering some fake data instead. </p>
        <form method="post" action="adplaced.php">
            <p><input name="title" type="text" placeholder="Ad title"></p>
            <p><textarea name="description" type="text" placeholder="Ad description"></textarea></p>
            <p><input name="price" type="number" step="0.01" placeholder="Price"></p>
            <p><select name="category" placeholder="category">
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
            </select></p>
            <p><input name="submit" type="submit" value="Place ad"></p>
        </form>
    </div> 

<?php } else { ?>

    <div>
    You must be logged in to place an ad!
    </div>
<?php } ?>

</div>