<?php
// Get the product data
$gameid = filter_input(INPUT_POST, 'gameid', FILTER_VALIDATE_INT);
$saleid = filter_input(INPUT_POST, 'saleid', FILTER_VALIDATE_INT);
$categoryid = filter_input(INPUT_POST, 'categoryid', FILTER_VALIDATE_INT);
$name = filter_input(INPUT_POST, 'name');
$purchasePrice = filter_input(INPUT_POST, 'purchasePrice', FILTER_VALIDATE_FLOAT);
$salePrice = filter_input(INPUT_POST, 'salePrice', FILTER_VALIDATE_FLOAT);
$picture = filter_input(INPUT_POST, 'picture');

// Validate inputs
if ($categoryid == null || $categoryid == false ||$name == null || $purchasePrice == null || $purchasePrice == false|| $salePrice == null || $salePrice == false) {
    $error = "Invalid product data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the product to the database 
    $query = "INSERT INTO game
                 (gameid, saleid, categoryid, name, purchasePrice, salePrice, picture)
              VALUES
                 (:gameid, :saleid, :categoryid, :name, :purchasePrice, :salePrice, :picture)";
    $statement = $db->prepare($query);
    $statement->bindValue(':gameid', $gameid);
    $statement->bindValue(':saleid', $saleid);
    $statement->bindValue(':categoryid', $categoryid);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':purchasePrice', $purchasePrice);
    $statement->bindValue(':salePrice', $salePrice);
    $statement->bindValue(':picture', $picture);
    $statement->execute();
    $statement->closeCursor();

    // Display the Product List page
    include('index.php');
}
?>