<?php

$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);
$accessDatabase = "USE Marketplace";
$conn->query($accessDatabase);

?>