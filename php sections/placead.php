<div class="outer" id="place-ad">

<?php if (isset($_SESSION['UserID']) && $_SESSION['UserID'] > 0) { ?>

    <div>
        <p><strong>This form is made by a database student. Please don't enter sensitive information as protection of your data is not guaranteed!</strong> Try entering some fake data instead. </p>
        <form method="post" action="adplaced.php">
            <p><input name="title" type="text" placeholder="Ad title"></p>
            <p><textarea name="description" type="text" placeholder="Ad description"></textarea></p>
            <p><input name="price" type="number" step="0.01" placeholder="Price"></p>
            <p><input name="submit" type="submit" value="Place ad"></p>
        </form>
    </div> 

<?php } else { ?>

    <div>
    You must be logged in to place an ad!
    </div>
<?php } ?>

</div>